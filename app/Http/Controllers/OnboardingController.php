<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orchestra;
use App\Models\Membership;

class OnboardingController extends Controller
{
    public function step2()
    {
        return view('auth.register-2');
    }

    public function createMemberAccount()
    {
        $user = request()->user();

        Membership::create([
            'user_id' => $user->id,
            'role' => 'member',
            'member_type' => null,
            'instrument' => null,
            'section' => null,
            'joined_at' => now(),
        ]);

        $user->onboarding_completed = true;

        $user->save();

        return redirect()->route('dashboard');
    }

    public function createAdminAccount()
    {
        $user = request()->user();

        Membership::create([
            'user_id' => $user->id,
            'role' => 'admin',
            'member_type' => null,
            'instrument' => null,
            'section' => null,
            'joined_at' => now(),
        ]);

        $user->onboarding_completed = true;

        $user->save();

        return redirect()->route('dashboard');
    }
}
