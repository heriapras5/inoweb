<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirect()
    {
        try {
            $redirectUrl = route('auth.google.callback');
            return Socialite::driver('google')->redirectUrl($redirectUrl)->redirect();
        } catch (\Exception $e) {
            Log::error('Google login redirect failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('login')->withErrors(['email' => 'Gagal menghubungkan ke Google. Silakan coba lagi.']);
        }
    }

    public function callback()
    {
        try {
            $redirectUrl = route('auth.google.callback');
            $googleUser = Socialite::driver('google')->redirectUrl($redirectUrl)->user();
        } catch (\Exception $e) {
            Log::error('Google login callback failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('login')->withErrors(['email' => 'Gagal masuk dengan Google. Silakan coba lagi.']);
        }

        $user = User::where('google_id', $googleUser->getId())->first();

        if (!$user) {
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                $user->update(['google_id' => $googleUser->getId(), 'avatar' => $googleUser->getAvatar()]);
            } else {
                return redirect()->route('login')->withErrors(['email' => 'Akun Google ini tidak terdaftar. Hubungi admin untuk akses.']);
            }
        }

        if (!$user->is_admin) {
            return redirect()->route('login')->withErrors(['email' => 'Akun ini tidak memiliki akses admin.']);
        }

        Auth::login($user, true);
        request()->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }
}
