<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{
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

}
