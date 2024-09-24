<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diskusi = Discussion::paginate(10);
        return view('admin.pages.diskusi.index', [
            'title' => 'Diskusi',
            'diskusi' => $diskusi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.diskusi.create', [
            'title' => 'Diskusi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required'
        ]);

        Discussion::create($validatedData);

        return redirect()->route('admin.diskusi.index')->with('success', 'Diskusi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discussion $discussion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discussion $diskusi)
    {
        return view('admin.pages.diskusi.edit', [
            'title' => 'Diskusi',
            'diskusi' => $diskusi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discussion $diskusi)
    {
        $validatedData = $request->validate([
            'title' => 'required'
        ]);

        Discussion::where('id', $diskusi->id)->update($validatedData);

        return redirect()->route('admin.diskusi.index')->with('success', 'Diskusi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discussion $diskusi)
    {
        Discussion::destroy($diskusi->id);
        return redirect()->route('admin.diskusi.index')->with('success', 'Diskusi berhasil dihapus!');
    }
}
