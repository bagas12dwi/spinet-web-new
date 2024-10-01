<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('users.screens.auth-user.profile.index', [
            'title' => 'Profile',
            'user' => $user
        ]);
    }

    public function updateFoto(User $user, Request $request)
    {
        $validatedImg = $request->validate([
            'img_path' => 'required|image'
        ]);

        if ($request->file('img_path')) {
            if ($request->oldImg != 'profile/default.png') {
                Storage::delete($user->img_path);
            }
            $validatedImg['img_path'] = $request->file('img_path')->store('profile');
        }

        User::where('id', $user->id)->update([
            'img_path' => $validatedImg['img_path']
        ]);

        return redirect()->route('user.profile')->with('success', 'Foto Profil berhasil diubah!');
    }

    public function update(User $user, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'address' => 'required',
            'gender' => 'required'
        ]);

        User::where('id', $user->id)->update($validatedData);
        return redirect()->route('user.profile')->with('success', 'Foto Profil berhasil diperbarui!');
    }

    public function changePassword(User $user, Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|min:6'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::where('id', $user->id)->update($validatedData);

        return redirect()->route('user.profile')->with('success', 'Password berhasil diperbarui!');
    }
}
