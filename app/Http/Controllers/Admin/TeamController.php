<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.tim.index', [
            'title' => 'Tim',
            'tim' => Team::orderBy('id', 'DESC')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.tim.create', [
            'title' => 'Tim'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'description' => 'required',
            'img_path' => 'image',
        ]);
        $validatedData['ig_name'] = $request->input('ig_name');
        $validatedData['facebook_name'] = $request->input('facebook_name');
        $validatedData['twitter_name'] = $request->input('twitter_name');
        $validatedData['img_path'] = $request->file('img_path')->store('tim');

        Team::create($validatedData);

        return redirect()->route('admin.tim.index')->with('success', 'Tim berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $tim)
    {
        return view('admin.pages.tim.edit', [
            'title' => 'Tim',
            'tim' => $tim
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $tim)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'description' => 'required',
            'img_path' => 'image'
        ]);

        if ($request->file('img_path')) {
            if ($request->oldImg) {
                Storage::delete($tim->img_path);
            }
            $validatedData['img_path'] = $request->file('img_path')->store('tim');
        }
        $validatedData['ig_name'] = $request->input('ig_name');
        $validatedData['facebook_name'] = $request->input('facebook_name');
        $validatedData['twitter_name'] = $request->input('twitter_name');

        Team::where('id', $tim->id)->update($validatedData);
        return redirect()->route('admin.tim.index')->with('success', 'Data tim berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $tim)
    {
        Storage::delete($tim->img_path);
        Team::destroy($tim->id);

        return redirect()->route('admin.tim.index')->with('success', 'Data tim berhasil dihapus!');
    }
}
