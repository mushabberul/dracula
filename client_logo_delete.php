<?php
session_start();
require_once 'db.php';
$id = $_GET['client_logo_id'];
$query_client_logo_delete = "DELETE FROM client_logos WHERE id = '$id'";
mysqli_query($db_connect, $query_client_logo_delete);
$_SESSION['delete_client_logo_successfully'] = 'Client logo deleted successfully';
header('location: client_logo_list.php');
