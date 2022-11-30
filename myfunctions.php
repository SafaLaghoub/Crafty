<?php
include("config/dbconn.php");
function redirect($url,$message)
{
	$_SESSION['message'] = $message;
	header('Location: '.$url);
	exit();
}

function getAll($table)
{
	global $connection;
	$query = "SELECT * FROM $table";
	$query_run = mysqli_query ($connection,$query);
}
?>