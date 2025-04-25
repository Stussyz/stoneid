<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AgentProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentRegisterController extends Controller
{

    public function index()
    {
        return view('auth.agent-register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'                => 'required|string|max:255',
            'email'               => 'required|email|unique:users,email',
            'password'            => 'required|confirmed|min:8',
            'address.street'      => 'required|string|max:255',
            'address.village'     => 'required|string|max:255',
            'address.district'    => 'required|string|max:255',
            'address.city'        => 'required|string|max:255',
            'address.province'    => 'required|string|max:255',
            'address.postal_code' => 'required|string|max:20',
        ]);

        // Create user
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => 'user', // force as regular user
        ]);

                                                                                    //generate NIB
        $prefix       = '10';                                                       // fixed starting digits
        $randomDigits = str_pad(mt_rand(0, 99999999999999), 14, '0', STR_PAD_LEFT); // 14 random digits
        $nib          = $prefix . $randomDigits;

        //make sure NIB is unique
        do {
            $nib = $this->generateAgentId();
        } while (\App\Models\AgentProfile::where('NIB', $nib)->exists());

        //Create agent
        $agent = $user->agentProfile->create([
            'NIB'   => $nib,
            'level' => 'Basic', //default level
        ]);

        // Create address
        $agent->address()->create([
            'street'      => $validated['address']['street'],
            'village'     => $validated['address']['village'],
            'district'    => $validated['address']['district'],
            'city'        => $validated['address']['city'],
            'province'    => $validated['address']['province'],
            'postal_code' => $validated['address']['postal_code'],
        ]);

        //assign user role to "agent"
        $user->assignRole('agent');

        // Create default profile
        AgentProfile::create([
            'user_id' => $user->id,
            'photo'   => 'user-default.png',
        ]);

        return redirect()->route('dashboard-agent.index')->with('success', 'Registrasi agen berhasil! Selamat datang di halaman dashboard anda.');
    }

    private function generateAgentId(): string
    {
        $prefix       = '10';                                                       // fixed starting digits
        $randomDigits = str_pad(mt_rand(0, 99999999999999), 14, '0', STR_PAD_LEFT); // 14 random digits
        return $prefix . $randomDigits;
    }
}
