<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\WebSetting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $tim = Team::all();
        $setting = WebSetting::where('name', 'Tentang')->get();
        return view('users.screens.tentang.index', [
            'title' => 'Tentang Kami',
            'tim' => $tim,
            'setting' => $setting
        ]);
    }
}
