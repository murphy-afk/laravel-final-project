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
    public function index()
    {
        $rocks = Rock::with(['rarity', 'mood', 'type'])->get();
        return view('rocks.index', compact('rocks') );
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
        return 'store';
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
