<?php
require_once 'header.php';
require_once 'db.php';
$id = $_GET['portfolio_id'];
$portfolio_select_query = "SELECT * FROM portfolios WHERE id ='$id'";
$portfolio_from_db = mysqli_query($db_connect, $portfolio_select_query);
$after_assoc = mysqli_fetch_assoc($portfolio_from_db);
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Edit portfolio</h2>
                </div>
                <div class="card-body">

                    <form method="post" action="update_portfolio.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" value="<?php echo $after_assoc['name']; ?>">
                            <input name="portfolio_id" type="hidden" value="<?php echo $after_assoc['id']; ?>">

                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input name="description" type="text" class="form-control" id="description" value="<?php echo $after_assoc['description'] ?? ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="client_name">Client Name</label>
                            <input name="client_name" type="text" class="form-control" id="client_name" value="<?php echo $after_assoc['client_name'] ?? ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="category">Client Name</label>
                            <input name="category" type="text" class="form-control" id="category" value="<?php echo $after_assoc['category'] ?? ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="image">Old Image</label><br />
                            <img width="100" src="uploads/portfolio/<?php echo $after_assoc['image']; ?>" alt="">
                            <input name="old_image" type="hidden" value="uploads/portfolio/<?php echo $after_assoc['image']; ?>">
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
