<?php
session_start();
require_once 'db.php';
$icon = $_POST['icon'];
$title = $_POST['title'];
$description = $_POST['description'];

$id = $_POST['service_id'];



if (empty($icon)) {
    $icon_err = 'Icon is require';
    header("location: service_edit.php?icon_err=$icon_err");
} elseif (empty($title)) {
    $title_err = 'Title is require';
    header("location: service_edit.php?title_err=$title_err");
} elseif (empty($description)) {
    $description_err = 'Designation is require';
    header("location: edit_service.php?description_err=$description_err");
} else {
    $service_update_query = "UPDATE services SET icon = '$icon',title = '$title',description = '$description' WHERE id = '$id'";
    $service_from_db = mysqli_query($db_connect, $service_update_query);

    $_SESSION['service_updated_successfully'] = 'Service updated successfully';
    header('location: service_list.php');
}
