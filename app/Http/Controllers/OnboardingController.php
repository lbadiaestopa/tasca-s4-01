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
        return view('auth.join-orchestra');
    }

    public function join(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string'],
        ]);

        $user = auth()->user();
        $user->onboarding_completed = true;
        $user->save();

        return redirect()->route('dashboard');
    }
}
