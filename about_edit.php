<?php
require_once 'header.php';
require_once 'db.php';
$id = $_GET['about_id'];
$about_select_query = "SELECT * FROM abouts WHERE id ='$id'";
$about_from_db = mysqli_query($db_connect, $about_select_query);
$after_assoc = mysqli_fetch_assoc($about_from_db);
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Edit About Project</h2>
                </div>
                <div class="card-body">

                    <form method="post" action="update_about.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="month">Month</label>
                            <input name="month" type="text" class="form-control" id="month" value="<?php echo $after_assoc['month']; ?>">
                            <input name="about_id" type="hidden" value="<?php echo $after_assoc['id']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" value="<?php echo $after_assoc['title']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" type="text" class="form-control" id="description" rows="6"><?php echo $after_assoc['description'] ?? ''; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Old Image</label><br />
                            <img width="100" src="uploads/about/<?php echo $after_assoc['image']; ?>" alt="">
                            <input name="old_image" type="hidden" value="uploads/about/<?php echo $after_assoc['image']; ?>">
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
