<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orchestra;
use App\Models\Membership;

class OrchestraController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
        ]);

        $user = auth()->user();

        $orchestra = Orchestra::create($validated);

        $user->update([
            'onboarding_completed' => true
        ]);

        $user->refresh();

        Membership::create([
            'user_id' => $user->id,
            'orchestra_id' => $orchestra->id,
            'role' => 'admin',
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orchestra $orchestra)
    {
        return view('orchestras.edit', [
            'orchestra' => $orchestra,
        ]);
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
