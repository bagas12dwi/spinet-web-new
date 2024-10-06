<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = WebSetting::orderBy('name', 'ASC')->get();
        return view('admin.pages.setting.index', [
            'title' => 'Setting',
            'setting' => $setting
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.setting.create', [
            'title' => 'Setting'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subtitle' => 'required',
            'description' => 'required',
        ]);

        $validatedData['title'] = 'Banner';
        $validatedData['name'] = 'Banner';
        $validatedData['img_path'] = $request->file('img_path')->store('banner');
        WebSetting::create($validatedData);

        return redirect()->route('admin.setting.index')->with('success', 'Setting berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(WebSetting $webSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WebSetting $setting)
    {
        return view('admin.pages.setting.edit', [
            'title' => 'Setting',
            'setting' => $setting
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WebSetting $setting)
    {
        $validatedData = $request->validate([
            'subtitle' => 'required',
            'description' => 'required'
        ]);

        if ($request->file('img_path')) {
            if ($request->oldImg) {
                Storage::delete($setting->img_path);
            }
            $validatedData['img_path'] = $request->file('img_path')->store('banner');
        }

        WebSetting::where('id', $setting->id)->update($validatedData);

        return redirect()->route('admin.setting.index')->with('success', 'Setting berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebSetting $webSetting)
    {
        //
    }
}
