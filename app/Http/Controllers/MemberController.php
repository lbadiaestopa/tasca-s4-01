<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Membership;
use App\Models\Orchestra;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orchestras = auth()->user()
            ->adminOrchestras;

        return view('members.create', [
            'orchestras' => $orchestras,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'orchestra_id' => ['required', 'exists:orchestras,id'],
            'member_type' => ['nullable', 'in:core,substitute,guest'],
            'instrument' => ['nullable', 'string', 'max:255'],
            'section' => ['nullable', 'in:violin_1,violin_2,viola,cello,double_bass,french_horn,trumpet,trombone,tuba,flute,oboe,clarinet,bassoon,percussion,mallet,vocal,other'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Membership::create([
            'user_id' => $user->id,
            'orchestra_id' => $request->orchestra_id,
            'role' => 'member',
            'member_type' => $request->member_type,
            'instrument' => $request->instrument,
            'section' => $request->section,
            'joined_at' => now(),
        ]);

        return redirect()->route('orchestras');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orchestra $orchestra, Membership $membership)
    {   
        $orchestras = Orchestra::with('programs.events')->get();
        $membership->load('user');

        return view('members.show', [
            'orchestras' => $orchestras,
            'orchestra' => $orchestra,
            'membership' => $membership,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
