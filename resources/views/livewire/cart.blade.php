<?php

use Livewire\Volt\Component;
use Livewire\Attributes\On; 

new class extends Component {
    
    #[On('cart-updated')] 
    public function updateCart() {}

}; ?>
<a href="{{ route('checkout') }}" 
   class="btn position-relative mr-7 mt-2 transition-transform duration-200" 
   onmouseover="this.classList.add('scale-105', 'shadow-lg')" 
   onmouseout="this.classList.remove('scale-105', 'shadow-lg')" ondragstart="return false;" style="left: -8px;top: 13px;height: 67px;">

    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
    </svg>
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        {{ cart()->count() }}
    </span>
</a>