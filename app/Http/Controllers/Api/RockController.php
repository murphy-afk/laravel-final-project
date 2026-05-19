<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rock;
use Illuminate\Http\Request;

class RockController extends Controller
{
    public function index()
    {
        $rocks = Rock::with(['type', 'mood', 'rarity', 'skills'])->get();
        return response()->json([
            'success' => true,
            'data' => $rocks
        ]);
    }
}
