<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text"><?= $title ?></span>
        </div>

        <a href="../../exam/categories/addCategories" class="btn btn-success ">Add</a>
        <div class="activity">
            <div class="activity-data">
                <div class="data names">
                    <span class="data-title">id</span>
                    <?php foreach ($data['categories'] as $category) : ?>
                        <span class="data-list"><?= htmlspecialchars($category->id) ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="data email">
                    <span class="data-title">Image</span>
                    <?php foreach ($data['categories'] as $category) : ?>
                        <span class="data-list"><?= htmlspecialchars($category->image) ? $category->image : "NULL" ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="data email">
                    <span class="data-title">Name</span>
                    <?php foreach ($data['categories'] as $category) : ?>
                        <span class="data-list"><?= htmlspecialchars($category->name) ?></span>
                    <?php endforeach; ?>
                </div>

                <div class="data status" style="   margin-left:430px">
                    <span class="data-title mb-3">Update</span>
                    <?php foreach ($data['categories'] as $category) : ?>
                        <form method="post" action="../../exam/categories/update">
                            <div class="data-list">
                                <input type="hidden" name="categoryid" value="<?= htmlspecialchars($category->id) ?>">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    <?php endforeach; ?>

                </div>
                

                <div class="data email" style="   margin-right:100px">
                    <span class="data-title mb-3">Delete</span>
                    <?php foreach ($data['categories'] as $category) : ?>
                        <form method="post" >
                            <div class="data-list">
                                <input type="hidden" name="categoryid" value="<?= htmlspecialchars($category->id) ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                            <?php endforeach; ?>

                </div>
            </div>

        </div>
    </div>
</div>
</div>