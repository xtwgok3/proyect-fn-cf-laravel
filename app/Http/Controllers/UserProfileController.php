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
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif,heic|max:2048',
    ], [
        'name.required' => 'Rellene el campo nombre.',
        'name.max' => 'El nombre no puede ser más de 50 caracteres.',
        'name.regex' => 'El nombre solo puede contener letras, espacios y algunos símbolos.',
        'photo.image' => 'El archivo debe ser una imagen válida.',
        'photo.mimes' => 'El archivo debe ser una imagen jpg, jpeg, png, webp, gif o heic.',
    ]);

    $user = Auth::user();
    $changesMade = false;

    if ($user->name !== $request->name) {
        $user->name = $request->name;
        $changesMade = true;
    }

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
        $changesMade = true;
    }

    if ($request->hasFile('photo')) {
        // Guardar la foto en una carpeta y actualizar el campo 'photo'
        $path = $request->file('photo')->store('profile_photos', 'public');
        $user->photo = $path;
        $changesMade = true;
    }

    if ($changesMade) {
        $user->save();
        return redirect()->route('profile.show')->with('success', 'Perfil actualizado con éxito.');
    } else {
        return redirect()->route('profile.show')->with('info', 'No realizaste cambios.');
    }
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

        //dd($user->photo);
        $user->update(['photo' => null]);

        return redirect()->route('profile.show')->with('success', 'Foto de perfil eliminada con éxito.');
    } else {
        // Si no hay foto, redirigir con un mensaje diferente
        return redirect()->route('profile.show')->with('info', 'Foto predeterminada. No hay foto de perfil para eliminar.');
    }
}

}
