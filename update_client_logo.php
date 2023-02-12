<?php
session_start();
require_once 'db.php';
$name = $_POST['name'];

$id = $_POST['client_logo_id'];

$old_image = $_POST['old_image'];
$image = $_FILES['image'];
$image_name = $_FILES['image']['name'];



if (empty($name)) {
    $name_err = 'Name is require';
    header("location: client_logo_edit.php?name_err=$name_err");
} else {
    $client_logo_update_query = "UPDATE client_logos SET name = '$name' WHERE id = '$id'";
    $client_logo_from_db = mysqli_query($db_connect, $client_logo_update_query);
    $image_size = $_FILES['image']['size'];
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
                move_uploaded_file($_FILES['image']['tmp_name'], "uploads/client_logo/$new_name");
                $client_logo_update_query = "UPDATE client_logos SET image = '$new_name' WHERE id = '$id'";
                mysqli_query($db_connect, $client_logo_update_query);
            }
        }
    }
    $_SESSION['client_logo_updated_successfully'] = 'Client logo updated successfully';
    header('location: client_logo_list.php');
}
