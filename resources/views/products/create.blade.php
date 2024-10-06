@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center mt-3 mb-3" style="user-select: none;" ondragstart="return false;">
  <div class="col-sm-5">
    <div class="card">
      <div class="card-body">
        <h3>NUEVO PRODUCTO:</h3>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @include('products._form', ['product' => $product])
        </form>
      </div>
    </div>
  </div>
</div>
@endsection