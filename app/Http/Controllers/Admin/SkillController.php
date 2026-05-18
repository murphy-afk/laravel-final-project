<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        return view('skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newSkill = new Skill();
        $newSkill->name = $data['name'];
        $newSkill->description = $data['description'] ?? null;
        $newSkill->power_level = $data['power_level'];
        $newSkill->save();

        return redirect()->route('admin.skills.index');
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
    public function edit(string $id)
    {
        $skill = Skill::find($id);
        return view('skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $skill = Skill::find($id);
        $skill->name = $data['name'];
        $skill->description = $data['description'] ?? null;
        $skill->power_level = $data['power_level'];
        $skill->save();

        return redirect()->route('admin.skills.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::find($id);

        if ($skill->rocks()->count() > 0) {
            return redirect()->route('admin.skills.index')
                ->with('error', 'Cannot delete this skill because rocks are using it');
        }

        $skill->delete();

        return redirect()->route('admin.skills.index');
    }
}
