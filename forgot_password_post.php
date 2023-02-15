<?php
session_start();
require_once 'db.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = $_POST['email'];
if (empty($email)) {
    $_SESSION['forget_password_empty_err'] = 'Please enter a email address.';
    header('location: forgot_password.php');
}
// print_r($_POST);
$select_user_query = "SELECT email FROM users WHERE email = '$email'";
$user_from_db = mysqli_query($db_connect, $select_user_query);
// print_r($user_from_db);
if ($user_from_db->num_rows != 1) {
    $_SESSION['forget_password_wrong_err'] = 'Wrong email address.';
    header('location: forgot_password.php');
}

$random_number = rand();
$five_number = substr($random_number, 0, 5);

$update_forgot_password_code = "UPDATE users SET forgot_password_code = '$five_number' WHERE email = '$email'";
mysqli_query($db_connect, $update_forgot_password_code);

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'idbroll.1272644@gmail.com';                     //SMTP username
    $mail->Password   = 'vxvfnwjzivgngpwr';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('idbroll.1272644@gmail.com', 'Mailer');
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Your forgot password code';
    $mail->Body    = "Forgot password code:  <b>$five_number</b>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header('location: check_forgot_password_code.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
