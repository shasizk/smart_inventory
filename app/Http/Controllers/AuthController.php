<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.index');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $request->session()->regenerate();

            return redirect()->route('admin.index');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function showRegisterForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.index');
        }

        return view('auth.register');
    }


public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'role' => ['required', 'in:super_admin,admin,teknisi,noc'],
        'phone' => ['nullable', 'string', 'max:255'],
        'address' => ['nullable', 'string'],
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'role' => $request->role,
        'phone' => $request->phone,
        'address' => $request->address,
    ]);

    $otp = (string) rand(100000, 999999);

    session([
        'otp_code' => $otp,
        'otp_email' => $request->email,
    ]);

    Mail::to($request->email)->send(new SendOtpMail($otp));

    return redirect()->route('verify.otp');
}

public function showVerifyOtpForm()
{
    return view('auth.verify-otp', [
        'email' => session('otp_email', 'email@domain.com'),
    ]);
}


public function verifyOtp(Request $request)
{
    $request->validate([
        'otp_code' => ['required', 'string', 'size:6'],
    ]);

    $otp = session('otp_code');

    if (!$otp) {
        return back()->withErrors([
            'otp_code' => 'Kode OTP tidak ditemukan atau sudah kadaluarsa.'
        ]);
    }

    if ((string) $request->otp_code !== (string) $otp) {
        return back()->withErrors([
            'otp_code' => 'Kode OTP salah.'
        ]);
    }

    session()->forget(['otp_code', 'otp_email']);

    return redirect()->route('login')->with('success', 'OTP berhasil diverifikasi. Silakan login.');
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}