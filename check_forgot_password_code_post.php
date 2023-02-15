<?php
session_start();
require_once 'db.php';
$code = $_POST['code'];
$select_forgot_password_code_query = "SELECT forgot_password_code FROM users WHERE forgot_password_code = '$code'";
// die;
$forgot_password_code_from_db = mysqli_query($db_connect, $select_forgot_password_code_query);
// print_r($forgot_password_code_from_db);
// die;
if (empty($code) || $forgot_password_code_from_db->num_rows != 1) {
    $_SESSION['forget_password_code_err'] = 'The code is worng!';
    header('location: check_forgot_password_code.php');
} else {
    header("location: reset_password.php?code=$code");
}
