<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Orchestra;
use App\Models\Event;
use App\Enums\EventType;

class EventController extends Controller
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
    public function create(Orchestra $orchestra, Program $program)
    {
        return view('orchestras.programs.events.create', compact('orchestra', 'program'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Orchestra $orchestra, Program $program)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:rehearsal,concert,soundcheck',
            'venue' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $program->events()->create($validated);

        return redirect()->route('programs.show', [$orchestra, $program]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Orchestra $orchestra, Program $program, Event $event)
    {
        return view('orchestras.programs.events.show', [
            'orchestra' => $orchestra,
            'program' => $program,
            'event' => $event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orchestra $orchestra, Program $program, Event $event)
    {
        return view('orchestras.programs.events.edit', [
            'orchestra' => $orchestra,
            'program' => $program,
            'event' => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orchestra $orchestra, Program $program, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:rehearsal,concert,soundcheck',
            'venue' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $event->update($validated);

        return redirect()->route('events.show', [$orchestra, $program, $event]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orchestra $orchestra, Program $program, Event $event)
    {
        $event->delete();

        return redirect()->back();
    }
}
