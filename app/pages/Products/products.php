<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text"><?= $title ?></span>
        </div>
        <div class="activity">
            <a href="../../exam/products/addProducts" class="btn btn-success ">Add</a>

            <div class="activity-data">

                <div class="data names">
                    <span class="data-title">id</span>
                    <?php foreach ($data['products'] as $product) : ?>
                        <span class="data-list"><?= htmlspecialchars($product->id) ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="data email">
                    <span class="data-title">Name</span>
                    <?php foreach ($data['products'] as $product) : ?>
                        <span class="data-list"><?= htmlspecialchars($product->name) ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="data email">
                    <span class="data-title">Description</span>
                    <?php foreach ($data['products'] as $product) : ?>
                        <span class="data-list"><?= htmlspecialchars(substr($product->description, 0, 30)) ?></span>

                    <?php endforeach; ?>
                </div>

                <div class="data email">
                    <span class="data-title">Image</span>
                    <?php foreach ($data['products'] as $product) : ?>
                        <span class="data-list"><?= htmlspecialchars($product->image_url) ?></span>
                    <?php endforeach; ?>
                </div>

                <div class="data email">
                    <span class="data-title">Price</span>
                    <?php foreach ($data['products'] as $product) : ?>
                        <span class="data-list"><?= htmlspecialchars($product->price) ?></span>
                    <?php endforeach; ?>
                </div>

                <div class="data email">
                    <span class="data-title">Discount</span>
                    <?php foreach ($data['products'] as $product) : ?>
                        <span class="data-list"><?= htmlspecialchars($product->discount) ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="data email">
                    <span class="data-title">Stock quantity</span>
                    <?php foreach ($data['products'] as $product) : ?>
                        <span class="data-list"><?= htmlspecialchars($product->stock_quantity) ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="data email">
                    <span class="data-title">Brand</span>
                    <?php foreach ($data['products'] as $product) : ?>
                        <span class="data-list"><?= htmlspecialchars($product->name) ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="data email">
                    <span class="data-title">Subcategory</span>
                    <?php foreach ($data['products'] as $product) : ?>
                        <?php foreach ($data['subcategories'] as $subcategory) : ?>
                            <?php if ($product->subcategory_id == $subcategory->id) : ?>
                                <span class="data-list"><?= htmlspecialchars($subcategory->name) ?></span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
                <div class="data status" style="   margin-left:130px">
                    <span class="data-title mb-3">Update</span>
                    <?php foreach ($data['products'] as $product) : ?>
                        <form method="post" action="../../exam/products/update">
                            <div class="data-list">
                                <input type="hidden" name="productid" value="<?= htmlspecialchars($product->id) ?>">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    <?php endforeach; ?>

                </div>


                <div class="data email" style="margin-right:100px">
                    <span class="data-title mb-3">Delete</span>
                    <?php foreach ($data['products'] as $product) : ?>
                        <form method="post">
                            <div class="data-list">
                                <input type="hidden" name="productid" value="<?= htmlspecialchars($product->id) ?>">
                                <button type="submit" class="btn btn-danger"> Delete</button>
                            </div>
                        </form>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>