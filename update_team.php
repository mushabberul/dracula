<?php
// print_r($_POST);
// echo basename($_POST['old_image']);
// die;
session_start();
require_once 'db.php';
$name = $_POST['name'];
$designation = $_POST['designation'];
$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$linkedin = $_POST['linkedin'];
$id = $_POST['team_id'];
$old_image = $_POST['old_image'];



if (empty($name)) {
    $name_err = 'Name is require';
    header("location: add_team.php?name_err=$name_err");
} elseif (empty($designation)) {
    $designation_err = 'Designation is require';
    header("location: add_team.php?designation_err=$designation_err");
} else {
    $team_update_query = "UPDATE teams SET name = '$name',designation = '$designation',facebook = '$facebook',twitter = '$twitter',linkedin = '$linkedin' WHERE id = '$id'";
    $team_from_db = mysqli_query($db_connect, $team_update_query);
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
                move_uploaded_file($_FILES['image']['tmp_name'], "uploads/team/$new_name");
                $team_update_query = "UPDATE teams SET image = '$new_name' WHERE id = '$id'";
                mysqli_query($db_connect, $team_update_query);
            }
        }
    }
    $_SESSION['team_member_updated_successfully'] = 'Team member updated successfully';
    header('location: team_list.php');
}
