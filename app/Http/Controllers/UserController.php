<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    //Register new account
    public function registerAccount(Request $request) {
        $incomingFields = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create($incomingFields);
        return '<h1>Hello from this shit</h1>';
    }
}
