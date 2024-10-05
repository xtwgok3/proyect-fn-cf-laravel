@use('App\Models\Product')
<ul class="list-group mb-3 sticky-top">

  @if(cart()->count() > 0)
    @foreach(cart()->content() as $item)
      @php
        $product = Product::find($item->id);
      @endphp

      @if($product) <!-- Check if the product exists -->
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">
              <form action="{{ route('cart.remove', $item->rowId) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm rounded text-white"><strong>QUITAR PRODUCTO</strong> </button>
              </form>
              {{ $product->name }} <b>X{{ $item->qty }}</b>
            </h6>
            <small class="text-muted">{{ $product->description }}</small>
          </div>

          <span class="text-muted">${{ $product->price }}</span>
        </li>
      @endif
    @endforeach

    <li class="list-group-item d-flex justify-content-between">
      <span>Total (ARS)</span>(INCLUYE IVA)
      <strong>${{ cart()->total() }}</strong>
    </li>
    
  @else
    <li class="list-group-item">
      <div class="text-center" style="user-select: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); padding: 7px; border-radius: 6px;">
        <strong>No hay productos en el carrito.</strong>
      </div>
    </li>
  @endif

</ul>
