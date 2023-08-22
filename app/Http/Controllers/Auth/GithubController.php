<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGithubCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
            $finduser = User::where('github_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('dashboard');
            } else {
                $newUser = User::updateOrCreate(['email' => $user->email], [
                    'name' => $user->name,
                    'github_id' => $user->id,
                    'password' => encrypt('123456dummy'),
                ]);
                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}