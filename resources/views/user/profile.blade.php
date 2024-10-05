@extends('layouts.app')

<style>.modal-open {overflow: hidden;}.modal-open .container {filter: blur(5px);}
.modal-title {
  color: grey;
}
.modal-body {
  font-family: Arial, sans-serif;
}
.modal-body p {
  font-size: 16px;
}
.card.container {
    width: 40rem; /* Adjusted width */
    margin: 0 auto; /* Centered card */
  }

  .card-header {
    font-size: 1.8rem; /* Increased title size */
    color: #2C3E50; /* Dark blue title color */
  }

  .alert-success,
  .alert-info,
  .alert-danger {
    background-color: #f5f5f5; /* Lighter background for alerts */
    border-color: #ddd;
  }

  .profile-image { /* New class for profile picture */
    width: 90px;
    height: 90px;
    border: 1px solid #ddd;
    border-radius: 20px;
  }

  label {
    font-size: 0.8rem;
    font-weight: bold;
  }

  .form-control {
    border-color: #ccc;
    background-color: #f9f9f9;
    padding: 8px 12px;
  }

  .btn-primary,
  .btn-warning,
  .btn-secondary { /* Modified button styles */
    border-color: #ddd;
  }

  .btn-primary {
    background-color: #007bff; /* Blue primary button */
  }

  .btn-warning {
    background-color: #ffc107; /* Yellow warning button */
  }

  .btn-secondary {
    background-color: #6c757d; /* Gray secondary button */
  }

</style>

@section('content')
    <div class="card container d-flex flex-column align-items-left justify-start" >
        <h1 class="mt-3 text-center card-header">Perfil de Usuario</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="form-group mt-3 line d-flex flex-column align-items-center">
            <img id="profile-image"
                 src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : 'https://fastly.picsum.photos/id/553/300/300.jpg?hmac=WE9FKJk4612U2gMl9W5K_2M4hVaqFL-Vg7Q7uCspY2A' }}"
                 alt="{{ Auth::user()->name }}" class=""
                 style="width: 90px; height: 90px; border: 2px solid #ddd; border-radius:20px;">
            <form action="{{ route('profile.deletePhoto') }}" method="POST" style="display:inline;">
              @csrf
              <button type="submit" class="btn btn-danger mt-2 d-flex justify-content-center"
                      onclick="return confirm('¿Estás seguro de que deseas eliminar la foto de perfil?');">Eliminar FOTO</button>
            </form>
          </div>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <hr> 
            <div class="form-group mt-3">
                <label for="name"><b>Nombre:</b></label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}"
                    required>
            </div>
            <hr> 
            <div class="form-group mt-3">
                <label for="name"><b>Email:</b></label>
                <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}"
                    disabled>
            </div>
            <hr> 
            <div class="form-group mt-3">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                    data-bs-target="#changePasswordModal"><b>Cambiar Contraseña<b></button>
            </div>
            <hr> 
            <div class="form-group mt-3">
                <label for="photo">Foto de Perfil</label>
                <input type="file" name="photo" id="photo" class="form-control">
            </div>
            <hr> 
            <button type="submit" class="btn btn-primary mt-3">Actualizar Perfil</button>

            <button type="button" class="btn btn-secondary mt-3"
                onclick="window.location='{{ url('/') }}'">Atrás</button>
        </form>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Cambiar Contraseña</h5>
                    <button type="button" onclick="clearSession()" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
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
        window.location.href = '{{ route('clear.session') }}';
    }
</script>
