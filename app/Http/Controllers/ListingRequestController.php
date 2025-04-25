<?php
namespace App\Http\Controllers;

use App\Models\ListingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $request->validate([
            'property_title'   => 'required|string|max:255',
            'description'      => 'required|string',
            'price'            => 'required|numeric',
            'location'         => 'required|string|max:255',
            'property_title'   => 'required|string',
            'property_type'    => 'required',
            'transaction_type' => 'required',
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
            $request->file('photo')->move(storage_path('app/public/images/users'), $filename);
            $profile->photo = $filename; // Save file name in DB
        }

        $listingRequest = ListingRequest::create([
            'user_id'          => auth()->id(),
            'photo'            => $filename,
            'property_title'   => $request->property_title,
            'property_type'    => $request->property_type,
            'address'          => $request->address,
            'location'         => $request->listing_location,
            'transaction_type' => $request->transaction_type,
            'description'      => $request->description,
            'price'            => $request->price,
            'status'           => 'pending',
        ]);

        return redirect()->route('stone.user-profile')->with('success', 'Request Iklan kepada Agen Berhasil Dibuat!');
    }

    public function show()
    {
        //get login agent
        $user    = Auth::user();
        $profile = $user->agentProfile;
        // $selectedLocation = $request->input('location');
        $selectedLocation = $user->agentProfile->address;

        $listingRequests = ListingRequest::query()
            ->whereHas('user.profile', function ($query) use ($user, $selectedLocation) {
                if ($selectedLocation) {
                    $query->where('location', $selectedLocation);
                } else {
                    $query->where('location', $user->agentProfile->address);
                }
            })
            ->with(['user.profile']) // eager load user + profile
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

    // // Delete a listing request
    // public function destroy(ListingRequest $listingRequest)
    // {
    //     $listingRequest->delete();
    //     return redirect()->route('listing_requests.index')->with('success', 'Listing request deleted successfully.');
    // }

    // // Agent accepts a listing request
    // public function accept(ListingRequest $listingRequest)
    // {
    //     $listingRequest->update([
    //         'agent_id' => auth()->id(),
    //         'status'   => 'accepted',
    //     ]);

    //     // Notify the user (seller) about the acceptance
    //     // Notification logic here

    //     return redirect()->route('listing_requests.index')->with('success', 'Listing request accepted successfully.');
    // }

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
