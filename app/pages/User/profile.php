<div class="container light-style flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-4">
        Account settings
    </h4>
    <div class="card overflow-hidden mb-5">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">

                    <div class="tab-pane fade active show" id="account-general">
                        <form action="" method="post">
                            <?php foreach ($data["users"] as $user) : ?>
                                <?php if ($user->id == $_SESSION["user"]->id) : ?>
                                    <div class="card-body media align-items-center">
                                        <img src="/exam/image/<?= $user->image ?>" alt="avatar" class="d-block ui-w-80">
                                        <div class="media-body ml-4">
                                            <label class="btn btn-outline-primary">
                                                Upload new photo
                                                <input type="file" class="account-settings-fileinput" name="image">
                                            </label> &nbsp;
                                            <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                            <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                        </div>
                                    </div>
                                    <hr class="border-light m-0">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Surname</label>
                                            <input type="text" class="form-control mb-1" name="surname" value="<?= $user->surname ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="username" value="<?= $user->username ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">E-mail</label>
                                            <input type="text" class="form-control mb-1" name="email" value="<?= $user->email ?>">

                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Birthday</label>
                                            <input type="date" class="form-control mb-1" name="birthday" value="<?= $user->birthday ?>">

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" class="form-control mb-1" name="phone_number" value="<?= $user->phone_number ?>">

                                        </div>


                                        <div class="text-right mt-3">
                                            <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                                        </div>

                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">

</script>