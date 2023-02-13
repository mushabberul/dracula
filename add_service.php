<?php
require_once 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Service</h2>
                </div>
                <div class="card-body">
                    <?php if (isset($_SESSION['service_added_successfully'])) : ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['service_added_successfully']; ?>
                        </div>
                    <?php
                    endif;
                    unset($_SESSION['service_added_successfully']);
                    ?>
                    <form method="post" action="store_service.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input name="icon" type="text" class="form-control" id="icon" placeholder="Enter icon">

                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" placeholder="title">
                        </div>

                        <div class="form-group">
                            <label for="description">Project Description</label>
                            <textarea name="description" rows="6" type="text" class="form-control" id="description" placeholder="Project description"></textarea>
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
