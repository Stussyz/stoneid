<?php
namespace App\Http\Controllers;

use App\Models\AgentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FindAgentController extends Controller
{

    public function index(Request $request)
    {

        $user    = '';
        $profile = '';
        if (Auth::check()) {
            $user    = Auth::user();
            $profile = $user->hasRole('agent') ? $user->agentProfile : $user->profile;
        }
        $agents = AgentProfile::with(['user', 'address'])
            ->latest()
            ->paginate(15);

        // $agents = AgentProfile::with(['user', 'address'])
        //     ->whereHas('address', function ($query) use ($request) {
        //         if ($request->filled('city')) {
        //             $query->where('city', $request->city);
        //         }
        //     })
        //     ->latest()
        //     ->paginate(15);
        return view('stone.pages.find-agent', compact('agents', 'user', 'profile'));
    }

    public function show($id)
    {
        $user    = '';
        $profile = '';
        if (Auth::check()) {
            $user    = Auth::user();
            $profile = $user->hasRole('agent') ? $user->agentProfile : $user->profile;
        }

        $agentProfile = AgentProfile::with(['user', 'properties.transactions'])->findOrFail($id);

        $totalListings = $agentProfile->properties->count();

        $saleListings = $agentProfile->properties->where('transaction_type', 'Dijual')->count();
        $rentListings = $agentProfile->properties->where('transaction_type', 'Disewa')->count();

        $totalAchieved = $agentProfile->properties
            ->filter(function ($property) {
                return $property->transaction_type === 'Dijual' &&
                $property->transactions->first()?->status === 'completed';
            })
            ->sum(function ($property) {
                return $property->transactions->first()?->additional_data['final_price'] ?? 0;
            });

        return view('stone.pages.view-agent', compact(
            'user',
            'profile',
            'agentProfile',
            'totalListings',
            'saleListings',
            'rentListings',
            'totalAchieved'
        ));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
