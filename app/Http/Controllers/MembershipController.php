<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use App\Models\Orchestra;
use App\Models\User;

class MembershipController extends Controller
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

        return view('orchestras.memberships.create', [
            'orchestras' => $orchestras,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'orchestra_id' => ['required', 'exists:orchestras,id'],
            'member_type' => ['required', 'in:core,substitute,guest'],
            'instrument' => ['required', 'string', 'max:255'],
            'section' => [
                'required',
                'in:violin_1,violin_2,viola,cello,double_bass,
                french_horn,trumpet,trombone,tuba,
                flute,oboe,clarinet,bassoon,
                percussion,mallet,vocal,other'
            ],
        ]);

        $user = User::where('email', $validated['email'])->firstOrFail();

        $membership = Membership::create([
            'user_id' => $user->id,
            'orchestra_id' => $validated['orchestra_id'],
            'member_type' => $validated['member_type'],
            'instrument' => $validated['instrument'],
            'section' => $validated['section'],
        ]);

        return redirect()->route('members.show', [
            $membership->orchestra_id,
            $membership->id
        ]);
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
    public function edit(Orchestra $orchestra, Membership $membership)
    {
        $orchestras = Orchestra::with('programs.events')->get();

        return view('orchestras.memberships.edit', [
            'orchestras' => $orchestras,
            'orchestra' => $orchestra,
            'membership' => $membership,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orchestra $orchestra, Membership $membership)
    {
        $validated = $request->validate([
            'member_type' => 'required|in:core,substitute,guest',
            'instrument'  => 'required|string|max:255',
            'section'     => 'required|in:violin_1,violin_2,viola,cello,double_bass,french_horn,trumpet,trombone,tuba,flute,oboe,clarinet,bassoon,percussion,mallet,vocal,other',
        ]);

        $membership->update($validated);

        return redirect()->route('members.show', [$orchestra, $membership]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orchestra $orchestra, Membership $membership)
    {
        $membership->delete();

        return redirect()->route('orchestras.show', $orchestra);
    }
}
