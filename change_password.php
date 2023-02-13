<?php
require_once 'header.php';
$title = 'Change Password';
?>
<div class="content">
    <div class="container-flud">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>Change Password</h5>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_SESSION['wrong_old_password_err'])) : ?>
                            <div class="alert alert-warning">
                                <?php echo $_SESSION['wrong_old_password_err']; ?>
                            </div>
                        <?php
                        endif;
                        unset($_SESSION['wrong_old_password_err']);
                        ?>
                        <?php if (isset($_SESSION['new_and_confirm_pass_not_same_err'])) : ?>
                            <div class="alert alert-warning">
                                <?php echo $_SESSION['new_and_confirm_pass_not_same_err']; ?>
                            </div>
                        <?php
                        endif;
                        unset($_SESSION['new_and_confirm_pass_not_same_err']);
                        ?>
                        <form action="change_password_post.php" method="post">
                            <div class="form-group">
                                <label for="old_password">Old Password</label>
                                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter old password">
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter Confirm Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Change</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
