<?php

use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

new class extends Component {
    use WithPagination;

    public $selectedCategory;
    public $searchTerm;
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function addToCart(Product $product)
    {
        cart()->add($product->id, $product->name, 1, $product->price);
        $this->dispatch('cart-updated');
    }

    public function render(): mixed
    {
        $query = Product::query();

        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        if ($this->searchTerm) {
            $query->where('name', 'like', '%' . $this->searchTerm . '%');
        }

        // Paginación de productos
        $products = $query->paginate(10);

        return view('livewire.product-list', [
            'products' => $products,
            'categories' => $this->categories,
        ]);
    }

    public function filterProducts()
    {
        // filtra en render()
    }
};
?>