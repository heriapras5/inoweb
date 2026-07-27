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
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            Log::error('Google login callback failed', ['error' => $e->getMessage()]);
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
