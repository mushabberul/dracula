<?php
require_once 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Client Logo</h2>
                </div>
                <div class="card-body">
                    <?php if (isset($_SESSION['client_logo_added_successfully'])) : ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['client_logo_added_successfully']; ?>
                        </div>
                    <?php
                    endif;
                    unset($_SESSION['client_logo_added_successfully']);
                    ?>
                    <form method="post" action="store_client_logo.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
                            <?php if (isset($_GET['name_err'])) : ?>
                                <div class="alert alert-danger">
                                    <?php echo $_GET['name_err']; ?>
                                </div>
                            <?php
                            endif;
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input name="image" type="file" class="form-control" id="image">
                            <?php if (isset($_GET['image_err'])) : ?>
                                <div class="alert alert-danger">
                                    <?php echo $_GET['image_err']; ?>
                                </div>
                            <?php
                            endif;
                            ?>
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
