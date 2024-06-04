<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text"><?= $title ?></span>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name"  required>
            </div>


            <div class="mb-3">
                <label for="select">Select subcategory</label>
                <select name="category_id" class="form-control" id="select">
                    <?php foreach ($data['categories'] as $category) : ?>
                        <option value="<?= htmlspecialchars($category->id) ?>">
                            <?= htmlspecialchars($category->id) ?> - <?= htmlspecialchars($category->name) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</div>