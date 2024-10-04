<div class="p-4 font-bold">

    @if (session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @elseif (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="updatePassword">
        <div class="form-group">
            <label for="current_password">Contraseña Actual:</label>
            <input type="password" wire:model="current_password" class="form-control" required>
            @error('current_password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="new_password">Nueva Contraseña:</label>
            <input type="password" wire:model="new_password" class="form-control" required>
            @error('new_password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="new_password_confirmation">Confirmar Nueva Contraseña:</label>
            <input type="password" wire:model="new_password_confirmation" class="form-control" required>
            @error('new_password_confirmation')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-danger mt-3 mb-3">Actualizar Contraseña</button>
        <button type="button" class="btn btn-secondary mt-3 mb-3" onclick="clearSession()">Cerrar</button>
    </form>
</div>