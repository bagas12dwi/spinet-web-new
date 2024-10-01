<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Http\Requests\StoreBookmarkRequest;
use App\Http\Requests\UpdateBookmarkRequest;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookmark = Bookmark::with(['media', 'user'])->where('user_id', auth()->user()->id ?? 0)->paginate(5);
        return view('users.screens.auth-user.bookmark-media.index', [
            'title' => 'Bookmark',
            'bookmark' => $bookmark
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'media_id' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        $existingBookmark = Bookmark::where('user_id', auth()->user()->id)
            ->where('media_id', $request->media_id)
            ->first();

        if (!$existingBookmark) {
            // Create a new bookmark entry
            Bookmark::create($validatedData);

            return response()->json(['message' => 'Bookmark saved successfully!'], 200);
        }

        return response()->json(['message' => 'Bookmark already exists!'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bookmark $bookmark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bookmark $bookmark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookmarkRequest $request, Bookmark $bookmark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bookmark $bookmark)
    {
        //
    }
}
