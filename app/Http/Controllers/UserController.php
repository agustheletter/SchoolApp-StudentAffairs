<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show landing page
    public function landingPage()
    {
        return view('user.home');
    }
}
