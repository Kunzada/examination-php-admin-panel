<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text"><?= $title ?></span>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="mb-3">
                <label for="name">Description</label>
                <input type="text" class="form-control" name="description" required>
            </div>

            <div class="mb-3">
                <label for="name">Image</label>
                <input type="file" class="form-control" name="image" required>
            </div>

            <div class="mb-3">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" required>
            </div>
        
            <div class="mb-3">
                <label for="discount">Discount</label>
                <input type="number" class="form-control" name="discount" required>
            </div>
        
            <div class="mb-3">
                <label for="name">Stock Quantity</label>
                <input type="number" class="form-control" name="stock_quantity" required>
            </div>

            <div class="mb-3">
                <label for="name">Brand</label>
                <input type="text" class="form-control" name="brand" required>
            </div>
        
            
            <div class="mb-3">
                <label for="select">Select subcategory</label>
                <select name="subcategory_id" class="form-control" id="select">
                    <?php foreach ($data['subcategories'] as $subcategory) : ?>
                        <option value="<?= htmlspecialchars($subcategory->id) ?>">
                            <?= htmlspecialchars($subcategory->id) ?> - <?= htmlspecialchars($subcategory->name) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

    

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</div>