<?php
require_once 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Portfolio</h2>
                </div>
                <div class="card-body">

                    <form method="post" action="store_portfolio.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Project Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Enter project name">

                        </div>
                        <div class="form-group">
                            <label for="description">Project Description</label>
                            <input name="description" type="text" class="form-control" id="description" placeholder="Project description">

                        </div>
                        <div class="form-group">
                            <label for="client">Client</label>
                            <input name="client_name" type="text" class="form-control" id="client" placeholder="client">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input name="category" type="text" class="form-control" id="category" placeholder="category">
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
