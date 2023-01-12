<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller {
    //Register new account
    public function registerAccount(Request $request) {
        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min: 5', 'confirmed']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        User::create($incomingFields);
        return '<h1>Hello from this shit</h1>';
    }
    
    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginusername' => 'required', 
            'loginpassword' => 'required'
        ]);

        if(auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return 'congrats';
        } else {
            return 'sorry';
        }
    }

    public function showCorrectHomepage() {
        if(auth()->check()) {
            return view('homepage-feed');
        } else {
            return view('homepage');
        }
    }

    public function logout() {
        auth()->logout();
        return "you are now logged out";
    }
}
