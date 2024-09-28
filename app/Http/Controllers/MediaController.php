<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Models\CommentMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = Media::orderBy('id', 'DESC')->paginate(10);
        return view('users.screens.media.index', [
            'title' => 'Media',
            'media' => $media
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMediaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $medium)
    {
        return view('users.screens.media.detail', [
            'title' => 'Detail Media',
            'media' => $medium
        ]);
    }

    public function storeComment(Request $request, $mediaId)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        CommentMedia::create([
            'comment' => $request->comment,
            'media_id' => $mediaId,
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

        $comment = CommentMedia::findOrFail($commentId);

        CommentMedia::create([
            'comment' => $request->{'reply-comment'},
            'media_id' => $comment->media_id,
            'user_id' => auth()->id(),
            'parent_id' => $commentId,
        ]);

        return redirect()->back()->with('success', 'Reply posted successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMediaRequest $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $medium) {}
}
