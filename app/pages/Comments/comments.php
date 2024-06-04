<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text"><?= $title ?></span>
        </div>
        <div class="activity">
            <a href="../../exam/comments/addComments" class="btn btn-success ">Add</a>
            <div class="activity-data">
                <div class="data names">
                    <span class="data-title">id</span>
                    <?php foreach ($data['comments'] as $comment) : ?>
                        <span class="data-list"><?= htmlspecialchars($comment->id) ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="data email">
                    <span class="data-title">User</span>
                    <?php foreach ($data['comments'] as $comment) : ?>
                        <?php foreach ($data['users'] as $user) : ?>
                            <?php if ($user->id == $comment->user_id) : ?>
                                <span class="data-list"><?= htmlspecialchars($user->username) ?> <?= htmlspecialchars($user->surname) ?></span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
                <div class="data email">
                    <span class="data-title">Product</span>
                    <?php foreach ($data['comments'] as $comment) : ?>
                        <?php foreach ($data['products'] as $product) : ?>
                            <?php if ($product->id == $comment->product_id) : ?>
                                <span class="data-list"><?= htmlspecialchars($product->name) ?> </span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
                <div class="data email">
                    <span class="data-title">Comment</span>
                    <?php foreach ($data['comments'] as $comment) : ?>
                        <span class="data-list"><?= htmlspecialchars($comment->description) ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="data email">
                    <span class="data-title">Votes</span>
                    <?php foreach ($data['comments'] as $comment) : ?>
                        <span class="data-list">5/<?= htmlspecialchars($comment->votes) ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="data email"  >
                    <span class="data-title mb-3">Delete</span>
                    <?php foreach ($data['comments'] as $comment) : ?>
                        <form method="post" >
                            <div class="data-list">
                                <input type="hidden" name="commentid" value="<?= htmlspecialchars($comment->id) ?>">
                                <button type="submit" style="background-color: red;color:white; width:70px; height: 30px; border-radius:5px;border:none" onclick="return confirm('Are you sure you want to delete this user?')" >Delete</button>
                            </div>
                        </form>
                            <?php endforeach; ?>

                </div>

            </div>
        </div>
    </div>
</div>