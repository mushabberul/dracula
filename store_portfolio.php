<?php
session_start();
require_once 'db.php';
$name = $_POST['name'];
$description = $_POST['description'];
$client_name = $_POST['client_name'];
$category = $_POST['category'];



if (empty($name)) {
    $name_err = 'Name is require';
    header("location: add_portfolio.php?name_err=$name_err");
} elseif (empty($description)) {
    $description_err = 'Description is require';
    header("location: add_portfolio.php?description_err=$description_err");
} else {
    $portfolio_insert_query = "INSERT INTO portfolios(name,description,client_name,category) VALUES('$name','$description','$client_name','$category')";
    $portfolio_from_db = mysqli_query($db_connect, $portfolio_insert_query);
    $image = $_FILES['image'];
    $image_size = $_FILES['image']['size'];
    $image_name = $_FILES['image']['name'];
    $extension = explode('.', $image_name);
    $exact_extension = end($extension);
    $id = mysqli_insert_id($db_connect);
    $new_name = $id . '.' . $exact_extension;

    $allowed_extension = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', "JPEG"];
    if ($image_name) {
        if (in_array($exact_extension, $allowed_extension)) {
            if ($image_size < 1 * 1024 * 1024) {
                move_uploaded_file($_FILES['image']['tmp_name'], "uploads/portfolio/$new_name");
                $portfolio_update_query = "UPDATE portfolios SET image = '$new_name' WHERE id = '$id'";
                mysqli_query($db_connect, $portfolio_update_query);
            }
        }
    }
    $_SESSION['portfolio_added_successfully'] = 'Portfolio added successfully';
    header('location: portfolio_list.php');
}
