<?php
require_once 'header.php';
require_once 'db.php';
$hero_select_query = "SELECT * FROM heros";
$hero_from_db = mysqli_query($db_connect, $hero_select_query);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Hero List</h6>
    </div>
    <div class="card-body">
        <?php if (isset($_SESSION['hero_added_successfully'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['hero_added_successfully'] ?>
            </div>
        <?php endif;
        unset($_SESSION['hero_added_successfully']);
        ?>
        <?php if (isset($_SESSION['delete_hero_successfully'])) : ?>
            <div class="alert alert-danger">
                <?= $_SESSION['delete_hero_successfully'] ?>
            </div>
        <?php endif;
        unset($_SESSION['delete_hero_successfully']);
        ?>
        <?php if (isset($_SESSION['hero_updated_successfully'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['hero_updated_successfully'] ?>
            </div>
        <?php endif;
        unset($_SESSION['hero_updated_successfully']);
        ?>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SI No</th>
                        <th>ID</th>
                        <th>Subtitle</th>
                        <th>Title</th>
                        <th>Button Text</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $flag = 1;
                    foreach ($hero_from_db as $hero) :
                    ?>
                        <tr>
                            <td><?php echo $flag++; ?></td>
                            <td><?php echo $hero['id'] ?></td>
                            <td><?php echo $hero['subtitle'] ?></td>
                            <td><?php echo $hero['title'] ?></td>
                            <td><?php echo $hero['button_text'] ?></td>
                            <td>
                                <img width="100" src="uploads/hero/<?php echo $hero['image'] ?>" alt="">
                            </td>
                            <td>
                                <a href="hero_edit.php?hero_id=<?= $hero['id'] ?>" class="btn btn-info">Edit</a>
                                <a href="hero_delete.php?hero_id=<?= $hero['id'] ?>" class="btn btn-danger">Del</a>
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
