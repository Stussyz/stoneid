<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class StonePagesController extends Controller
{
    // Landing Page
    public function index()
    {
        $user    = '';
        $profile = '';
        if (Auth::check()) {
            $user    = Auth::user();
            $profile = $user->hasRole('agent') ? $user->agentProfile : $user->profile;
        }

        return view('stone.pages.home', compact('user', 'profile'));
    }

    // Contact Us Page
    public function contact()
    {
        $user    = '';
        $profile = '';
        if (Auth::check()) {
            $user    = Auth::user();
            $profile = $user->hasRole('agent') ? $user->agentProfile : $user->profile;
        }
        return view('stone.pages.contact-us', compact('user', 'profile'));
    }

    // Mortgage Info Page
    public function mortgage()
    {
        $user    = '';
        $profile = '';
        if (Auth::check()) {
            $user    = Auth::user();
            $profile = $user->hasRole('agent') ? $user->agentProfile : $user->profile;
        }
        return view('stone.pages.mortgage', compact('user', 'profile'));
    }

    public function findAgent()
    {
        $user    = '';
        $profile = '';
        if (Auth::check()) {
            $user    = Auth::user();
            $profile = $user->hasRole('agent') ? $user->agentProfile : $user->profile;
        }
        return view('stone.pages.find-agent', compact('user', 'profile'));
    }

    public function viewAgent()
    {
        $user    = '';
        $profile = '';
        if (Auth::check()) {

            $user    = Auth::user();
            $profile = $user->hasRole('agent') ? $user->agentProfile : $user->profile;
        }
        return view('stone.pages.view-agent', compact('user', 'profile'));
    }

    public function viewListings()
    {
        $user    = '';
        $profile = '';
        if (Auth::check()) {
            $user    = Auth::user();
            $profile = $user->hasRole('agent') ? $user->agentProfile : $user->profile;
        }
        return view('stone.pages.listings', compact('user', 'profile'));
    }

}
