<?php
session_start();
// print_r($_POST);
require_once 'db.php';
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];
$code = $_POST['code'];
// die;

$upparcase = preg_match("/[A-Z]/", $new_password);
$lowercase = preg_match("/[a-z]/", $new_password);
$number = preg_match("/[0-9]/", $new_password);
$special_car = preg_match("/[#*$%&]/", $new_password);
// $pattern = "/[a-z]+[A-Z]+[0-9]+[#$%^&]/";
// $strong_pass = preg_match($pattern, $pass);

if (empty($new_password)) {
    $_SESSION['new_passwordErr'] = 'Password is required';
    header("location: reset_password.php");
} elseif (strlen($new_password) <= 7) {
    $_SESSION['passLenErr'] = 'Password have to 8 charectar or more';
    header("location: reset_password.php");
} elseif (!$upparcase || !$lowercase || !$number || !$special_car) {
    $_SESSION['strongPassErr'] = 'Please insert a strong password with an upporcase , a lowercase and a special char';
    header("location: reset_password.php");
} elseif ($new_password != $confirm_password) {
    $_SESSION['confirmPassErr'] = 'Please match confirm password';
    header("location: reset_password.php");
} else {
    $encrypted_password = md5($new_password);
    $update_user_query = "UPDATE users SET password = '$encrypted_password' WHERE forgot_password_code = '$code'";
    // die;
    mysqli_query($db_connect, $update_user_query);
    header('location: login.php');
}
