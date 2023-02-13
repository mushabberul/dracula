<?php
require_once 'header.php';
require_once 'db.php';

$query_user_select = "SELECT COUNT(*) total_user FROM users";
$select_from_db = mysqli_query($db_connect, $query_user_select);
$user_after_assoc = mysqli_fetch_assoc($select_from_db);

$query_contact_select = "SELECT COUNT(*) total_contact FROM contacts";
$select_from_db = mysqli_query($db_connect, $query_contact_select);
$contact_after_assoc = mysqli_fetch_assoc($select_from_db);

$query_client_select = "SELECT COUNT(*) total_client FROM client_logos";
$select_from_db = mysqli_query($db_connect, $query_client_select);
$client_after_assoc = mysqli_fetch_assoc($select_from_db);

$query_team_member_select = "SELECT COUNT(*) total_team_member FROM teams";
$select_from_db = mysqli_query($db_connect, $query_team_member_select);
$team_member_after_assoc = mysqli_fetch_assoc($select_from_db);

$query_portfolio_select = "SELECT COUNT(*) total_portfolio FROM portfolios";
$select_from_db = mysqli_query($db_connect, $query_portfolio_select);
$portfolio_after_assoc = mysqli_fetch_assoc($select_from_db);

$query_service_select = "SELECT COUNT(*) total_service FROM services";
$select_from_db = mysqli_query($db_connect, $query_service_select);
$service_after_assoc = mysqli_fetch_assoc($select_from_db);


?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->


    <!-- Content Row -->

    <div class="row">


    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Summary</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Total User<span class="float-right"><?php echo $user_after_assoc['total_user'] ?></span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width:<?php echo $user_after_assoc['total_user'] ?>%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Total Contact <span class="float-right"><?php echo $contact_after_assoc['total_contact']; ?></span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width:<?php echo $contact_after_assoc['total_contact']; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Total Service <span class="float-right"><?php echo $service_after_assoc['total_service']; ?></span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width:<?php echo $service_after_assoc['total_service']; ?>%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Total Client <span class="float-right"><?php echo $client_after_assoc['total_client']; ?></span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width:<?php echo $client_after_assoc['total_client']; ?>%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Total Team Member <span class="float-right"><?php echo $team_member_after_assoc['total_team_member']; ?></span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width:<?php echo $team_member_after_assoc['total_team_member']; ?>%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Total Completed Project <span class="float-right"><?php echo $portfolio_after_assoc['total_portfolio']; ?></span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $portfolio_after_assoc['total_portfolio']; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="backend_assets/img/undraw_posting_photo.svg" alt="...">
                    </div>
                    <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                        constantly updated collection of beautiful svg images that you can use
                        completely free and without attribution!</p>
                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                        unDraw &rarr;</a>
                </div>
            </div>

            <!-- Approach -->


        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
require_once 'footer.php';
