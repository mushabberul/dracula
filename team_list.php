<?php
require_once 'header.php';
require_once 'db.php';
$team_select_query = "SELECT * FROM teams";
$team_from_db = mysqli_query($db_connect, $team_select_query);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Team List</h6>
    </div>
    <div class="card-body">
        <?php if (isset($_SESSION['delete_team_successfully'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['delete_team_successfully'] ?>
            </div>
        <?php endif;
        unset($_SESSION['delete_team_successfully']);
        ?>
        <?php if (isset($_SESSION['team_member_added_successfully'])) : ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['team_member_added_successfully']; ?>
            </div>
        <?php
        endif;
        unset($_SESSION['team_member_added_successfully']);
        ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SI No</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $flag = 1;
                    foreach ($team_from_db as $team) :
                    ?>
                        <tr>
                            <td><?php echo $flag++; ?></td>
                            <td><?php echo $team['id'] ?></td>
                            <td><?php echo $team['name'] ?></td>
                            <td><?php echo $team['designation'] ?></td>
                            <td>
                                <img width="100" src="uploads/team/<?php echo $team['image'] ?>" alt="">
                            </td>
                            <td>
                                <a href="team_edit.php?team_id=<?= $team['id'] ?>" class="btn btn-info">Edit</a>
                                <a href="team_delete.php?team_id=<?= $team['id'] ?>" class="btn btn-danger">Del</a>
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
