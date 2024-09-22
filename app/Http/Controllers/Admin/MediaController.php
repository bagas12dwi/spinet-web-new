<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = Media::all();
        return view('admin.pages.media.index', [
            'title' => 'Media',
            'media' => $media
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.media.create', [
            'title' => 'Media'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'thumbnails' => 'required|image|mimes:jpg,png,jpeg',
            'document_path' => 'required|mimetypes:application/pdf,video/mp4,image/png,image/jpg,image/jpeg,audio/mpeg',
        ]);

        $validatedData['thumbnails'] = $request->file('thumbnails')->store('media/thumbnails');
        $validatedData['document_path'] = $request->file('document_path')->store('media/media');

        $validatedData['extension'] = $request->file('document_path')->getClientOriginalExtension();

        Media::create($validatedData);
        return redirect()->route('admin.media.index')->with('success', 'Media berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        //
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
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        //
    }
}
