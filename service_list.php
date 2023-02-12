<?php
require_once 'header.php';
require_once 'db.php';
$service_select_query = "SELECT * FROM services";
$service_from_db = mysqli_query($db_connect, $service_select_query);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Service List</h6>
    </div>
    <div class="card-body">
        <?php if (isset($_SESSION['service_added_successfully'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['service_added_successfully'] ?>
            </div>
        <?php endif;
        unset($_SESSION['service_added_successfully']);
        ?>
        <?php if (isset($_SESSION['delete_service_successfully'])) : ?>
            <div class="alert alert-danger">
                <?= $_SESSION['delete_service_successfully'] ?>
            </div>
        <?php endif;
        unset($_SESSION['delete_service_successfully']);
        ?>
        <?php if (isset($_SESSION['service_updated_successfully'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['service_updated_successfully'] ?>
            </div>
        <?php endif;
        unset($_SESSION['service_updated_successfully']);
        ?>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SI No</th>
                        <th>ID</th>
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $flag = 1;
                    foreach ($service_from_db as $service) :
                    ?>
                        <tr>
                            <td><?php echo $flag++; ?></td>
                            <td><?php echo $service['id'] ?></td>
                            <td><?php echo $service['icon'] ?></td>
                            <td><?php echo $service['title'] ?></td>
                            <td><?php echo $service['description'] ?></td>

                            <td>
                                <a href="service_edit.php?service_id=<?= $service['id'] ?>" class="btn btn-info">Edit</a>
                                <a href="service_delete.php?service_id=<?= $service['id'] ?>" class="btn btn-danger">Del</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
