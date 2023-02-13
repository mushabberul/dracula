<?php
session_start();
require_once 'db.php';
$old_password = $_POST['old_password'];
$encrypted_password = md5($old_password);
$query_password = "SELECT password FROM users WHERE password = '$encrypted_password'";

$from_db = mysqli_query($db_connect, $query_password);

// print_r($from_db);
// die();
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

if ($from_db->num_rows != 1) {
    $_SESSION['wrong_old_password_err'] = 'Old password not currect';
    header('location: change_password.php');
} elseif ($new_password != $confirm_password) {
    $_SESSION['new_and_confirm_pass_not_same_err'] = 'Password and confirm password are not same';
    header('location: change_password.php');
} else {
    $email = $_SESSION['email'];
    $encrypted_new_password = md5($new_password);
    $update_query = "UPDATE users SET password = '$encrypted_new_password' WHERE email = '$email'";
    $update_from_db = mysqli_query($db_connect, $update_query);
    $_SESSION['updated_sussfully'] = 'Password updated successfully, please login again';
    header('location: login.php');
}
