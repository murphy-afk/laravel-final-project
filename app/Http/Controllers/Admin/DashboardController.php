<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rock;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home() {
        $rocks = Rock::all();
        dd($rocks);
    }

}
