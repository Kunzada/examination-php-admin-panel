<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text"><?= $title ?></span>
        </div>
        <div class="activity">
        <a href="../../exam/subcategories/addSubcategories" class="btn btn-success ">Add</a>

            <div class="activity-data">

                <div class="data names">
                    <span class="data-title">id</span>
                    <?php foreach ($data['subcategories'] as $subcategory) : ?>
                        <span class="data-list"><?= htmlspecialchars($subcategory->id) ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="data email">
                    <span class="data-title">Category</span>
                    <?php foreach ($data['subcategories'] as $subcategory) : ?>
                        <?php foreach ($data['categories'] as $category) : ?>
                            <?php if ($category->id == $subcategory->category_id) : ?>
                                <span class="data-list"><?= htmlspecialchars($category->name) ?></span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
                <div class="data email">
                    <span class="data-title">name</span>
                    <?php foreach ($data['subcategories'] as $category) : ?>
                        <span class="data-list"><?= htmlspecialchars($category->name) ?></span>
                    <?php endforeach; ?>
                </div>

                <div class="data email" style="   margin-right:100px">
                    <span class="data-title mb-3">Delete</span>
                    <?php foreach ($data['subcategories'] as $category) : ?>
                        <form method="post">
                            <div class="data-list">
                                <input type="hidden" name="subcategoryid" value="<?= htmlspecialchars($category->id) ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>