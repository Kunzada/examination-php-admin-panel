<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/exam/css/style.css">
    <link rel="stylesheet" href="/exam/css/404.css">
    <link rel="stylesheet" href="/exam/css/profile.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    
   
</head>

<body>
    
<?php if(isset($_SESSION["user"]) && $_SESSION["user"] != null): ?>
    <nav>
    
        <div class="logo-name">
            <div class="logo-image">
                <a href="/exam/user/profile"><img src="/exam/image/<?= $_SESSION["user"]->image ?>" alt="d"></a>
            </div>

            <span class="logo_name"><?=$_SESSION["user"]->surname?> <?= $_SESSION["user"]->username?><a href="/exam/user/edit.php"></a></span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="../../exam/home/index">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dahsboard</span>
                    </a></li>

                <li><a href="../../exam/categories/categories">
                        <i class="uil uil-chart"></i>
                        <span class="link-name">Categories</span>
                    </a></li>
                <!-- <li><a href="../../exam/home/orders">
                        <i class="uil uil-store"></i>
                        <span class="link-name">Orders</span>
                    </a></li> -->
                <li><a href="../../exam/products/products">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Products</span>
                    </a></li>
                <!-- <li><a href="../../exam/home/payment">
                        <i class="uil uil-transaction"></i>
                         <span class="link-name">Payment</span>
                    </a></li> -->
                <li><a href="../../exam/wishlists/wishlist">
                        <i class="uil uil-heart"></i>
                        <span class="link-name">Wishlist</span>
                    </a></li>
                <li><a href="../../exam/shoppingCart/shoppingCart">
                        <i class="uil uil-shopping-cart"></i>
                        <span class="link-name">Shopping cart</span>
                    </a></li>
                <li><a href="../../exam/comments/comments">
                        <i class="uil uil-comment"></i>
                        <span class="link-name">Comments</span>
                    </a></li>
                <li><a href="../../exam/subcategories/subcategories">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Subcategories</span>
                    </a></li>
                <!-- <li><a href="../../exam/home/addresses">
                        <i class="uil uil-postcard"></i>
                        <span class="link-name">Addresses</span>
                    </a></li> -->

            </ul>

            <ul class="logout-mode">
                <li><a href="../../exam/user/logout">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>

                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <!-- <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div> -->

            <!-- <img src="images/profile.jpg" alt=""> -->
        </div>
        <?php include $content; ?>
        </div>
    </section>
    <?php else: ?>
     <h2 style="text-align: center; color:white; font-size: 50px">page not found </h2>
        
    <?php endif; ?>
    <script src="/exam/js/script.js"></script>

</body>
</html>