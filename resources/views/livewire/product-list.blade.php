<div>
    <div class="container">
        <div class="row justify-content-center">

            @if (session('success'))
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <form wire:submit.prevent="filterProducts">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <select wire:model="selectedCategory" class="form-select">
                            <option value="">Todas las Categorías</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" wire:model.live.debounce.100ms="searchTerm" class="form-control"
                            placeholder="Buscar producto...">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                        <button type="button" class="btn btn-secondary" wire:click="resetFilters">Restablecer</button>
                    </div>
                </div>
            </form>


            @if ($products->count() > 0)
            <div class="col-md-9">
                @if (auth()->user()->isAdmin())
                <div class="container mb-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-2 text-end">
                            <a href="{{ route('products.create') }}" class="btn btn-primary">Crear Producto</a>
                        </div>
                        <div class="col-sm-2 text-end mt-3 mt-sm-0">
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Editar
                                Categoria</a>
                        </div>
                    </div>
                </div>
                @endif

                <div class="row">
                    @each('products._product', $products, 'product')
                </div>

                <div class="row">
                    {{ $products->links() }}
                </div>
            </div>
            @else
            <div class="col-md-9">
                <li class="list-group-item">
                    <div class="text-center">
                        <strong>No se encontró el producto.</strong>
                    </div>
                </li>
            </div>
            @endif

        </div>
    </div>
</div>