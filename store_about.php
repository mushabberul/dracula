<?php
session_start();
require_once 'db.php';
$month = $_POST['month'];
$title = $_POST['title'];
$description = $_POST['description'];



if (empty($title)) {
    $title_err = 'Title is require';
    header("location: add_about.php?title_err=$title_err");
} elseif (empty($description)) {
    $description_err = 'Description is require';
    header("location: add_about.php?description_err=$description_err");
} else {
    $about_insert_query = "INSERT INTO abouts(month,title,description) VALUES('$month','$title','$description')";
    $about_from_db = mysqli_query($db_connect, $about_insert_query);
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
                move_uploaded_file($_FILES['image']['tmp_name'], "uploads/about/$new_name");
                $about_update_query = "UPDATE abouts SET image = '$new_name' WHERE id = '$id'";
                mysqli_query($db_connect, $about_update_query);
            }
        }
    }
    $_SESSION['about_added_successfully'] = 'About added successfully';
    header('location: about_list.php');
}
