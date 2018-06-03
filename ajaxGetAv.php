<?php 
// get availability details to booking 
require_once('connection.php');
	$id=$_GET['id'];
	$query="select availableAmount from rooms where rId= $id";
	$dataSet=mysqli_query($connection,$query);
	$row=mysqli_fetch_array($dataSet);
	echo"$row[0]";

?>