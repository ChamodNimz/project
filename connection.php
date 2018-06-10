<?php 

		$username="nimna";
		$password="nimna123";
		$server="localhost";
		$database="hotelreservation";
		$connection=mysqli_connect($server,$username,$password);
		$db=mysqli_select_db($connection,'hotelreservation');

?>