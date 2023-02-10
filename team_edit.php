<?php
require_once 'header.php';
require_once 'db.php';
$id = $_GET['team_id'];
$team_select_query = "SELECT * FROM teams WHERE id ='$id'";
$team_from_db = mysqli_query($db_connect, $team_select_query);
$after_assoc = mysqli_fetch_assoc($team_from_db);
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Team Member</h2>
                </div>
                <div class="card-body">

                    <form method="post" action="update_team.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" value="<?php echo $after_assoc['name']; ?>">
                            <input name="team_id" type="hidden" value="<?php echo $after_assoc['id']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input name="designation" type="text" class="form-control" id="designation" value="<?php echo $after_assoc['designation']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input name="facebook" type="text" class="form-control" id="facebook" value="<?php echo $after_assoc['facebook'] ?? ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input name="twitter" type="text" class="form-control" id="twitter" value="<?php echo $after_assoc['twitter'] ?? ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="linkedin">LinkedIn</label>
                            <input name="linkedin" type="text" class="form-control" id="linkedin" value="<?php echo $after_assoc['linkedin'] ?? ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="image">Old Image</label><br />
                            <img width="100" src="uploads/team/<?php echo $after_assoc['image']; ?>" alt="">
                            <input name="old_image" type="hidden" value="uploads/team/<?php echo $after_assoc['image']; ?>">
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
