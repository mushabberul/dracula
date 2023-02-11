<?php
session_start();
require_once 'db.php';
$id = $_GET['portfolio_id'];
$query_portfolio_delete = "DELETE FROM portfolios WHERE id = '$id'";
mysqli_query($db_connect, $query_portfolio_delete);
$_SESSION['delete_portfolio_successfully'] = 'Portfolio deleted successfully';
header('location: portfolio_list.php');
