<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text"><?= $title ?></span>
        </div>

        <div class="activity">
            <div class="activity-data">
                <div class="data names">
                    <span class="data-title">id</span>
                    <?php foreach ($data['carts'] as $cart) : ?>
                        <span class="data-list"><?= htmlspecialchars($cart->id) ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="data email">
                    <span class="data-title">User</span>
                    <?php foreach ($data['carts'] as $cart) : ?>
                        <?php foreach ($data['users'] as $user) : ?>
                            <?php if ($cart->user_id == $user->id) : ?>
                                <span class="data-list"><?= htmlspecialchars($user->username)?> <?= htmlspecialchars($user->surname) ?></span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
                <div class="data email">
                    <span class="data-title">Product</span>
                    <?php foreach ($data['carts'] as $cart) : ?>
                        <?php foreach ($data['products'] as $product) : ?>
                            <?php if ($cart->product_id == $product->id) : ?>
                                <span class="data-list"><?= htmlspecialchars($product->name) ?></span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>
</div>