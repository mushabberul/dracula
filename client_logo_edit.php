<?php
require_once 'header.php';
require_once 'db.php';
$id = $_GET['client_logo_id'];
$client_logo_select_query = "SELECT * FROM client_logos WHERE id ='$id'";
$client_logo_from_db = mysqli_query($db_connect, $client_logo_select_query);
$after_assoc = mysqli_fetch_assoc($client_logo_from_db);
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Client logo</h2>
                </div>
                <div class="card-body">

                    <form method="post" action="update_client_logo.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">name</label>
                            <input name="name" type="text" class="form-control" id="name" value="<?php echo $after_assoc['name']; ?>">
                            <input name="client_logo_id" type="hidden" value="<?php echo $after_assoc['id']; ?>">

                        </div>

                        <div class="form-group">
                            <label for="image">Old Image</label><br />
                            <img width="100" src="uploads/client_logo/<?php echo $after_assoc['image']; ?>" alt="">
                            <input name="old_image" type="hidden" value="uploads/client_logo/<?php echo $after_assoc['image']; ?>">
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
