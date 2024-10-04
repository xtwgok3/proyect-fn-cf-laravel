@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Perfil de Usuario</h1>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="form-group mt-3">
        <img id="profile-image" src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : 'https://as2.ftcdn.net/v2/jpg/05/57/94/41/1000_F_557944126_ktHRUdfizYsrphqNXiBO7Pf8HHccNHun.jpg' }}" alt="{{ Auth::user()->name }}" class="" style="width: 90px; height: 90px; margin-left: 8px; border: 2px solid #ddd; border-radius:20px;">
        <form action="{{ route('profile.deletePhoto') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('¿Estás seguro de que deseas eliminar la foto de perfil?');">Eliminar
                FOTO</button>
        </form>
    </div>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mt-3">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="name">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
        </div>

        <div class="form-group mt-3">
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#changePasswordModal"><b>Cambiar Contraseña<b></button>
        </div>

        <div class="form-group mt-3">
            <label for="photo">Foto de Perfil</label>
            <input type="file" name="photo" id="photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar Perfil</button>

        <button type="button" class="btn btn-secondary mt-3" onclick="window.location='{{ url('/') }}'">Atrás</button>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Cambiar Contraseña</h5>
                <button type="button" onclick="clearSession()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @livewire('confirm-password')
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function clearSession() {
        window.location.href = '{{ route('
        clear.session ') }}';
    }

</script>
