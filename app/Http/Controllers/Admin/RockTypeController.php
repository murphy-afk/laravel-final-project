<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RockType;
use Illuminate\Http\Request;

class RockTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = RockType::all();
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newTyper = new RockType();
        $newTyper->name = $data['name'];
        $newTyper->description = $data['description'] ?? null;
        $newTyper->save();
        return redirect()->route('admin.types.index');
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
        $type = RockType::find($id);
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $type = RockType::find($id);
        $type->name = $data['name'];
        $type->description = $data['description'] ?? null;
        $type->save();
        return redirect()->route('admin.types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $type = RockType::find($id);

        if ($type->rocks()->count() > 0) {
            return redirect()->route('admin.types.index')
                ->with('error', 'Cannot delete this type because rocks are using it');
        }

        $type->delete();

        return redirect()->route('admin.types.index');
    }


}
