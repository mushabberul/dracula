<?php
session_start();
require_once 'db.php';
$subtitle = $_POST['subtitle'];
$title = $_POST['title'];
$button_text = $_POST['button_text'];



if (empty($title)) {
    $title_err = 'Title is require';
    header("location: add_hero.php?title_err=$title_err");
} elseif (empty($button_text)) {
    $button_text_err = 'button_text is require';
    header("location: add_hero.php?button_text_err=$button_text_err");
} else {
    $hero_insert_query = "INSERT INTO heros(subtitle,title,button_text) VALUES('$subtitle','$title','$button_text')";
    $hero_from_db = mysqli_query($db_connect, $hero_insert_query);
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
                move_uploaded_file($_FILES['image']['tmp_name'], "uploads/hero/$new_name");
                $hero_update_query = "UPDATE heros SET image = '$new_name' WHERE id = '$id'";
                mysqli_query($db_connect, $hero_update_query);
            }
        }
    }
    $_SESSION['hero_added_successfully'] = 'hero added successfully';
    header('location: hero_list.php');
}
