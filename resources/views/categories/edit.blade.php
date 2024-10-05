@extends('layouts.app')

@section('content')
<div class="container" style="user-select: none;">
    <h1>Editar Categoría</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Actualizar</button>
        <button type="button" onclick="window.location='{{ url('/categories') }}'" class="btn btn-dark mt-3">Atras</button>
    </form>
</div>
@endsection
