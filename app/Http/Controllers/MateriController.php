<?php

namespace App\Http\Controllers;

use App\Models\WebSetting;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $setting = WebSetting::where('name', 'Materi')->get();
        $banner = WebSetting::where('name', 'Banner')->get();

        return view('users.screens.materi.index', [
            'title' => 'Materi',
            'setting' => $setting,
            'banner' => $banner
        ]);
    }
}
