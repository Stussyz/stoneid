<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OtpLoginController extends Controller
{
    // Show login form (email/phone input)
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle OTP request
    public function sendOtp(Request $request)
    {
        $request->validate([
            'login' => 'required', // email or phone
        ]);

        $user = User::where('email', $request->login)
            ->orWhere('phone', $request->login)
            ->first();

        if (! $user) {
            return back()->withErrors(['login' => 'User tidak ditemukan.']);
        }

        // Generate and save OTP
        $otp                  = rand(100000, 999999);
        $user->otp_code       = $otp;
        $user->otp_expires_at = now()->addMinutes(1);
        $user->save();

        // Send via email (can switch to SMS)
        Mail::raw("Kode OTP Anda adalah: $otp", function ($message) use ($user) {
            $message->to($user->email)->subject('Kode OTP Login Anda');
        });
        $expiresAt = $user->otp_expires_at;

        // Store user ID in session to verify later
        session(['otp_user_id' => $user->id]);

        return redirect()->route('otp.verify.form')->with('status', 'Kode OTP telah dikirim.');
    }

    // Show OTP form
    public function showVerifyForm()
    {
        $user      = User::find(session('otp_user_id'));
        $expiresAt = $user->otp_expires_at;
        return view('auth.enter-otp', compact('expiresAt'));
    }
    //Resend Otp
    public function resend(Request $request)
    {
        $user = User::find(session('otp_user_id'));

        $otp                  = rand(100000, 999999);
        $user->otp_code       = $otp;
        $user->otp_expires_at = now()->addMinute();
        $user->save();

        // send OTP again here (email or SMS)

        return redirect()->route('otp.verify.form')->with('status', 'OTP baru telah dikirim.');
    }

    // Handle OTP verification
    public function verifyOtp(Request $request)
    {
        // Combine all input digits into one OTP string
        $otp = implode('', [
            $request->input('number1'),
            $request->input('number2'),
            $request->input('number3'),
            $request->input('number4'),
            $request->input('number5'),
            $request->input('number6'),
        ]);

        // Validate OTP length
        if (! preg_match('/^\d{6}$/', $otp)) {
            return back()->withErrors(['otp' => 'Kode OTP tidak valid.']);
        }

        $user = User::find(session('otp_user_id'));

        if (! $user || ! $user->otp_code || $user->otp_code !== $otp) {
            return back()->withErrors(['otp' => 'Kode OTP yang anda masukkan salah!']);
        }

        if (Carbon::parse($user->otp_expires_at)->lt(now())) {
            return back()->withErrors(['otp' => 'Kode OTP telah kedaluwarsa.']);
        }

        // Clear OTP and login
        $user->otp_code       = null;
        $user->otp_expires_at = null;
        $user->save();

        $logUser = Auth::login($user);
        if ($user->hasRole('agent')) {
            return redirect('/dashboard-agent')->with('agent-success', 'login berhasil, selamat datang di halaman dashboard anda!');
        } elseif ($user->hasRole('user')) {
            return redirect()->intended('/');
        }

        // if ($user->role === 'agent') {
        //     return redirect('/dashboard-agent');
        // } else {
        //     return redirect()->intended('/');
        // }

    }

}
