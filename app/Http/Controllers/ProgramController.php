<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Orchestra;

class ProgramController extends Controller
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
    public function create(Orchestra $orchestra)
    {
        return view('orchestras.programs.create', compact('orchestra'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Orchestra $orchestra)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $orchestra->programs()->create($validated);

        return redirect()->route('orchestras.show', $orchestra);
    }

    /**
     * Display the specified resource.
     */
    public function show(Orchestra $orchestra, Program $program)
    {
        return view('orchestras.programs.show', [
            'orchestra' => $orchestra,
            'program' => $program,
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
