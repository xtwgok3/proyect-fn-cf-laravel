@extends('layouts.app')

@if (preg_match('/^categories\/\d+\/edit$/', request()->path()) && !preg_match('/mobile/i', request()->header('User-Agent')))
<style>
    footer {
        margin: 0;
        width: 100%;
        position: absolute!important;
        bottom: 0;
    }
</style>
@else
<style>
    footer {
        margin-top: 20px;
    }
    #github { margin-top: 12px; }
</style>
@endif


@section('content')

@if (session('success'))
<div class="alert alert-success text-center" style="user-select: none;" ondragstart="return false;">{{ session('success') }}</div>
@endif

@if (session('info'))
<div class="alert alert-info text-center" style="user-select: none;" ondragstart="return false;">
    {{ session('info') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger text-center" style="user-select: none;" ondragstart="return false;">
    {{ session('error') }}
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger text-center" style="user-select: none;" ondragstart="return false;">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<hr>
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
<hr>
@endsection
