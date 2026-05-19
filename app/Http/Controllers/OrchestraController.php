<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orchestra;
use App\Models\Membership;
use App\Models\Event;

class OrchestraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orchestras = Orchestra::with('programs.events')->get();

        $events = Event::with(['program.orchestra'])
            ->orderBy('start_date')
            ->get();

        return view('orchestras.index', [
            'events' => $events,
            'orchestras' => $orchestras,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orchestras.create');
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

        $membership = Membership::where('user_id', $user->id)->first();

        if ($membership && is_null($membership->orchestra_id)) {
            $membership->update([
                'orchestra_id' => $orchestra->id,
            ]);
        } else {
            Membership::create([
                'user_id' => $user->id,
                'orchestra_id' => $orchestra->id,
                'role' => 'admin',
                'joined_at' => now(),
            ]);
        }

        $user->refresh();

        return redirect()->route('orchestras');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orchestra = Orchestra::with('programs.events')->findOrFail($id);
        $orchestras = Orchestra::with('programs.events')->get();

        return view('orchestras.show', [
            'orchestra' => $orchestra,
            'orchestras' => $orchestras,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orchestra = Orchestra::findOrFail($id);

        return view('orchestras.edit', [
            'orchestra' => $orchestra,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orchestra = Orchestra::findOrFail($id);

        $orchestra->update([
            'name' => $request->name,
            'city' => $request->city,
            'venue' => $request->venue,
        ]);

        return redirect()->route('orchestras.show', $orchestra->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orchestra $orchestra)
    {
        $orchestra->delete();

        return redirect()->route('orchestras');
    }
}
