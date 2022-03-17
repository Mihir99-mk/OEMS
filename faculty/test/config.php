<?php
	// Database configuration 
	$hostname = "localhost"; 
	$username = "root"; 
	$password = ""; 
	$dbname   = "pakainfo_v1"; 
	 
	// Make database connection 
	$conn = mysqli_connect($hostname, $username, $password, $dbname); 
	 
	// here Check connection
	if(mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	}

?>