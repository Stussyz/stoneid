<?php
namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $properties = Property::with('address', 'propertyImages', 'details')
            ->whereHas('transactions', function ($query) {
                $query->where('status', 'initiated');
            })->where('status', 'published')->latest()->paginate(15); // Optional: add published filter
                                                                  // ;
        $user          = '';
        $profile       = '';
        $userFavorites = '';
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->hasRole('user')) {
                $profile       = $user->profile;
                $userFavorites = $profile
                ? $profile->favoriteProperties()->pluck('properties.id')->toArray()
                : [];
            } else {
                $profile      = $user->agentProfile;
                $userFavorite = null; //undefined, because only user can access and use the favorite feature.
            }

        }

        return view('stone.pages.listings', compact('properties', 'user', 'profile', 'userFavorites'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id_preview)
    {
        $user    = '';
        $profile = '';
        if (Auth::check()) {
            $user    = Auth::user();
            $profile = $user->hasRole('agent') ? $user->agentProfile : $user->profile;
        }

        $property = Property::with('address', 'propertyImages', 'agentProfile', 'videos',
            'details', 'facilities')
            ->where('id_preview', $id_preview)
            ->firstOrFail();

        return view('stone.pages.property', compact('property', 'user', 'profile'));
    }

    public function toggleFavorite(Request $request, Property $property)
    {
        $userProfile = auth()->user()->profile;

        if ($userProfile->favoriteProperties()->where('property_id', $property->id)->exists()) {
            $userProfile->favoriteProperties()->detach($property->id);
            return response()->json(['favorited' => false]);
        } else {
            $userProfile->favoriteProperties()->attach($property->id);
            return response()->json(['favorited' => true]);
        }
    }

    public function removeFavorite(Request $request, Property $property)
    {
        $userProfile = auth()->user()->profile;
        $userProfile->favoriteProperties()->detach($property->id);
        return redirect()->route('stone.user-profile')->with('success_remove_favorite', 'Property dihapus dari favorit');
    }

}
