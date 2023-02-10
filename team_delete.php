<?php
session_start();
require_once 'db.php';
$id = $_GET['team_id'];
$query_team_delete = "DELETE FROM teams WHERE id = '$id'";
mysqli_query($db_connect, $query_team_delete);
$_SESSION['delete_team_successfully'] = 'Team member deleted successfully';
header('location: team_list.php');
