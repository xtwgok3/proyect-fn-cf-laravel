@extends('layouts.app')
@if (request()->is('invoices')&& !preg_match('/mobile/i', request()->header('User-Agent')))
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
    #github{ margin-top:12px }
</style>
@endif
<hr>
@section('content')
        <div class="container" style="user-select: none;" ondragstart="return false;">
            <h1>Categorías</h1>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif


            <div class="row d-flex justify-content-left mb-5">
                <div class="col-sm-2 mt-3 text-end">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">CREAR CATEGORIAS</a>
                </div>
            </div>


            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Editar</a>

                                <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection
