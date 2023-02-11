<?php
require_once 'header.php';
require_once 'db.php';
$portfolio_select_query = "SELECT * FROM portfolios";
$portfolio_from_db = mysqli_query($db_connect, $portfolio_select_query);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Team List</h6>
    </div>
    <div class="card-body">
        <?php if (isset($_SESSION['portfolio_added_successfully'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['portfolio_added_successfully'] ?>
            </div>
        <?php endif;
        unset($_SESSION['portfolio_added_successfully']);
        ?>
        <?php if (isset($_SESSION['delete_portfolio_successfully'])) : ?>
            <div class="alert alert-danger">
                <?= $_SESSION['delete_portfolio_successfully'] ?>
            </div>
        <?php endif;
        unset($_SESSION['delete_portfolio_successfully']);
        ?>
        <?php if (isset($_SESSION['portfolio_updated_successfully'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['portfolio_updated_successfully'] ?>
            </div>
        <?php endif;
        unset($_SESSION['portfolio_updated_successfully']);
        ?>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SI No</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Client</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $flag = 1;
                    foreach ($portfolio_from_db as $portfolio) :
                    ?>
                        <tr>
                            <td><?php echo $flag++; ?></td>
                            <td><?php echo $portfolio['id'] ?></td>
                            <td><?php echo $portfolio['name'] ?></td>
                            <td><?php echo $portfolio['description'] ?></td>
                            <td><?php echo $portfolio['client_name'] ?></td>
                            <td><?php echo $portfolio['category'] ?></td>
                            <td>
                                <img width="100" src="uploads/portfolio/<?php echo $portfolio['image'] ?>" alt="">
                            </td>
                            <td>
                                <a href="portfolio_edit.php?portfolio_id=<?= $portfolio['id'] ?>" class="btn btn-info">Edit</a>
                                <a href="portfolio_delete.php?portfolio_id=<?= $portfolio['id'] ?>" class="btn btn-danger">Del</a>
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
