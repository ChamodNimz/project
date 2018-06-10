<?php require_once('connection.php');

	$fname=$_POST['txtFname'];
	$lname=$_POST['txtLname'];
	$email=$_POST['txtEmail'];
	$checkInDate=$_POST['txtCheckIn'];
	$checkOutDate=$_POST['txtCheckOut'];
	$telephone=$_POST['txtTelephone'];
	$reqs=$_POST['txtReqs'];//special reqests
	$price=$_POST['txtTotal'];
	$roomType=$_POST['txtRoomType'];
	$NoOfRooms=$_POST['txtRoomAmount'];// no of rooms
	$dateSpan=$_POST['dateArray'];

		if($roomType=='5000'){
			$room='Deluxe Room';
		}
		else if($roomType=='10000'){
			$room='Executive Room';
		}
		else if($roomType=='15000'){
			$room='Premium Room';
		}
		else if($roomType='25000'){
			$room='Superior Room';
		}

		$query="select availableAmount from rooms where type='$room'";
		$dataSet=mysqli_query($connection,$query);
		$row=mysqli_fetch_array($dataSet);

		$amount=$row['availableAmount'];
		$total=$amount-$NoOfRooms;

		//$query="update  rooms set availableAmount='$total' where type='$room' ";
		//$result=mysqli_query($connection,$query);
		$query="insert into bookings (fName,lName,email,checkInDate,chekOutDate,telephone,reqs,price,roomType,noRooms,statusPayment,dateSpan) values('$fname','$lname','$email','$checkInDate','$checkOutDate','$telephone','$reqs',$price,'$room','$NoOfRooms','bookedonly','$dateSpan')";
	$result=mysqli_query($connection,$query);
	
	if($result>=1){
		include('successMessage.php');
	}
	else{
		echo"Error Booking";
	}
?>