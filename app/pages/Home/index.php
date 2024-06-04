
<div class="dash-content">
   
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text"><?= $title ?></span>
        </div>

        <div class="boxes">
            <div class="box box1">
                <i class="uil uil-heart"></i>
                <span class="text">Total Wishlists</span>
                <span class="number"><?= $countWishlists ?></span>
            </div>
            <div class="box box2">
                <i class="uil uil-comments"></i>
                <span class="text">Total Comments</span>
                <span class="number"><?= $countComments ?> </span>
            </div>
            <div class="box box3">
                <i class="uil uil-user"></i>
                <span class="text">Total Users</span>
                <span class="number"><?= $countUsers ?> </span>
            </div>
            <div class="box box4">
                <i class="uil uil-store"></i>
                <span class="text">Total Products</span>
                <span class="number"><?= $products ?> </span>
            </div>
            <div class="box box5">
                <i class="uil uil-list-ol-alt"></i>
                <span class="text">Total Categories</span>
                <span class="number"><?= $countCategories ?> </span>
            </div>
            <div class="box box6">
                <i class="uil uil-shopping-cart"></i>
                <span class="text">Total Shopping Cart</span>
                <span class="number"><?= $subcountCategories ?> </span>
            </div>
        </div>

    </div>

    <div class="activity">
        <div class="title">
            <i class="uil uil-clock-three"></i>
            <span class="text">Recent Activity</span>
        </div>

        <div class="activity-data">

            <div class="data names">
                <span class="data-title">Name</span>
                <?php foreach ($data['users'] as $user) : ?>
                    <span class="data-list"><?= htmlspecialchars($user->username) ?></span>

                <?php endforeach; ?>
            </div>
            <div class="data email">
                <span class="data-title">Email</span>
                <?php foreach ($data['users'] as $user) : ?>
                    <span class="data-list"><?= htmlspecialchars($user->email) ?></span>

                <?php endforeach; ?>
            </div>
            <div class="data email">
                <span class="data-title">Surname</span>
                <?php foreach ($data['users'] as $user) : ?>
                    <span class="data-list"><?= htmlspecialchars($user->surname) ?></span>

                <?php endforeach; ?>
            </div>
            <div class="data joined">
                <span class="data-title">Image</span>
                <?php foreach ($data['users'] as $user) : ?>
                    <span class="data-list"><img src="<?= htmlspecialchars($user->image)  ?>" alt="Profile"></span>

                <?php endforeach; ?>
            </div>

            <div class="data status">
                <span class="data-title">Birthday</span>
                <?php foreach ($data['users'] as $user) : ?>
                    <span class="data-list"><?= htmlspecialchars($user->birthday)  ?></span>
                <?php endforeach; ?>
            </div>
            <div class="data type">
                <span class="data-title">Role</span>
                <?php foreach ($data['users'] as $user) : ?>
                    <span class="data-list"><?= htmlspecialchars($user->role) ? "Admin" : "User"  ?></span>
                <?php endforeach; ?>
            </div>
            <div class="data type">
                <span class="data-title">Gender</span>
                <?php foreach ($data['users'] as $user) : ?>
                    <span class="data-list"><?= htmlspecialchars($user->gender) ?></span>
                <?php endforeach; ?>
            </div>
            <div class="data type">
                <span class="data-title">Phone number</span>
                <?php foreach ($data['users'] as $user) : ?>
                    <span class="data-list"><?= htmlspecialchars($user->phone_number) ?></span>
                <?php endforeach; ?>
            </div>
            <form method="post">
                <div class="data status">
                    <span class="data-title">Operation</span>
                    <?php foreach ($data['users'] as $user) : ?>
                            <span class="data-list">
                                <input type="hidden" name="deletedid" value="<?= htmlspecialchars($user->id) ?>">
                                <button type="submit" style="background-color: red; width:70px; height: 30px; border-radius:5px;border:none" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </span>
                        <?php endforeach; ?>
                </div>
            </form>
        </div>

    </div>