<?php
session_start();
require_once 'db.php';
$month = $_POST['month'];
$title = $_POST['title'];
$description = $_POST['description'];

$id = $_POST['about_id'];
$old_image = $_POST['old_image'];



if (empty($title)) {
    $title_err = 'Title is require';
    header("location: about_edit.php?title_err=$title_err");
} elseif (empty($description)) {
    $description_err = 'Designation is require';
    header("location: edit_about.php?description_err=$description_err");
} else {
    $about_update_query = "UPDATE abouts SET month = '$month',title = '$title',description = '$description' WHERE id = '$id'";
    $about_from_db = mysqli_query($db_connect, $about_update_query);
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
                move_uploaded_file($_FILES['image']['tmp_name'], "uploads/about/$new_name");
                $about_update_query = "UPDATE abouts SET image = '$new_name' WHERE id = '$id'";
                mysqli_query($db_connect, $about_update_query);
            }
        }
    }
    $_SESSION['about_updated_successfully'] = 'about updated successfully';
    header('location: about_list.php');
}
