<?php

namespace App\Http\Controllers;

use App\Models\WebSetting;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function index()
    {
        $setting = WebSetting::where('name', 'Modul')->get();
        return view('users.screens.modul.index', [
            'setting' => $setting
        ]);
    }
}
