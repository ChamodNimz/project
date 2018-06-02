<?php 
class Connection{

//constructor for database connection
	function __construct(){
		$username="demon";
		$password="demon123";
		$server="localhost";
		$database="hotelReservation";
		$connection=mysqli_connect($server,$username,$password);
		mysqli_select_db($connection,$database);

	}

	function insertData($query){
		$results=mysqli_query($query);
		return $results;
	}
	function getData($query){
		 return $dataSet=mysqli_query($query);

	}
}
?>