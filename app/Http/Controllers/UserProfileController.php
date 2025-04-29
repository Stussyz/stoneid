<?php
namespace App\Http\Controllers;

use App\Notifications\ListingRequestAccepted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    // Show user profile page
    public function show()
    {

        if ($redirect = $this->denyIfNotUser()) {
            return $redirect;
        }

        $user      = Auth::user();
        $profile   = $user->profile;
        $favorites = $profile
        ? $profile->favoriteProperties()->with('address', 'propertyImages')->latest()->get()
        : collect(); // empty if not logged in or no profile

        //notification delete
        auth()->user()->unreadNotifications()
            ->where('type', ListingRequestAccepted::class)
            ->update(['read_at' => now()]);
                                                                      // get a listing request from user
        $listingRequests = $user->listingRequests()->latest()->get(); // or ->paginate(10)

        return view('stone.pages.user-profile', compact('user', 'profile', 'listingRequests', 'favorites'));
    }

    // Show user edit form
    public function edit()
    {
        if ($redirect = $this->denyIfNotUser()) {
            return $redirect;
        }

        $user    = Auth::user();
        $profile = $user->profile;
        return view('stone.pages.user-edit-profile', compact('user', 'profile'));
    }

    // Handle profile update
    public function update(Request $request)
    {
        if ($redirect = $this->denyIfNotUser()) {
            return $redirect;
        }

        $request->validate([
            'phone'       => 'nullable|string',
            'address'     => 'nullable|string',
            'description' => 'nullable|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'name'        => 'required|string|max:255',
            'email'       => 'required|email',
            'password'    => 'required|confirmed|min:8',
        ]);

        $user    = Auth::user();
        $profile = $user->profile;

        // Handle photo upload
        if ($request->hasFile('photo')) {

            $filename = uniqid('user_') . '.' . $request->file('photo')->getClientOriginalExtension();

            //FOR PRODUCTION USE THIS:
            // $path           = $request->file('photo')->storeAs('public', $filename);

            //this is only for development
            $request->file('photo')->move(storage_path('app/public/images/users'), $filename);
            $profile->photo = $filename; // Save file name in DB
        }
        $profile->update([
            'address'     => $request->address,
            'description' => $request->description,
        ]);

        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => $request->password,
        ]);

        return redirect()->route('stone.user-profile')->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Helper function to redirect guest or wrong role
     */
    private function denyIfNotUser()
    {
        if (! Auth::check() || ! Auth::user()->hasRole('user')) {
            return redirect()->route('user.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return null;
    }

}
