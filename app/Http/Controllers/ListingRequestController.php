<?php
namespace App\Http\Controllers;

use App\Models\ListingRequest;
use App\Notifications\ListingRequestAccepted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ListingRequestController extends Controller
{
    // Display all listing requests
    // public function index()
    // {
    //     // $listingRequests = ListingRequest::with(['user', 'agent'])->get();
    //     // return view('listing_requests.index', compact('listingRequests'));
    // }

    // // Show the form for creating a new listing request
    // public function create()
    // {
    //     // return view('listing_requests.create');
    // }

    //Store a newly created listing request
    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_title'      => 'required|string|max:255',
            'description'         => 'required|string',
            'price'               => 'required|numeric',
            'property_type'       => 'required',
            'transaction_type'    => 'required',

            //address
            'address.street'      => 'required|string|max:255',
            'address.village'     => 'required|string|max:255',
            'address.district'    => 'required|string|max:255',
            'address.city'        => 'required|string|max:255',
            'address.province'    => 'required|string|max:255',
            'address.postal_code' => 'required|string|max:20',
        ]);

        $filename = '';
        $user     = Auth::user();
        $profile  = $user->profile;

        // Handle photo upload
        if ($request->hasFile('photo')) {

            $filename = uniqid('user_listing_request_') . '.' . $request->file('photo')->getClientOriginalExtension();

            //FOR PRODUCTION USE THIS:
            // $path           = $request->file('photo')->storeAs('public', $filename);

            //this is only for development
            $request->file('photo')->move(storage_path('app/public/images/listing_request'), $filename);

        }

        $listingRequest = $user->listingRequests()->create([
            'photo'            => $filename,
            'property_title'   => $request->property_title,
            'property_type'    => $request->property_type,

            'transaction_type' => $request->transaction_type,
            'description'      => $request->description,
            'price'            => $request->price,
            'status'           => 'pending',
        ]);

        $listingRequest->address()->create([
            'street'      => $validated['address']['street'],
            'village'     => $validated['address']['village'],
            'district'    => $validated['address']['district'],
            'city'        => $validated['address']['city'],
            'province'    => $validated['address']['province'],
            'postal_code' => $validated['address']['postal_code'],
        ]);

        return redirect()->route('stone.user-profile')->with('success', 'Request Iklan kepada Agen Berhasil Dibuat!');
    }

    public function show()
    {
        //get login agent
        $user    = Auth::user();
        $profile = $user->agentProfile;

        //get city of agent
        $selectedLocation = optional($profile->address)->city;

        // Fetch listing requests where listing address city matches agent city
        $listingRequests = ListingRequest::whereHas('address', function ($query) use ($selectedLocation) {
            $query->where('city', $selectedLocation);
        })
            ->with('address', 'user.profile')
            ->latest()
            ->get();

        // Get all available locations for the filter dropdown
        // $locations = \App\Models\UserProfile::select('location')->distinct()->pluck('location');

        return view('dashboard.pages.pool-user', compact('listingRequests', 'selectedLocation', 'profile', 'user'));
    }

    // // Show the form for editing a listing request
    // public function edit(ListingRequest $listingRequest)
    // {
    //     return view('listing_requests.edit', compact('listingRequest'));
    // }

    // // Update a listing request
    // public function update(Request $request, ListingRequest $listingRequest)
    // {
    //     $request->validate([
    //         'property_title' => 'required|string|max:255',
    //         'description'    => 'required|string',
    //         'price'          => 'required|numeric',
    //         'location'       => 'required|string|max:255',
    //         'status'         => 'required|in:initiated,pending,accepted,ready',
    //     ]);

    //     $listingRequest->update($request->all());

    //     return redirect()->route('listing_requests.index')->with('success', 'Listing request updated successfully.');
    // }

    // Delete a listing request
    public function destroy($id)
    {
        $listingRequest = ListingRequest::findOrFail($id);

        if ($listingRequest->photo) {
            Storage::disk('public')->delete('images/listing_request/' . $listingRequest->photo);
        }
        // Then delete the database record
        $listingRequest->delete();
        return redirect()->route('stone.user-profile')->with('success', 'Listing request deleted successfully.');
    }

    // Agent accepts a listing request
    public function accept(ListingRequest $listingRequest)
    {

        $listingRequest->update([
            'agent_id' => auth()->id(),
            'status'   => 'accepted',
        ]);

        // Notify the user (seller) about the acceptance
        $user = $listingRequest->userProfile->user;
        $user->notify(new ListingRequestAccepted($listingRequest));

        return redirect()->route('dashboard-agent.pool-user')->with('success', 'Permintaan Iklan telah diterima!');
    }

    // // User marks the listing as ready
    // public function markAsReady(ListingRequest $listingRequest)
    // {
    //     if ($listingRequest->status === 'accepted') {
    //         $listingRequest->update(['status' => 'ready']);

    //         // Notify the agent about the readiness
    //         // Notification logic here

    //         return redirect()->route('listing_requests.index')->with('success', 'Listing marked as ready.');
    //     }

    //     return redirect()->route('listing_requests.index')->with('error', 'Listing cannot be marked as ready.');
    // }
}
