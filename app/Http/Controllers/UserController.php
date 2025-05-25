<?php

namespace App\Http\Controllers;

use App\Models\GuruModel;
use App\Models\SiswaModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show landing page
    public function landingPage()
    {
        return view('user.home');
    }

    public function Request()
    {
        $gurus = GuruModel::all();
        $siswas = SiswaModel::all();
        return view('user.request', compact('gurus', 'siswas'));
    }

    
}
