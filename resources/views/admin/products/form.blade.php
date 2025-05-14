<div class="mb-3">
    <label for="name">Product Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="description">Product Description</label>
    <textarea name="description" id="description" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="price">Product Price</label>
    <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="stock">Stock Quantity</label>
    <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock ?? '') }}" class="form-control" required>
</div>

<button type="submit" class="btn btn-success">Save Product</button>
