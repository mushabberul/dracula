<?php
session_start();
require_once 'db.php';
$id = $_GET['service_id'];
$query_service_delete = "DELETE FROM services WHERE id = '$id'";
mysqli_query($db_connect, $query_service_delete);
$_SESSION['delete_service_successfully'] = 'Service deleted successfully';
header('location: service_list.php');
