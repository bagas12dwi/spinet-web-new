<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Models\CommentMedia;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve search query
        $search = $request->input('search');
        // Retrieve selected media types
        $mediaTypes = $request->input('mediaTypes', []);
        // Retrieve selected bahan ajar
        $bahanAjar = $request->input('bahanAjar', []);
        // Retrieve sort option
        $sortMedia = $request->input('sort-media');

        // Start building the query
        $query = Media::query();

        // Apply search filter if provided
        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        // Apply media type filters
        if (!empty($mediaTypes)) {
            // Map media types to corresponding extensions or types
            $typeMappings = [
                'kit' => ['jpg', 'jpeg', 'png', 'pdf'],
                'video' => ['mp4'],
                'audio' => ['mp3'],
                'modul' => ['modul'], // Assuming these are stored as 'modul' in database
                'materi' => ['materi'], // Assuming these are stored as 'materi' in database
            ];

            $query->where(function ($subQuery) use ($mediaTypes, $typeMappings) {
                foreach ($mediaTypes as $type) {
                    if (isset($typeMappings[$type])) {
                        $subQuery->orWhereIn('type', $typeMappings[$type]);
                    }
                }
            });
        }

        // Apply bahan ajar filters
        if (!empty($bahanAjar)) {
            $query->where(function ($subQuery) use ($bahanAjar) {
                foreach ($bahanAjar as $bahan) {
                    $subQuery->orWhere('type', $bahan);
                }
            });
        }

        // Apply sorting
        if ($sortMedia == 'latest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($sortMedia == 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        // Execute the query and paginate results
        $media = $query->paginate(10); // Change 10 to however many items you want per page

        $title = 'Media';
        return view('users.screens.media.index', compact('media', 'title'));
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

        try {
            CommentMedia::create([
                'comment' => $request->{'reply-comment'},
                'media_id' => $comment->media_id,
                'user_id' => auth()->id(),
                'parent_id' => $commentId,
            ]);
        } catch (\Throwable $th) {
            return;
        }

        if (auth()->user()->id != $comment->user_id) {
            Notification::create([
                'user_id' => $comment->user_id,
                'title' => 'Komentar',
                'description' => 'Komentar anda dibalas oleh ' . $comment->user->name,
                'redirect_url' => '/detail-media/' . $comment->media_id
            ]);
        }


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
