<?php

namespace App\Http\Livewire;

namespace App\Livewire;

use Livewire\Component;


use Livewire\Attributes\On; 

class ThemeToggle extends Component
{
    public $theme;

    public function mount()
    {
        // Inicializar el tema desde la sesión
        $this->theme = session('theme', 'light'); // 'light' es el valor por defecto
    }
    

    #[On('theme-changed')] 
    public function toggleTheme()
    {
        // Cambiar el tema
        $this->theme = $this->theme === 'light' ? 'dark' : 'light';
        session(['theme' => $this->theme]); // Guardar el tema en la sesión
        $this->dispatch('theme-updated'); // Despachar el evento
    }

    public function render()
    {
        return view('livewire.theme-toggle');
    }
}