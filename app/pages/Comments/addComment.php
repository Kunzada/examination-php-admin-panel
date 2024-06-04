<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text"><?= htmlspecialchars($title) ?></span>
        </div>

        <form method="post">
            <div class="mb-3">
                <label for="description">Text of comment</label>
                <input type="text" class="form-control" name="description" required>
            </div>

            <div class="mb-3">
                <label for="select">Select product</label>
                <select name="product_id" class="form-control" id="select">
                    <?php foreach ($data['products'] as $product) : ?>
                        <option value="<?= htmlspecialchars($product->id) ?>">
                            <?= htmlspecialchars($product->id) ?> - <?= htmlspecialchars($product->name) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>



            <div class="mb-3">
                <label for="votes" class="form-label">Votes</label>
                <input type="number" max="5" min="1" class="form-control" name="votes" value="<?php echo isset($comments->votes) ? htmlspecialchars($comment->votes) : ''; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>