<div>
    <h1>Restablecer Contraseña</h1>

    @if (session()->has('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="sendPasswordResetLink">
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" wire:model="email" id="email" class="form-control" required autofocus>
            @error('email') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enviar enlace de restablecimiento</button>
    </form>
</div>
