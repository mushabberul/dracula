<?php
session_start();
require_once 'db.php';
$email = $_POST['email'];
$password = $_POST['password'];

$encrypted_password = md5($password);

$user_select_query = "SELECT email,password FROM users WHERE email = '$email' && password = '$encrypted_password'";
$user_from_db = mysqli_query($db_connect, $user_select_query);
if ($user_from_db->num_rows != 1) {
    $login_err = 'Email or Password not currect';
    header("location: login.php?login_err=$login_err");
} else {
    header('location: deshboard.php');
}
