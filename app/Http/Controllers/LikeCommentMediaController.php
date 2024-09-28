<?php

namespace App\Http\Controllers;

use App\Models\LikeCommentMedia;
use App\Http\Requests\StoreLikeCommentMediaRequest;
use App\Http\Requests\UpdateLikeCommentMediaRequest;
use App\Models\CommentMedia;
use Illuminate\Support\Facades\Auth;

class LikeCommentMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function likeComment($commentId)
    {
        $comment = CommentMedia::findOrFail($commentId);
        $userId = Auth::id();

        // Check if the user has already liked this comment
        $like = LikeCommentMedia::where('user_id', $userId)
            ->where('comment_media_id', $comment->id)
            ->first();

        if (!$like) {
            // Create a new like if it doesn't exist
            LikeCommentMedia::create([
                'user_id' => $userId,
                'comment_media_id' => $comment->id,
            ]);
        } else {
            // Optionally, remove the like if it already exists
            $like->delete();
        }

        return back(); // Redirect back to the previous page
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
    public function store(StoreLikeCommentMediaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LikeCommentMedia $likeCommentMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LikeCommentMedia $likeCommentMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLikeCommentMediaRequest $request, LikeCommentMedia $likeCommentMedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LikeCommentMedia $likeCommentMedia)
    {
        //
    }
}
