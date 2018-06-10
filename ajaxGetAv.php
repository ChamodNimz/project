<?php 
// get availability details to booking 
require_once('connection.php');
	$id=$_GET['id'];
	$checkInDate=$_GET['cIn'];
	$checkOutDate=$_GET['cOut'];
	$month=$_GET['d'];//month of the selected check in date
	$span=$_GET['spn'];
	$span=explode(",",$span);
	global $rm;
	//$str=String.substr($checkInDate,5,6);
	//echo"$checkInDate";
	//echo "$checkOutDate";
	//echo"$str";
	if($id==1){
		$rm='deluxe room';
	}
	else if($id==2){
		$rm='Executive Room';
	}
	else if($id==3){
		$rm="Premium Room";
	}
	else if($id==4){
		$rm="Superior Room";
	}
	$query="select fullAmount from rooms where rId= $id";
	$dataSetId=mysqli_query($connection,$query);
	$amnt=mysqli_fetch_array($dataSetId);

	$query="SELECT dateSpan FROM `bookings` WHERE checkInDate BETWEEN '2018-$month-01' and '2018-$month-31' and roomType='$rm' ";

	$dataSet=mysqli_query($connection,$query);
	 $c=0;
	while($row=mysqli_fetch_array($dataSet)){
		
		$array=explode(",",$row['dateSpan']);

		for($i=0;$i<sizeof($span);$i++){
		$value=in_array($span[$i],$array);
		if(!$value==null){
			$c=$c+1;
			//echo"broken";
			break;
		}
		
	}
		/*$finalArray=array_intersect($array,$span);
		if($finalArray!=null){
			$c=$c+1;
		}
		else{

		}*/
		
	}
			if($c<$amnt[0]){
				
				echo"1";
			}
			else{
				echo"0";
			}

	//$row=mysqli_fetch_array($dataSet);
	//echo"$row[0]";
	//echo "$span";
	//$query="select * from bookings where roomType = '$row['roomType']' and checkInDate='' and chekOutDate='' ";
?>