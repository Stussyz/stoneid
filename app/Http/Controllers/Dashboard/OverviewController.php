<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OverviewController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Fetch agent profile
        $profile = $user->agentProfile;

        // Get listing requests assigned to this agent
        $listingRequests = $profile ? $profile->listingRequests()->latest()->get() : collect();
        // empty if no profile

        return view('dashboard.pages.index', compact('user', 'profile', 'listingRequests'));
        // return view('dashboard.pages.index');
    }
}
