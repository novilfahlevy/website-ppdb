<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email'], [
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',
        ]);
    
        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        return $status === Password::ResetLinkSent
            ? back()->with(['status' => 'Link reset kata sandi telah dikirim ke email Anda.'])
            : back()->withErrors(['email' => 'Email tidak ditemukan.']);
    }
    
    public function showResetForm(Request $request, $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ], [
            'password.confirmed' => 'Password tidak cocok.',
            'password.min' => 'Password harus memiliki setidaknya 8 karakter.',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
    
        return $status === Password::PasswordReset
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
