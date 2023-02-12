<?php
require_once 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Project</h2>
                </div>
                <div class="card-body">
                    <?php if (isset($_SESSION['about_added_successfully'])) : ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['about_added_successfully']; ?>
                        </div>
                    <?php
                    endif;
                    unset($_SESSION['about_added_successfully']);
                    ?>
                    <form method="post" action="store_about.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="month">Project completed Time</label>
                            <input name="month" type="text" class="form-control" id="month" placeholder="Enter project completed time">

                        </div>
                        <div class="form-group">
                            <label for="title">Project Title</label>
                            <input name="title" type="text" class="form-control" id="title" placeholder="Project title">

                        </div>
                        <div class="form-group">
                            <label for="description">Project description</label>
                            <input name="description" type="text" class="form-control" id="description" placeholder="Project description">
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
