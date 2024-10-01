<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Http\Requests\StoreDownloadRequest;
use App\Http\Requests\UpdateDownloadRequest;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $download = Download::with(['media', 'user'])->where('user_id', auth()->user()->id ?? 0)->paginate(5);
        return view('users.screens.auth-user.unduhan.index', [
            'title' => 'Bookmark',
            'download' => $download
        ]);
    }

    public function download(Request $request, $mediaId)
    {
        // Retrieve the media record
        $media = Media::findOrFail($mediaId);

        // Save the download record in the 'downloads' table
        Download::create([
            'user_id' => Auth::id(),          // assuming user is logged in
            'media_id' => $media->id,
        ]);

        // Proceed with the file download
        $filePath = storage_path('app/public/' . $media->document_path);

        return response()->download($filePath);
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
    public function store(StoreDownloadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Download $download)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Download $download)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDownloadRequest $request, Download $download)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Download $download)
    {
        //
    }
}
