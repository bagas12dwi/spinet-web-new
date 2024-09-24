<?php

namespace App\Http\Controllers;

use App\Models\WebSetting;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $setting = WebSetting::where('name', 'Materi')->get();
        return view('users.screens.materi.index', [
            'setting' => $setting
        ]);
    }
}
