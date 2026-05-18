<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mood;
use App\Models\Rarity;
use App\Models\Rock;
use App\Models\RockType;
use App\Models\Skill;
use Illuminate\Http\Request;

class RockController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $query = Rock::query()->with(['type', 'mood', 'rarity', 'skills']);

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        if ($request->filled('mood_id')) {
            $query->where('mood_id', $request->mood_id);
        }

        if ($request->filled('skill_id')) {
            $query->whereHas('skills', function ($q) use ($request) {
                $q->where('skills.id', $request->skill_id);
            });
        }

        $rocks = $query->get();

        return view('rocks.index', [
            'rocks' => $rocks,
            'types' => RockType::all(),
            'moods' => Mood::all(),
            'skills' => Skill::all(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rocks.create', [
            'moods' => Mood::all(),
            'types' => RockType::all(),
            'rarities' => Rarity::all(),
            'skills' => Skill::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newRock = new Rock();
        $newRock->name = $data['name'];
        $newRock->weight = $data['weight'];
        $newRock->texture = $data['texture'];
        $newRock->color = $data['color'];
        $newRock->price = $data['price'];
        $newRock->origin_story = $data['origin_story'];
        $newRock->mood_id = $data['mood_id'];
        $newRock->rarity_id = $data['rarity_id'];
        $newRock->type_id = $data['type_id'];
        $newRock->save();

        if ($request->has('skills')) {
            $newRock->skills()->attach($data['skills']);
        }

        return redirect()->route('admin.rocks.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rock = Rock::with(['rarity', 'mood', 'type', 'skills'])->find($id);
        return view('rocks.show', compact('rock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rock = Rock::with(['rarity', 'mood', 'type', 'skills'])->find($id);
        return view('rocks.edit', [
            'rock' => $rock,
            'moods' => Mood::all(),
            'types' => RockType::all(),
            'rarities' => Rarity::all(),
            'skills' => SKill::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $rock = Rock::find($id);
        $rock->name = $data['name'];
        $rock->weight = $data['weight'];
        $rock->texture = $data['texture'];
        $rock->color = $data['color'];
        $rock->price = $data['price'];
        $rock->origin_story = $data['origin_story'];
        $rock->mood_id = $data['mood_id'];
        $rock->rarity_id = $data['rarity_id'];
        $rock->type_id = $data['type_id'];
        $rock->save();
        return redirect()->route('admin.rocks.show', $rock->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rock = Rock::find($id);
        $rock->skills()->detach();
        $rock->delete();
        return redirect()->route('admin.rocks.index');
    }
}
