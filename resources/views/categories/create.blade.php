@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Categoría</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Crear Categoría</button>
        <button type="button" onclick="window.location='{{ url('/categories') }}'" class="btn btn-secondary mt-3">Atras</button>
    </form>
</div>
@endsection
