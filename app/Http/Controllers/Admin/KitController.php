<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = Media::where('type', 'kit')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.pages.kit.index', [
            'title' => 'Kit',
            'media' => $media
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.kit.create', [
            'title' => 'Kit'
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
        $validatedData['type'] = 'kit';

        try {
            $media = Media::create($validatedData);
        } catch (\Throwable $th) {
            return;
        }

        Notification::create([
            'title' => $media->type,
            'description' => 'Ada ' . $media->type . ' baru nih ! Selamat belajar ~',
            'redirect_url' => '/detail-media/' . $media->id
        ]);

        return redirect()->route('admin.kit.index')->with('success', 'Kit berhasil ditambahkan!');
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
    public function edit(Media $kit)
    {
        return view('admin.pages.kit.edit', [
            'title' => 'Media',
            'media' => $kit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $kit)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($request->file('thumbnails')) {
            if ($request->oldThumbnails) {
                Storage::delete($kit->thumbnails);
            }
            $validatedData['thumbnails'] = $request->file('thumbnails')->store('media/thumbnails');
        }

        if ($request->file('document_path')) {
            if ($request->oldDocument) {
                Storage::delete($kit->document_path);
            }
            $validatedData['document_path'] = $request->file('document_path')->store('media/media');
            $validatedData['extension'] = $request->file('document_path')->getClientOriginalExtension();
        }

        Media::where('id', $kit->id)->update($validatedData);

        return redirect()->route('admin.kit.index')->with('success', 'Kit berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $kit)
    {
        Storage::delete($kit->document_path);
        Storage::delete($kit->thumbnails);
        Media::destroy($kit->id);

        return redirect()->route('admin.kit.index')->with('success', 'Kit berhasil dihapus');
    }
}
