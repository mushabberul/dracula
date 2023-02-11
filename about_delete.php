<?php
session_start();
require_once 'db.php';
$id = $_GET['about_id'];
$query_about_delete = "DELETE FROM abouts WHERE id = '$id'";
mysqli_query($db_connect, $query_about_delete);
$_SESSION['delete_about_successfully'] = 'about deleted successfully';
header('location: about_list.php');
