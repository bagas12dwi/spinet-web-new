<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Media;
use App\Models\Visitor;
use App\Models\WebSetting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $media = Media::orderBy('id', 'DESC')->paginate(4);
        $feedback = Feedback::where('is_showing', true)->orderBy('id', 'DESC')->paginate(4);
        $setting = WebSetting::where('name', 'Banner')->get();
        $pengunjung = Visitor::all();

        return view('users.screens.dashboard.index', [
            'title' => 'Home',
            'media' => $media,
            'feedback' => $feedback,
            'setting' => $setting,
            'pengunjung' => $pengunjung
        ]);
    }
}
