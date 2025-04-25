<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{

    public function showRegistration()
    {
        return view('auth.user-register');
    }

    public function register(Request $request)
    {

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Create user
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => 'user', // force as regular user
        ]);

        //assign user role to "user"
        $user->assignRole('user');

        // Create default profile
        UserProfile::create([
            'user_id' => $user->id,
            'photo'   => 'user-default.png',
        ]);

        return redirect('/user/login')->with('success', 'Registrasi berhasil silahkan login!');
    }
}
