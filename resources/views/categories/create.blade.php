@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger text-center" style="user-select: none; margin: 0 auto;">
        <ul class="list-unstyled mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<hr>
<div class="container"style="user-select: none;">
    <h1>Crear Categoría</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary mt-3">Crear Categoría</button>
        <button type="button" onclick="window.location='{{ url('/categories') }}'" class="btn btn-secondary mt-3">Atras</button>
    </form>
</div>
@endsection
