<?php

namespace App\Http\Livewire;

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ConfirmPassword extends Component
{
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public $modalVisible = false;

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required|min:8', // Solo necesario si no se usa 'confirmed'
        ], 
        [
            'current_password.required' => '• La Contraseña Actual no puede estar vacía.',
            'new_password.required' => '• Nueva Contraseña no puede estar vacía.',
            'new_password.min' => '• La Nueva Contraseña debe tener al menos 8 caracteres.',
            'new_password.confirmed' => '• La Confirmación de la Nueva Contraseña no coincide.',
            'new_password_confirmation.required' => '• Confirmación no puede estar vacía.',
            'new_password_confirmation.min' => '• La Nueva Contraseña debe tener al menos 8 caracteres.',
        ]);
    
        if (!Hash::check($this->current_password, Auth::user()->password)) {
            session()->flash('error', 'La contraseña actual es incorrecta.');
            return;
        }
    
        try {
            Auth::user()->update(['password' => Hash::make($this->new_password)]);
            session()->flash('success', 'Contraseña actualizada con éxito.');
        } catch (\Exception $e) {
            session()->flash('error', 'Ocurrió un error al actualizar la contraseña: ' . $e->getMessage());
        }
    }


    public function render()
    {

        return view('livewire.confirm-password');
    }
};
