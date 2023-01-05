<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function homepage() {
        return view('homepage');
    }

    public function post() {
        return view('single-post');
    }

}
