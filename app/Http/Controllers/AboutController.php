<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $tim = Team::all();
        return view('users.screens.tentang.index', [
            'title' => 'Tentang Kami',
            'tim' => $tim
        ]);
    }
}
