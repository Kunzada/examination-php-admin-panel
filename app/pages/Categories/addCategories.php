<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text"><?= $title ?></span>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo isset($category->name) ? htmlspecialchars($category->name) : ''; ?>" required>
            </div>


            <div class="mb-3">
                <label class="form-label">Category Image</label>
                <input type="file" class="form-control" name="image" value="<?php isset($category->image["name"])?htmlspecialchars($category->image["name"]):''  ?>">
                
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</div>