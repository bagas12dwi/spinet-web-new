<?php

namespace App\Http\Controllers;

use App\Models\CommentDiscussion;
use App\Models\Discussion;
use App\Models\Question;
use App\Models\WebSetting;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $setting = WebSetting::where('name', 'Kontak')->get();
        $faq = Question::all();
        $diskusi = Discussion::all();
        $comment = CommentDiscussion::all();
        return view('users.screens.kontak.index', [
            'setting' => $setting,
            'question' => $faq,
            'diskusi' => $diskusi,
            'comment' => $comment
        ]);
    }
}
