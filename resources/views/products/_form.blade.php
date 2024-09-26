@csrf

@if (request()->path() !== 'products/create')
<div class="mb-3">
  <img id="product-image" src="{{ $product->image ? asset('storage/' . $product->image) : 'https://dummyimage.com/120x120/000/fff&text=Sin+imagen' }}" alt="{{ $product->name }}" class="" style="width: 120px; height: 150px; margin-left: 8px; border: 2px solid #ddd; border-radius:20px; object-fit: cover;">
</div>
@endif

<div class="mb-3">
  <label for="name" class="form-label">Nombre:</label>
  <input type="name" class="form-control" name="name" id="name" value="{{ old('name', $product->name) }}">
  @error('name') <p style="color: red;">Campo es requerido</p> @enderror
</div>

<div class="mb-3">
  <label for="description" class="form-label">Description:</label>
  <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
  @error('description') <p style="color: red;">Campo es requerido</p> @enderror
</div>

<div class="mb-3">
  <label for="description" class="form-label">Imagen</label>
  <input type="file" name="image" class="form-control">
  @error('description') <p style="color: red;">Campo es requerido</p> @enderror
</div>

<div class="mb-3">
  <label for="description" class="form-label">Categoria:</label>

  <select name="category_id" class="form-control">
    @foreach($categories as $category)
    <option value="{{ $category->id }}"
      @selected($category->id == $product->category_id)>{{ $category->name }}</option>
    @endforeach
  </select>

  @error('category_id') <p style="color: red;">Campo es requerido</p> @enderror
</div>

<div class="mb-3">
  <label for="price" class="form-label">Precio ARS $</label>
  <input type="price" name="price" class="form-control" id="price" value="{{ old('price', $product->price) }}">
  @error('price') <p style="color: red;">Campo es requerido</p> @enderror
</div>

<div class="row">
  <button type="submit" class="btn btn-primary">SAVE</button>
  <button type="button" onclick="window.location='{{ url('/') }}'" class="btn btn-secondary mt-2">CANCEL</button>
</div>