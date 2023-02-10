<?php
session_start();
require_once 'db.php';
$name = $_POST['name'];
$designation = $_POST['designation'];
$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$linkedin = $_POST['linkedin'];


if (empty($name)) {
    $name_err = 'Name is require';
    header("location: add_team.php?name_err=$name_err");
} elseif (empty($designation)) {
    $designation_err = 'Designation is require';
    header("location: add_team.php?designation_err=$designation_err");
} else {
    $team_insert_query = "INSERT INTO teams(name,designation,facebook,twitter,linkedin) VALUES('$name','$designation','$facebook','$twitter','$linkedin')";
    $team_from_db = mysqli_query($db_connect, $team_insert_query);
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
                move_uploaded_file($_FILES['image']['tmp_name'], "uploads/team/$new_name");
                $team_update_query = "UPDATE teams SET image = '$new_name' WHERE id = '$id'";
                mysqli_query($db_connect, $team_update_query);
            }
        }
    }
    $_SESSION['team_member_added_successfully'] = 'Team member added successfully';
    header('location: add_team.php');
}
