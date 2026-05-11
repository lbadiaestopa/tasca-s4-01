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

    public function step3()
    {
        return view('auth.join-orchestra');
    }

    public function stepOrchestra()
    {
        return view('auth.register-orchestra');
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

    public function createAdminAccount(Request $request)
    {
        $user = request()->user();

        $orchestra = Orchestra::create([
            'name' => null,
            'city' => null,
            'venue' => null,
            'program_id' => null,
        ]);

        Membership::create([
            'user_id' => $user->id,
            'orchestra_id' => $orchestra->id,
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
