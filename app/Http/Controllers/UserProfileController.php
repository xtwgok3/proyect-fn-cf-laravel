<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('user.profile', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            'photo' => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request->name;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            // Guardar la foto en una carpeta y actualizar el campo 'photo'
            $path = $request->file('photo')->store('profile_photos', 'public');
            $user->photo = $path;
        }

        $user->save();

        return redirect()->route('home')->with('success', 'Perfil actualizado con éxito.');
    }


    public function deletePhoto()
    {
        $user = Auth::user();

        // Eliminar la foto actual (si existe) de la carpeta
        if ($user->photo) {
            $photoPath = public_path('storage/' . $user->photo);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        // Establecer el campo 'photo' a null
        $user->photo = null;
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Foto de perfil eliminada con éxito.');
    }
}
