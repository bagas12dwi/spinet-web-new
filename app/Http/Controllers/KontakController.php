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

    public function storeComment(Request $request, $discussionId)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        CommentDiscussion::create([
            'comment' => $request->comment,
            'discussion_id' => $discussionId,
            'user_id' => auth()->id(), // Assuming user is authenticated
            'parent_id' => null,
        ]);

        return redirect()->back()->with('success', 'Comment posted successfully.');
    }

    public function storeReply(Request $request, $commentId)
    {
        $request->validate([
            'reply-comment' => 'required|string|max:1000',
        ]);

        $comment = CommentDiscussion::findOrFail($commentId);

        CommentDiscussion::create([
            'comment' => $request->{'reply-comment'},
            'discussion_id' => $comment->discussion_id,
            'user_id' => auth()->id(),
            'parent_id' => $commentId,
        ]);

        return redirect()->back()->with('success', 'Reply posted successfully.');
    }
}
