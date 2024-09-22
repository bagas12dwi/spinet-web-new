<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = Media::where('type', 'modul')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.pages.modul.index', [
            'title' => 'Modul',
            'media' => $media
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.modul.create', [
            'title' => 'Modul'
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
        $validatedData['type'] = 'modul';

        Media::create($validatedData);
        return redirect()->route('admin.modul.index')->with('success', 'Modul berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $medium) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $medium)
    {
        return view('admin.pages.modul.edit', [
            'title' => 'Media',
            'media' => $medium
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $medium)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($request->file('thumbnails')) {
            if ($request->oldThumbnails) {
                Storage::delete($medium->thumbnails);
            }
            $validatedData['thumbnails'] = $request->file('thumbnails')->store('media/thumbnails');
        }

        if ($request->file('document_path')) {
            if ($request->oldDocument) {
                Storage::delete($medium->document_path);
            }
            $validatedData['document_path'] = $request->file('document_path')->store('media/media');
            $validatedData['extension'] = $request->file('document_path')->getClientOriginalExtension();
        }

        Media::where('id', $medium->id)->update($validatedData);

        return redirect()->route('admin.modul.index')->with('success', 'Media berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $medium)
    {
        Storage::delete($medium->document_path);
        Storage::delete($medium->thumbnails);
        Media::destroy($medium->id);

        return redirect()->route('admin.media.index')->with('success', 'Media berhasil dihapus');
    }
}
