<?php

namespace App\Http\Controllers;

use App\Models\LikeCommentDiscussion;
use App\Http\Requests\StoreLikeCommentDiscussionRequest;
use App\Http\Requests\UpdateLikeCommentDiscussionRequest;
use App\Models\CommentDiscussion;
use Illuminate\Support\Facades\Auth;

class LikeCommentDiscussionController extends Controller
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
        $comment = CommentDiscussion::findOrFail($commentId);
        $userId = Auth::id();

        // Check if the user has already liked this comment
        $like = LikeCommentDiscussion::where('user_id', $userId)
            ->where('comment_discussion_id', $comment->id)
            ->first();

        if (!$like) {
            // Create a new like if it doesn't exist
            LikeCommentDiscussion::create([
                'user_id' => $userId,
                'comment_discussion_id' => $comment->id,
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
    public function store(StoreLikeCommentDiscussionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LikeCommentDiscussion $likeCommentDiscussion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LikeCommentDiscussion $likeCommentDiscussion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLikeCommentDiscussionRequest $request, LikeCommentDiscussion $likeCommentDiscussion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LikeCommentDiscussion $likeCommentDiscussion)
    {
        //
    }
}
