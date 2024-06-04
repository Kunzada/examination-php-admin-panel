<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text"><?= $title ?></span>
        </div>


        <form method="post" >
            <div class="mb-3">
                <label >Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo isset($subcategory->name) ? htmlspecialchars($subcategory->name) : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</div>