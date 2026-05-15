<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rarity;
use Illuminate\Http\Request;

class RarityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rarities = Rarity::all();
        return view('rarities.index', compact('rarities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rarities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newRarity = new Rarity();
        $newRarity->name = $data['name'];
        $newRarity->color_tag = $data['color_tag'] ?? null;
        $newRarity->multiplier = $data['multiplier'] ?? 1;
        $newRarity->save();

        return redirect()->route('admin.rarities.index');
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
        $rarity = Rarity::find($id);
        return view('rarities.edit', compact('rarity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $rarity = Rarity::find($id);
        $rarity->name =$data['name'];
        $rarity->color_tag = $data['color_tag'];
        $rarity->multiplier =$data['multiplier'];
        $rarity->save();

        return redirect()->route('admin.rarities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rarity = Rarity::find($id);
        $rarity->delete();

        return redirect()->route('admin.rarities.index');
    }
}
