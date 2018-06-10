<?php 
	include('connection.php');
	$id=$_POST['id'];
	$query="select roomType,noRooms from bookings where bookingID= '$id' " ;
	$dataSetBooking=mysqli_query($connection,$query);
	$rowBooking=mysqli_fetch_array($dataSetBooking);

	$room=$rowBooking['roomType'];
	$amount=$rowBooking['noRooms'];

	$query="select availableAmount from rooms where type= '$room' " ;
	$dataSetRooms=mysqli_query($connection,$query);
	$rowRooms=mysqli_fetch_array($dataSetRooms);
	$current=$rowRooms['availableAmount'];

	$tot=(int)$amount+(int)$current;
	
	$query="update rooms set availableAmount= '$tot' where type= '$room' ";
	$resultUpdate=mysqli_query($connection,$query);

	$query="delete from bookings where bookingID='$id' ";
	$resultDelete=mysqli_query($connection,$query);
	$result=$resultDelete+$resultUpdate;
	echo"$result";
?>