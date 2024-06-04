<div class="d-flex justify-content-center align-items-center vh-100">

    <form class="shadow w-450 p-3 bg-light e" method="post" enctype="multipart/form-data">
        <h4 class="display-4  fs-1">Create Account</h4><br>

        <?php if (!empty($error) && isset($error)) { ?>

            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php } ?>

        <?php if (!empty($success) && isset($error)) { ?>
            <div class="alert alert-success" role="alert">
                <?= $success ?>
            </div>

        <?php } ?>
        <div class="mb-3">
            <label class="form-label">Surname</label>
            <input type="text" class="form-control" name="surname" value="<?php echo (isset($_GET['fname'])) ? $_GET['fname'] : "" ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="username" value="<?php echo (isset($_GET['uname'])) ? $_GET['uname'] : "" ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <select name="gender">
            <option value="female">Female</option>
            <option value="male">Male</option>
            <option value="other">Other</option>
        </select>
        <div class="mb-3">
            <label for="input_from">Select Date</label>
            <input type="date" name="birthday" class="form-control" id="input">
        </div>

        <div class="mb-3">
            <label class="form-label">Profile Picture</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-1">
            <label class="form-label">Select User Type:</label>
        </div>
        <select class="form-select mb-3" name="role" aria-label="Default select example">
            <option selected value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <div class="mb-3">
            <label class="form-label">Phone number</label>
            <div class="select-box">
                <div class="selected-option">
                    <div>
                        <span class="iconify" data-icon="flag:gb-4x3"></span>
                        <strong>+44</strong>
                    </div>
                    <input type="tel" name="phone_number" placeholder="Phone Number">
                </div>
                <div class="options">
                    <input type="text" class="search-box" placeholder="Search Country Name">
                    <ol>

                    </ol>
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
        <a href="login.php" class="link-secondary">Login</a>
    </form>
    <script src="/exam/js/auth.js"></script>

</div>