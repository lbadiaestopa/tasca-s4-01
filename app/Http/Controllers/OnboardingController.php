<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnboardingController extends Controller
{
    public function step2()
    {
        return view('auth.register-2');
    }

    public function step3()
    {
        return view('join-orchestra');
    }
}
