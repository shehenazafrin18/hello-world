<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Socialite;
use Auth;
use Exception;

class AuthController extends Controller {

    protected $redirectTo = '/';

    public function __construct() {

        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function validator(array $data) {

        return Validator::make($data, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|confirmed|min:6',
        ]);
    }

    protected function create(array $data) {

        return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
        ]);
    }

    public function redirectToLinkedin() {

        return Socialite::driver('linkedin')->redirect();
    }

    public function handleLinkedinCallback() {

        try {
            $user = Socialite::driver('linkedin')->user();
            $create['name'] = $user->name;
            $create['email'] = $user->email;
            $create['linkedin_id'] = $user->id;
            $create['password'] = encrypt('123456');
            $newUser = User::create($create);
            Auth::login($newUser);
            return redirect('/home');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback() {

        try {
            $user = Socialite::driver('facebook')->user();
            $create['name'] = $user->name;
            $create['email'] = $user->email;
            $create['facebook_id'] = $user->id;
            $create['password'] = encrypt('123456');
            $newUser = User::create($create);
            Auth::login($newUser);
            return redirect('/home');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function redirectToGithub() {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback() {

        try {
            $user = Socialite::driver('github')->user();
            $create['name'] = $user->name;
            $create['email'] = $user->email;
            $create['facebook_id'] = $user->id;
            $create['password'] = encrypt('123456');
            $newUser = User::create($create);
            Auth::login($newUser);
            return redirect('/home');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

}
