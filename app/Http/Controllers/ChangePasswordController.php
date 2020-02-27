<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;

class ChangePasswordController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('change_password');
    }

    public function store(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'new_confirm_password' => 'required_with:new_password|same:new_password',
        ]);
        $data = $request->all();
        $user = User::find(auth()->user()->id);
        if (!Hash::check($data['current_password'], $user->password)) {
            return back()->with('error', 'The specified password does not match the database password');
        } else {
            $user->update(['password' => Hash::make($request->new_password)]);
            return Redirect()->to('home');
        }
    }

}
