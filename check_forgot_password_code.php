<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot password code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">Enter the code</div>
                    <div class="card-body">
                        <?php if (isset($_SESSION['forget_password_empty_err'])) : ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION['forget_password_empty_err']; ?>
                            </div>
                        <?php
                        endif;
                        unset($_SESSION['forget_password_empty_err']);
                        ?>
                        <?php if (isset($_SESSION['forget_password_code_err'])) : ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION['forget_password_code_err']; ?>
                            </div>
                        <?php
                        endif;
                        unset($_SESSION['forget_password_code_err']);
                        ?>
                        <form action="check_forgot_password_code_post.php" method="post">
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="number" class="form-control" id="code" name="code">
                                <button type="submit" class="mt-2 btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>