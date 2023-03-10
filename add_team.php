<?php
require_once 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Team Member</h2>
                </div>
                <div class="card-body">

                    <form method="post" action="store_team.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
                            <?php if (isset($_GET['name_err'])) : ?>
                                <small class="text-danger"><?php echo $_GET['name_err']; ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input name="designation" type="text" class="form-control" id="designation" placeholder="Designation">
                            <?php if (isset($_GET['designation_err'])) : ?>
                                <small class="text-danger"><?php echo $_GET['designation_err']; ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input name="facebook" type="url" class="form-control" id="facebook" placeholder="https://facebook.com/sabbirmia.bd">
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input name="twitter" type="url" class="form-control" id="twitter" placeholder="https://twitter.com/sabbirmia.bd">
                        </div>
                        <div class="form-group">
                            <label for="linkedin">LinkedIn</label>
                            <input name="linkedin" type="url" class="form-control" id="linkedin" placeholder="https://linkedin.com/sabbirmia.bd">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input name="image" type="file" class="form-control" id="image">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
