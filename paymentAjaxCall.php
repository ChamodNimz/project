<?php 
	include('connection.php');
	$id=$_POST['id'];
	$query="update bookings set statusPayment='paid' where bookingID= '$id'" ;
	$result=mysqli_query($connection,$query);
	echo"$result";

?>