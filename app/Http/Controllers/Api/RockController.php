<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rock;
use Illuminate\Http\Request;

class RockController extends Controller
{
    public function index()
    {
        $rocks = Rock::with(['type', 'mood', 'rarity', 'skills'])
            ->where('adopted', false)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $rocks
        ]);
    }

    public function show($id)
    {
        $rock = Rock::with(['type', 'mood', 'rarity', 'skills'])->find($id);

        if (!$rock) {
            return response()->json([
                'success' => false,
                'message' => 'Rock not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $rock
        ]);
    }
    public function adopt($id)
    {
        $rock = Rock::find($id);

        if (!$rock) {
            return response()->json([
                'success' => false,
                'message' => 'Rock not found'
            ], 404);
        }

        if ($rock->adopted) {
            return response()->json([
                'success' => false,
                'message' => 'This rock has already been adopted!'
            ], 400);
        }

        $rock->adopted = true;
        $rock->save();

        return response()->json([
            'success' => true,
            'message' => 'Rock adopted successfully!',
            'data' => $rock
        ]);
    }

    public function adopted()
    {
        $rocks = Rock::where('adopted', true)->get();

        return response()->json([
            'data' => $rocks
        ]);
    }


}
