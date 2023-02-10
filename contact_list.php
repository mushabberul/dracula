<?php
require_once 'header.php';
require_once 'db.php';
$contact_select_query = "SELECT * FROM contacts";
$contact_from_db = mysqli_query($db_connect, $contact_select_query);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Contact List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SI No</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $flag = 1;
                    foreach ($contact_from_db as $contact) :
                    ?>
                        <tr>
                            <td><?php echo $flag++; ?></td>
                            <td><?php echo $contact['id'] ?></td>
                            <td><?php echo $contact['guest_name'] ?></td>
                            <td><?php echo $contact['guest_email'] ?></td>
                            <td><?php echo $contact['guest_phone'] ?></td>
                            <td><?php echo $contact['guest_message'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
