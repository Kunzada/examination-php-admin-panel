<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="productid" value="<?= isset($product->id) ? htmlspecialchars($product->id) : ''; ?>">

    <div class="mb-3">
        <label for="name">Name</label>
        <input type="text" class="form-control" value="<?= isset($product->name) ? htmlspecialchars($product->name) : ''; ?>" name="name" required>
    </div>

    <div class="mb-3">
        <label for="description">Description</label>
        <input type="text" class="form-control" value="<?= isset($product->description) ? htmlspecialchars($product->description) : ''; ?>" name="description" required>
    </div>

    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" required>
    </div>

    <div class="mb-3">
        <label for="price">Price</label>
        <input type="number" class="form-control" value="<?= isset($product->price) ? htmlspecialchars($product->price) : ''; ?>" name="price" required>
    </div>

    <div class="mb-3">
        <label for="discount">Discount</label>
        <input type="number" class="form-control" value="<?= isset($product->discount) ? htmlspecialchars($product->discount) : ''; ?>" name="discount" required>
    </div>

    <div class="mb-3">
        <label for="stock_quantity">Stock Quantity</label>
        <input type="number" class="form-control" value="<?= isset($product->stock_quantity) ? htmlspecialchars($product->stock_quantity) : ''; ?>" name="stock_quantity" required>
    </div>

    <div class="mb-3">
        <label for="brand">Brand</label>
        <input type="text" class="form-control" value="<?= isset($product->brand) ? htmlspecialchars($product->brand) : ''; ?>" name="brand" required>
    </div>

    <div class="mb-3">
        <label for="subcategory_id">Select Subcategory</label>
        <select name="subcategory_id" class="form-control" id="subcategory_id">
            <?php foreach ($data['subcategories'] as $subcategory) : ?>
                <option value="<?= htmlspecialchars($subcategory->id) ?>" <?= isset($product->subcategory_id) && $product->subcategory_id == $subcategory->id ? 'selected' : '' ?>>
                    <?= htmlspecialchars($subcategory->id) ?> - <?= htmlspecialchars($subcategory->name) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
