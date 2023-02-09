<?php
// print_r($_POST);
require_once 'db.php';

require_once 'db.php';
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$user_select_query = "SELECT email FROM users WHERE email = '$email'";
$user_from_db = mysqli_query($db_connect, $user_select_query);


$upparcase = preg_match("/[A-Z]/", $password);
$lowercase = preg_match("/[a-z]/", $password);
$number = preg_match("/[0-9]/", $password);
$special_car = preg_match("/[#*$%&]/", $password);
// $pattern = "/[a-z]+[A-Z]+[0-9]+[#$%^&]/";
// $strong_pass = preg_match($pattern, $pass);

if (empty($first_name)) {
    $first_nameErr = 'First name is required';
    header("location: register.php?first_nameErr=$first_nameErr");
} elseif (empty($email)) {
    $emailErr = 'Email is required';
    header("location: register.php?first_name=$first_name&emailErr=$emailErr&last_name=$last_name");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailFilterErr = 'Pleas provide valide email';
    header("location: register.php?first_name=$first_name&emailFilterErr=$emailFilterErr&last_name=$last_name");
} elseif ($user_from_db->num_rows != 0) {
    $emailRegisteredErr = 'The email already register';
    header("location: register.php?first_name=$first_name&emailFilterErr=$emailFilterErr&last_name=$last_name&emailRegisteredErr=$emailRegisteredErr");
} elseif (empty($password)) {
    $passErr = 'Password is required';
    header("location: register.php?first_name=$first_name&email=$email&passErr=$passErr&last_name=$last_name");
} elseif (strlen($password) <= 7) {
    $passLenErr = 'Password have to 8 charectar or more';
    header("location: register.php?first_name=$first_name&email=$email&passLenErr=$passLenErr&last_name=$last_name");
} elseif (!$upparcase || !$lowercase || !$number || !$special_car) {
    $strongPassErr = 'Please insert a strong password with an upporcase , a lowercase and a special char';
    header("location: register.php?first_name=$first_name&email=$email&strongPassErr=$strongPassErr&last_name=$last_name");
} elseif ($password != $confirm_password) {
    $confirmPassErr = 'Please match confirm password';
    header("location: register.php?first_name=$first_name&email=$email&confirmPassErr=$confirmPassErr&last_name=$last_name");
} else {
    $encrypted_password = md5($password);
    $user_insert_query = "INSERT INTO users(first_name,last_name,email,password)VALUES('$first_name','$last_name','$email','$encrypted_password')";
    mysqli_query($db_connect, $user_insert_query);
    header('location: login.php');
}
