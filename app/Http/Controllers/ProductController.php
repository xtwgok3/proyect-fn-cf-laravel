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
        // Validación para asegurarse de que el producto no esté vacío
        $request->validate([
            'name' => 'required|string|max:50|regex:/^[\p{L}\s]+$/u', // Solo letras y espacios
            'description' => 'required|string|max:150|regex:/^[\p{L}\s.,;:!?-]+$/u', // Solo letras y algunos símbolos permitidos
            'price' => 'required|numeric|min:100',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif,heic|max:2048', ],
            [
                'name.required' => 'Rellene el campo nombre.',
                'description.required' => 'Rellene el campo descripción.',
                'price.required' => 'Rellene el campo precio.',
                'price.numeric' => 'El precio debe ser un número válido.',
                'price.min' => 'El precio debe ser mayor que $100.',
                'category_id.required' => 'Seleccione una categoría.',
                'image.image' => 'El archivo debe ser una imagen válida.',
                'name.regex' => 'El nombre solo puede contener letras y espacios.',
                'description.regex' => 'La descripción solo puede contener letras y ciertos símbolos.',
            ]);
            
            // Sanitización de los datos de entrada
            $data = $request->only('name', 'description', 'price', 'category_id');
            $data['price'] = floatval($data['price']);
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image');
            }

        //Product::create($this->getParams($request));
        Product::create(array_merge($data, $this->getParams($request)));

        return redirect('/home')->with('success', 'Producto creado con éxito.');
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
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:50|regex:/^[\p{L}\s]+$/u', // Solo letras y espacios
            'description' => 'required|string|max:150|regex:/^[\p{L}\s.,;:!?-]+$/u', // Solo letras y algunos símbolos permitidos
            'price' => 'required|numeric|min:100',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif,heic|max:2048',
        ], [
            'name.required' => 'Rellene el campo nombre.',
            'description.required' => 'Rellene el campo descripción.',
            'price.required' => 'Rellene el campo precio.',
            'price.numeric' => 'El precio debe ser un número válido.',
            'price.min' => 'El precio debe ser mayor que $100.',
            'category_id.required' => 'Seleccione una categoría.',
            'image.image' => 'El archivo debe ser una imagen válida.',
            'name.regex' => 'El nombre solo puede contener letras y espacios.',
            'description.regex' => 'La descripción solo puede contener letras y ciertos símbolos.',
        ]);
    
        // Comprobar si los datos han cambiado
        $hasChanges = false;
    
        // Compara los valores antiguos y nuevos usando &&
        if ((
            $product->name === $validatedData['name'] &&
            $product->description === $validatedData['description'] &&
            $product->price === $validatedData['price'] &&
            $product->category_id === $validatedData['category_id']
        )) {
            // Actualizar el producto con los datos validados
            $product->update($this->getParams($request));
            
            $hasChanges = true;
        }
    
        // Redireccionar con mensajes
        if ($hasChanges) {
            return redirect('/home')->with('success', 'Producto actualizado con éxito.');
        } else {
            return redirect()->back()->with('info', 'No realizaste cambios.');
        }
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
            'name' => 'required|string|max:25|regex:/^[\p{L} .-]+$/u',
        ], [
            'name.required' => 'Rellene el campo nombre.',
            'name.max' => 'El nombre no puede ser más de 25 caracteres.',
            'name.regex' => 'El nombre solo puede contener letras, espacios y algunos símbolos.',
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
            'name' => 'required|string|max:25|regex:/^[\p{L} .-]+$/u',
        ], [
            'name.required' => 'Rellene el campo nombre.',
            'name.max' => 'El nombre no puede ser más de 25 caracteres.',
            'name.regex' => 'El nombre solo puede contener letras, espacios y algunos símbolos.',
        ]);
    
        if ($category->name !== $request->name) {
            $category->update($request->only('name'));
            return redirect()->route('categories.index')->with('success', 'Categoría actualizada con éxito.');
        } else {
            return redirect()->route('categories.edit', $category->id)->with('info', 'No se realizaron cambios.');
        }
    }

    // Método para eliminar una categoría
    public function destroyCategory(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoría eliminada con éxito.');
    }



}
