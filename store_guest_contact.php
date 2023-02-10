<?php
session_start();
require_once 'db.php';
print_r($_POST);
$guest_name = $_POST['guest_name'];
$guest_email = $_POST['guest_email'];
$guest_phone = $_POST['guest_phone'];
$guest_message = $_POST['guest_message'];

if (empty($guest_name)) {
    $_SESSION['guest_name_err'] = 'Name is required';
    header('location: index.php#contact');
}
if (empty($guest_email)) {
    $_SESSION['guest_email_err'] = 'Email is required';
    header('location: index.php#contact');
}

if (!empty($guest_email) && !filter_var($guest_email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['guest_valide_email_err'] = 'Valide email is required';
    header('location: index.php#contact');
}
if (empty($guest_phone)) {
    $_SESSION['guest_phone_err'] = 'Phone is required';
    header('location: index.php#contact');
}
if (empty($guest_message)) {
    $_SESSION['guest_message_err'] = 'Message is required';
    header('location: index.php#contact');
}

$contact_insert_query = "INSERT INTO contacts(guest_name,guest_email,guest_phone,guest_message) VALUES('$guest_name','$guest_email','$guest_phone','$guest_message')";
mysqli_query($db_connect, $contact_insert_query);
$_SESSION['contact_message_send_successfully'] = 'Form submission successful!';
header('location: index.php#contact');
