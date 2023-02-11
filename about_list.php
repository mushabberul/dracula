<?php
require_once 'header.php';
require_once 'db.php';
$about_select_query = "SELECT * FROM abouts";
$about_from_db = mysqli_query($db_connect, $about_select_query);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Team List</h6>
    </div>
    <div class="card-body">
        <?php if (isset($_SESSION['about_added_successfully'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['about_added_successfully'] ?>
            </div>
        <?php endif;
        unset($_SESSION['about_added_successfully']);
        ?>
        <?php if (isset($_SESSION['delete_about_successfully'])) : ?>
            <div class="alert alert-danger">
                <?= $_SESSION['delete_about_successfully'] ?>
            </div>
        <?php endif;
        unset($_SESSION['delete_about_successfully']);
        ?>
        <?php if (isset($_SESSION['about_updated_successfully'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['about_updated_successfully'] ?>
            </div>
        <?php endif;
        unset($_SESSION['about_updated_successfully']);
        ?>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SI No</th>
                        <th>ID</th>
                        <th>Month</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $flag = 1;
                    foreach ($about_from_db as $about) :
                    ?>
                        <tr>
                            <td><?php echo $flag++; ?></td>
                            <td><?php echo $about['id'] ?></td>
                            <td><?php echo $about['month'] ?></td>
                            <td><?php echo $about['title'] ?></td>
                            <td><?php echo $about['description'] ?></td>
                            <td>
                                <img width="100" src="uploads/about/<?php echo $about['image'] ?>" alt="">
                            </td>
                            <td>
                                <a href="about_edit.php?about_id=<?= $about['id'] ?>" class="btn btn-info">Edit</a>
                                <a href="about_delete.php?about_id=<?= $about['id'] ?>" class="btn btn-danger">Del</a>
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
