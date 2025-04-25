<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class RentUtilityController extends Controller
{
    protected $agent, $profile;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->agent   = Auth::user();
            $this->profile = $this->agent->agentProfile;

            return $next($request);
        });
    }

    public function show($id_preview)
    {
        $property = Property::where('id_preview', $id_preview)->firstOrFail();

        // Ensure only rent listings
        abort_if($property->transaction_type !== 'Disewa', 403);

        return view('dashboard.pages.rent', compact('property'), [
            'user'    => $this->agent,
            'profile' => $this->profile,
        ]);
    }
}
