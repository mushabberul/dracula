<?php
session_start();
require_once 'db.php';
$name = $_POST['name'];

$image = $_FILES['image'];
$image_size = $_FILES['image']['size'];
$image_name = $_FILES['image']['name'];

if (empty($name)) {
    $name_err = 'Name is require';
    header("location: add_client_logo.php?name_err=$name_err");
} elseif (empty($image_name)) {
    $image_err = 'Image is require';
    header("location: add_client_logo.php?image_err=$image_err");
} else {
    $client_logo_insert_query = "INSERT INTO client_logos(name) VALUES('$name')";
    $client_logo_from_db = mysqli_query($db_connect, $client_logo_insert_query);

    $extension = explode('.', $image_name);
    $exact_extension = end($extension);
    $id = mysqli_insert_id($db_connect);
    $new_name = $id . '.' . $exact_extension;
    $allowed_extension = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'jpeg', 'svg'];

    if (in_array($exact_extension, $allowed_extension)) {
        if ($image_size < 1 * 1024 * 1024) {

            move_uploaded_file($_FILES['image']['tmp_name'], "uploads/client_logo/$new_name");
            $client_logo_update_query = "UPDATE client_logos SET image = '$new_name' WHERE id = '$id'";
            mysqli_query($db_connect, $client_logo_update_query);
        }
    }

    $_SESSION['client_logo_added_successfully'] = 'client_logo added successfully';
    header('location: client_logo_list.php');
}
