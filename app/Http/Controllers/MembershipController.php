<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use App\Models\Orchestra;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
