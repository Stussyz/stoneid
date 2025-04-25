<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HistoryTransaction;
use Illuminate\Support\Facades\Auth;

class HistoryTransactionController extends Controller
{
    protected $agent, $profile, $listingRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->agent   = Auth::user();
            $this->profile = $this->agent->agentProfile ?? null;
            // $this->listingRequests = $this->profile ?
            // $this->profile->listingRequests()->latest()->get() : collect();

            return $next($request);
        });
    }

    public function index()
    {

        $histories = HistoryTransaction::with('property')
            ->where('agent_profile_id', $this->profile->id)
            ->latest('finalized_at')
            ->paginate(10);

        return view('dashboard.pages.history-listing', compact('histories'), [
            "user"    => $this->agent,
            "profile" => $this->profile,

        ]);
    }
    public function show($id)
    {
        $agentProfile = Auth::user()->agentProfile;

        $history = HistoryTransaction::with(['property', 'userProfile'])
            ->where('agent_profile_id', $agentProfile->id)
            ->findOrFail($id);

        return view('dashboard.pages.old-listing', compact('history'));
    }
}
