<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', [
            'product' => new Product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create($this->getParams($request));

        return redirect('/home')->with('success', 'Product created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($this->getParams($request));

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/home');
    }

    public function getParams($request)
    {
        $params = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('upload', 'public');
            $params['image'] = $path;
        }

        return $params;
    }


    public function listCategories()
{
    $categories = Category::all();
    return view('categories.index', compact('categories'));
}

public function createCategory()
    {
        return view('categories.create');
    }

    // Método para almacenar una nueva categoría
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->only('name'));

        return redirect()->route('categories.index')->with('success', 'Categoría creada con éxito.');
    }

    // Método para mostrar el formulario de edición de categoría
    public function editCategory(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Método para actualizar una categoría
    public function updateCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->only('name'));

        return redirect()->route('categories.index')->with('success', 'Categoría actualizada con éxito.');
    }

    // Método para eliminar una categoría
    public function destroyCategory(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoría eliminada con éxito.');
    }



}
