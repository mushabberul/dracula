<?php
require_once 'header.php';
require_once 'db.php';
$id = $_GET['hero_id'];
$hero_select_query = "SELECT * FROM heros WHERE id ='$id'";
$hero_from_db = mysqli_query($db_connect, $hero_select_query);
$after_assoc = mysqli_fetch_assoc($hero_from_db);
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Hero Project</h2>
                </div>
                <div class="card-body">

                    <form method="post" action="update_hero.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="subtitle">Subtitle</label>
                            <input name="subtitle" type="text" class="form-control" id="subtitle" value="<?php echo $after_assoc['subtitle']; ?>">
                            <input name="hero_id" type="hidden" value="<?php echo $after_assoc['id']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" value="<?php echo $after_assoc['title']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="button_text">Button Text</label>
                            <input name="button_text" type="text" class="form-control" id="button_text" value="<?php echo $after_assoc['button_text'] ?? ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="image">Old Image</label><br />
                            <img width="100" src="uploads/hero/<?php echo $after_assoc['image']; ?>" alt="">
                            <input name="old_image" type="hidden" value="uploads/hero/<?php echo $after_assoc['image']; ?>">
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
