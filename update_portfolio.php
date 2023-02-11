<?php
session_start();
require_once 'db.php';
$name = $_POST['name'];
$description = $_POST['description'];
$client_name = $_POST['client_name'];
$category = $_POST['category'];

$id = $_POST['portfolio_id'];
$old_image = $_POST['old_image'];



if (empty($name)) {
    $name_err = 'name is require';
    header("location: portfolio_edit.php?name_err=$name_err");
} elseif (empty($description)) {
    $description_err = 'Designation is require';
    header("location: portfolio_edit.php?description_err=$description_err");
} else {
    $portfolio_update_query = "UPDATE portfolios SET name = '$name',description = '$description',client_name = '$client_name',category = '$category' WHERE id = '$id'";
    $portfolio_from_db = mysqli_query($db_connect, $portfolio_update_query);
    $image = $_FILES['image'];
    $image_size = $_FILES['image']['size'];
    $image_name = $_FILES['image']['name'];
    $extension = explode('.', $image_name);
    $exact_extension = end($extension);
    $new_name = $id . '.' . $exact_extension;

    $allowed_extension = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', "JPEG"];
    if ($image_name) {
        if ("default.jpg" != basename($old_image)) {
            unlink($old_image);
        }
        if (in_array($exact_extension, $allowed_extension)) {
            if ($image_size < 1 * 1024 * 1024) {
                move_uploaded_file($_FILES['image']['tmp_name'], "uploads/portfolio/$new_name");
                $portfolio_update_query = "UPDATE portfolios SET image = '$new_name' WHERE id = '$id'";
                mysqli_query($db_connect, $portfolio_update_query);
            }
        }
    }
    $_SESSION['portfolio_updated_successfully'] = 'portfolio updated successfully';
    header('location: portfolio_list.php');
}
