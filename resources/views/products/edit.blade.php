@extends('layouts.app')

@section('content')
@csrf


<div class="row d-flex justify-content-center"style="user-select: none;" ondragstart="return false;">
  <div class="col-sm-5">
    <div class="card">
      <div class="card-body">
        <h3>Modificar producto</h3>
        <div class="asd d-flex justify-content-center align-items-center mt-2" style="user-select: none;" ondragstart="return false;">
          @if(session('info'))
              <div class="alert alert-info text-center" style="width: 100%;  background-color: #cff4fc;border-color: #17a2b8;">
                  {{ session('info') }}
              </div>
          @endif
        </div>
        <form action="{{ route('products.update', ['product' => $product]) }}" method="POST" enctype="multipart/form-data">
          @method('PATCH')
          @include('products._form', ['product' => $product])
        </form>
      </div>
    </div>
  </div>
</div>

@endsection