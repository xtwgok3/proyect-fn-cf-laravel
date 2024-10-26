@extends('layouts.app')
@if (request()->is('categories/create')&& !preg_match('/mobile/i', request()->header('User-Agent')))
<style>
    footer {
        margin: 0;
        width: 100%;
        position: fixed !important;
        bottom: 0;
    }
</style>
@else
<style>
    footer {
        margin-top: 20px;
    }
    #github{ margin-top:12px }
</style>
@endif



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
<div class="container  mb-3"style="user-select: none;">
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