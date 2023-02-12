<?php
require_once 'header.php';
require_once 'db.php';
$id = $_GET['service_id'];
$service_select_query = "SELECT * FROM services WHERE id ='$id'";
$service_from_db = mysqli_query($db_connect, $service_select_query);
$after_assoc = mysqli_fetch_assoc($service_from_db);
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Service Project</h2>
                </div>
                <div class="card-body">

                    <form method="post" action="update_service.php">
                        <div class="form-group">
                            <label for="icon">icon</label>
                            <input name="icon" type="text" class="form-control" id="icon" value="<?php echo $after_assoc['icon']; ?>">
                            <input name="service_id" type="hidden" value="<?php echo $after_assoc['id']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" value="<?php echo $after_assoc['title']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="facebook">Description</label>
                            <input name="description" type="text" class="form-control" id="description" value="<?php echo $after_assoc['description'] ?? ''; ?>">
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
