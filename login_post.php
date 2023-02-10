<?php
session_start();
require_once 'db.php';
$email = $_POST['email'];
$password = $_POST['password'];

$encrypted_password = md5($password);

$user_select_query = "SELECT * FROM users WHERE email = '$email' && password = '$encrypted_password'";
$user_from_db = mysqli_query($db_connect, $user_select_query);
if ($user_from_db->num_rows != 1) {
    $login_err = 'Email or Password not currect';
    header("location: login.php?login_err=$login_err");
} else {
    // print_r($user_from_db);

    $after_assoc = mysqli_fetch_assoc($user_from_db);
    $_SESSION['user_name'] = $after_assoc['first_name'];

    // print_r($after_assoc);


    header('location: dashboard.php');
}
