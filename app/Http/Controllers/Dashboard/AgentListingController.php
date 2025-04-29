<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\ListingRequest;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AgentListingController extends Controller
{
    protected $user, $profile, $listingRequests, $steps;

    public function __construct()
    {
        $this->steps = [
            'property-review'   => 'Membuat Listing Penjual',
            'negotiation'       => 'Proses Negosiasi',
            'ppjb-document'     => 'Pembuatan PPJB',
            'ajb-document'      => 'Pembuatan AJB',
            'transfer-document' => 'Proses Balik Nama',
            'finalization'      => 'Verifikasi Akhir Dokumen',
        ];

        $this->middleware(function ($request, $next) {
            $this->user    = Auth::user();
            $this->profile = $this->user->agentProfile ?? null;
            // $this->listingRequests = $this->profile ?
            // $this->profile->listingRequests()->latest()->get() : collect();

            return $next($request);
        });
    }

    public function index()
    {

        $properties = $this->profile->properties()->where('status', '!=', 'archived')->
            with(['listingRequest.user.userProfile', 'transactions'])
            ->latest()->get();

        return view('dashboard.pages.my-listing', [
            'user'       => $this->user,
            'profile'    => $this->profile,
            'properties' => $properties,
            'steps'      => $this->steps,
            // 'listingRequests' => $this->listingRequests,
        ]);
    }

    public function create()
    {
        $property = null;
        return view('dashboard.pages.create-listing', compact('property'), [
            'user'    => $this->user,
            'profile' => $this->profile,
            // 'listingRequests' => $this->listingRequests,
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([

            //Properti main data
            'title'               => 'required|string|max:255',
            'description'         => 'required|string',
            'priceRadio'          => 'required|in:Dijual,Disewa',
            'sale_price'          => 'required_if:priceRadio,Dijual|nullable|numeric',
            'rent_price'          => 'required_if:priceRadio,Disewa|nullable|numeric',
            'min_rent_period'     => 'nullable|string',
            'property_type'       => 'required|string',
            'transaction_type'    => 'required|string',

            //video
            'video'               => 'nullable',

            //images (max 5MB / item)
            'images.*'            => 'image|max:5120',

            //virtual tour
            'virtual_tour'        => 'nullable|url',

            // facilities
            'in_house'            => 'nullable|array',
            'in_house.*'          => 'string|max:100',
            'complex'             => 'nullable|array',
            'complex.*'           => 'string|max:100',

            //details
            'bathrooms'           => 'required|integer|min:0',
            'bedrooms'            => 'required|integer|min:0',
            'land_area'           => 'required|integer|min:0',
            'building_area'       => 'nullable|integer|min:0',
            'carport'             => 'nullable|integer|min:0',
            'certificate'         => 'nullable|string|max:255',
            'floors'              => 'nullable|integer|min:0',
            'furnished'           => 'nullable|in:Non-Furnished,Semi-Furnished,Fully-Furnished',
            'electricity'         => 'nullable|integer|min:0',
            'kitchen'             => 'nullable|integer|min:0',
            'concept_and_style'   => 'nullable|string|max:255',
            'condition'           => 'nullable|in:Baru,Bagus,Bekas,Tua,Lainnya',

            //address
            'address.street'      => 'required|string|max:255',
            'address.village'     => 'required|string|max:255',
            'address.district'    => 'required|string|max:255',
            'address.city'        => 'required|string|max:255',
            'address.province'    => 'required|string|max:255',
            'address.postal_code' => 'required|string|max:20',

            //listing_req from
            'listing_request_id'  => 'nullable|exists:listing_requests,id',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Determine the agent and user profiles
            $agentProfile = auth()->user()->agentProfile;
            $userProfile  = null;

            if (! empty($validated['listing_request_id'])) {
                $listingRequest = ListingRequest::find($validated['listing_request_id']);
                $userProfile    = $listingRequest->userProfile;
            }
            // Create the property
            $property = $agentProfile->properties()->create([
                'name'             => $validated['title'],
                'description'      => $validated['description'],
                'price'            => empty($validated['sale_price']) ? $validated['rent_price'] : $validated['sale_price'],
                'min_rent_period'  => ! empty($validated['min_rent_period']) ? $validated['min_rent_period'] : null,
                'property_type'    => $validated['property_type'],
                'transaction_type' => $validated['transaction_type'],
                'user_profiles_id' => $userProfile->id ?? null,
                'expires_at'       => $validated['transaction_type'] === 'Disewa' ? now()->addDays(30) : null,
            ]);

            // Create address
            $property->address()->create([
                'street'      => $validated['address']['street'],
                'village'     => $validated['address']['village'],
                'district'    => $validated['address']['district'],
                'city'        => $validated['address']['city'],
                'province'    => $validated['address']['province'],
                'postal_code' => $validated['address']['postal_code'],
            ]);

            // Handle image uploads
            if ($request->hasFile('images')) {
                $order = 1;
                foreach ($request->file('images') as $image) {
                    $filename = uniqid('property_') . '.' . $image->getClientOriginalExtension();
                    // don't forget to activate this before production:
                    // $path = $image->store('property_images', 'public');

                    //and remove this:
                    $image->move(storage_path('app/public/images/properties'), $filename);
                    $property->propertyImages()->create([
                        'image_path' => 'images/properties/' . $filename,
                        'order'      => $order,
                    ]);
                    $order++;
                }
            }

            // Handle property video upload
            if ($request->hasFile('video')) {
                $videoFile = $request->file('video');
                $filename  = uniqid('property_video_') . '.' . $videoFile->getClientOriginalExtension();
                // $videoPath = $videoFile->store('videos/properties', 'public');
                // Move the file to storage
                $videoFile->move(storage_path('app/public/videos/properties'), $filename);

                // Store only relative path in DB
                $property->videos()->create([
                    'video_path' => 'videos/properties/' . $filename,
                ]);
            }

            /*  Handle virtual tour file upload
             $virtualTourPath = null;
             if ($request->hasFile('virtual_tour')) {
                 $virtualTourFile = $request->file('virtual_tour');
                 $virtualTourPath = $virtualTourFile->store('virtual-tours/properties', 'public');
                 $property->virtualTour()->create(['path' => $virtualTourPath]);
             } */

            $property->virtualTour()->create(["tour_url" => "-"]);

            // Attach facilities
            if (! empty($validated['in_house']) || ! empty($validated['complex'])) {
                $property->facilities()->create([
                    'in_house' => json_encode($validated['in_house'] ?? []),
                    'complex'  => json_encode($validated['complex'] ?? []),
                ]);
            }

            // Create property details
            $property->details()->create([
                'bathrooms'         => $validated['bathrooms'] ?? null,
                'bedrooms'          => $validated['bedrooms'] ?? null,
                'land_area'         => $validated['land_area'] ?? null,
                'building_area'     => $validated['building_area'] ?? null,
                'carport'           => $validated['carport'] ?? null,
                'certificate'       => $validated['certificate'] ?? null,
                'floors'            => $validated['floors'] ?? null,
                'furnishing'        => $validated['furnished'],
                'electricity'       => $validated['electricity'] ?? null,
                'kitchen'           => $validated['kitchen'] ?? null,
                'concept_and_style' => $validated['concept_and_style'] ?? null,
                'condition'         => $validated['condition'] ?? null,
            ]);

            //Create Transaction Process default:initiated
            $property->transactions()->create([
                'id_preview'       => 'STP_' . $property->id,
                'status'           => 'initiated',
                'user_profiles_id' => $userProfile->id ?? null,
            ]);

            // Commit the transaction
            DB::commit();

            return redirect()->route('dashboard-agent.my-listing')
                ->with('success', 'Property listing created successfully.');

        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollBack();
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function edit($id_preview)
    {
        // Only allow editing if property transaction is in 'initiated' phase

        // Fetch the property with its relationships
        $property = Property::with(['address', 'propertyImages', 'videos', 'details', 'facilities'])
            ->where('id_preview', $id_preview)->firstOrFail();

        //edit gate
        if ($property->transactions->status !== 'initiated') {
            abort(403, 'Editing is not allowed in the current transaction state.');
        }

        // Ensure the logged-in agent owns this property
        if (auth()->user()->agentProfile->id !== $property->agent_profile_id) {
            abort(403, 'Unauthorized');
        }

        $in_house = json_decode($property->facilities->in_house, true) ?? [];
        $complex  = json_decode($property->facilities->complex, true) ?? [];

        return view('dashboard.pages.edit-listing', compact('property', 'in_house', 'complex'),
            ['user' => $this->user, 'profile' => $this->profile]);
    }

    public function updateListing(Request $request, Property $property)
    {
        // ---------------------- BELUM JADI KARENA MAGER, NANTI AJA DIKERJAIN HEHE ---------------------
        dd($request->all());
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'required|string',

            // Address
            'province'       => 'required|string',
            'city'           => 'required|string',
            'district'       => 'required|string',
            'village'        => 'required|string',
            'address_detail' => 'nullable|string',

            // Details, Facilities, etc...
            'facilities'     => 'nullable|array',
            'facilities.*'   => 'string',

            'images.*'       => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $property->update([
            'title'       => $request->title,
            'description' => $request->description,
        ]);
    }

    public function removeImage(Property $propertyId, PropertyImage $imageId)
    {
        // Find the property (optional, for validation)
        $property = Property::findOrFail($propertyId);

        // Find the image in the database
        $image = $property->propertyImages()->findOrFail($imageId);

        // Delete the image file from storage
        if (Storage::exists('public/' . $image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        // Return success response
        return response()->json(['success' => true]);
    }
    public function updateStatus(Request $request, $id)
    {
        $property         = Property::findOrFail($id);
        $property->status = $request->status === 'published' ? 'published' : 'draft';
        $property->save();

        return response()->json(['message' => 'Property status updated.']);
    }
    public function delete(Request $request)
    {
        $property = Property::findOrFail($request->property_id);
        $property->delete();
        return redirect()->route('dashboard-agent.my-listing')
            ->with('success', 'Property berhasil di hapus!');
    }

    public function filterSort(Request $request)
    {
        $properties = Property::with('address', 'propertyImages', 'details', 'transactions')->filter($request)
            ->where('status', '!=', 'archived')->get();
        $steps = $this->steps;

        return view('dashboard.layouts.partials.listing-agent', compact('properties', 'steps'));
    }
}
