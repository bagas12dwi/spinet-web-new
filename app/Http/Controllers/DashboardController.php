<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Media;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $media = Media::orderBy('id', 'DESC')->paginate(4);
        $feedback = Feedback::where('is_showing', true)->orderBy('id', 'DESC')->paginate(4);

        return view('users.screens.dashboard.index', [
            'media' => $media,
            'feedback' => $feedback
        ]);
    }
}
