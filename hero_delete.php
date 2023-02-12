<?php
session_start();
require_once 'db.php';
$id = $_GET['hero_id'];
$query_hero_delete = "DELETE FROM heros WHERE id = '$id'";
mysqli_query($db_connect, $query_hero_delete);
$_SESSION['delete_hero_successfully'] = 'Hero deleted successfully';
header('location: hero_list.php');
