<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\CommentDiscussion;
use App\Models\Discussion;
use App\Models\Feedback;
use App\Models\Notification;
use App\Models\Question;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\HtmlString;

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

        try {
            CommentDiscussion::create([
                'comment' => $request->{'reply-comment'},
                'discussion_id' => $comment->discussion_id,
                'user_id' => auth()->id(),
                'parent_id' => $commentId,
            ]);
        } catch (\Throwable $th) {
            return;
        }

        if (auth()->user()->id != $comment->user_id) {
            Notification::create([
                'user_id' => $comment->user_id,
                'title' => 'Diskusi',
                'description' => 'Diskusi anda dibalas oleh ' . $comment->user->name,
                'redirect_url' => '/kontak'
            ]);
        }

        return redirect()->back()->with('success', 'Reply posted successfully.');
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:5000',
        ]);

        // Store the feedback in the database
        $feedback = Feedback::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'user_id' => auth()->user()->id ?? null
        ]);

        // Send an email notification
        // Send an email
        Mail::to('webspinet@gmail.com')->send(new SendMail(
            $request->input('name'),
            $request->input('email'),
            $request->input('message')
        ));

        return redirect()->back()->with('success', 'Feedback sent successfully!');
    }
}
