<?php
require_once 'header.php';
require_once 'db.php';
$client_logo_select_query = "SELECT * FROM client_logos";
$client_logo_from_db = mysqli_query($db_connect, $client_logo_select_query);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Client Logo List</h6>
    </div>
    <div class="card-body">
        <?php if (isset($_SESSION['client_logo_added_successfully'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['client_logo_added_successfully'] ?>
            </div>
        <?php endif;
        unset($_SESSION['client_logo_added_successfully']);
        ?>
        <?php if (isset($_SESSION['delete_client_logo_successfully'])) : ?>
            <div class="alert alert-danger">
                <?= $_SESSION['delete_client_logo_successfully'] ?>
            </div>
        <?php endif;
        unset($_SESSION['delete_client_logo_successfully']);
        ?>
        <?php if (isset($_SESSION['client_logo_updated_successfully'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['client_logo_updated_successfully'] ?>
            </div>
        <?php endif;
        unset($_SESSION['client_logo_updated_successfully']);
        ?>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SI No</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $flag = 1;
                    foreach ($client_logo_from_db as $client_logo) :
                    ?>
                        <tr>
                            <td><?php echo $flag++; ?></td>
                            <td><?php echo $client_logo['id'] ?></td>
                            <td><?php echo $client_logo['name'] ?></td>
                            <td>
                                <img width="100" src="uploads/client_logo/<?php echo $client_logo['image'] ?>" alt="">
                            </td>
                            <td>
                                <a href="client_logo_edit.php?client_logo_id=<?= $client_logo['id'] ?>" class="btn btn-info">Edit</a>
                                <a href="client_logo_delete.php?client_logo_id=<?= $client_logo['id'] ?>" class="btn btn-danger">Del</a>
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
