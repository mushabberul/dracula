<?php
require_once 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Hero</h2>
                </div>
                <div class="card-body">
                    <?php if (isset($_SESSION['hero_added_successfully'])) : ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['hero_added_successfully']; ?>
                        </div>
                    <?php
                    endif;
                    unset($_SESSION['hero_added_successfully']);
                    ?>
                    <form method="post" action="store_hero.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="subtitle">subtitle</label>
                            <input name="subtitle" type="text" class="form-control" id="subtitle" placeholder="Enter subtitle">

                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" placeholder="title">
                        </div>

                        <div class="form-group">
                            <label for="button_text">Button text</label>
                            <input name="button_text" type="text" class="form-control" id="button_text" placeholder="Button text">
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
