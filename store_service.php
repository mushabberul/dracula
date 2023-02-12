<?php
session_start();
require_once 'db.php';
$icon = $_POST['icon'];
$title = $_POST['title'];
$description = $_POST['description'];



if (empty($icon)) {
    $icon_err = 'Icon is require';
    header("location: add_service.php?icon_err=$icon_err");
} elseif (empty($title)) {
    $title_err = 'Title is require';
    header("location: add_service.php?title_err=$title_err");
} elseif (empty($description)) {
    $description_err = 'Description is require';
    header("location: add_service.php?description_err=$description_err");
} else {
    $service_insert_query = "INSERT INTO services(icon,title,description) VALUES('$icon','$title','$description')";
    $service_from_db = mysqli_query($db_connect, $service_insert_query);

    $_SESSION['service_added_successfully'] = 'service added successfully';
    header('location: service_list.php');
}
