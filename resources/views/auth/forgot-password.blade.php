@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-4">
    <h1>Restablecer contraseña:</h1>
    
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.sendLink') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico:</label>
            <input type="email" name="email" id="email" class="form-control" required autofocus>
        </div>

        <button type="submit" class="btn btn-primary">Enviar enlace de restablecimiento</button>
    </form>
</div>
@endsection
