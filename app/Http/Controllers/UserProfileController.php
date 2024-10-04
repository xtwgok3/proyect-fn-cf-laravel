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
            'name' => 'required|string|max:50|regex:/^[\p{L} .-]+$/u',
            'password' => 'nullable|string|min:6|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif,heic|max:2048', //sanitiza tipos de archivos y tamaño
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

        return redirect()->route('profile.show')->with('success', 'Perfil actualizado con éxito.');
    }


    public function deletePhoto()
{
    $user = Auth::user();
    
    // Verificar si el usuario tiene una foto
    if ($user->photo) {
        // Construir la ruta correcta del archivo
        $photoPath = storage_path('app/public/' . $user->photo);

        // Comprobar si el archivo existe y eliminarlo
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }

        // Limpiar el campo 'photo' y guardar el usuario

        dd($user->photo);
        $user->update(['photo' => null]);

        return redirect()->route('profile.show')->with('success', 'Foto de perfil eliminada con éxito.');
    } else {
        // Si no hay foto, redirigir con un mensaje diferente
        return redirect()->route('profile.show')->with('info', 'No hay foto de perfil para eliminar.');
    }
}

}
