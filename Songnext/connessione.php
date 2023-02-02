<?php
	error_reporting(0);
	$server = "localhost"; 
	$user = "root"; 
	$psw = ""; 
	$dbname="songnext";

	$conn=mysqli_connect($server, $user, $psw, $dbname); 
	if(!$conn){
		die("problemi di connessione del db: <br>". mysqli_connect_error(). mysqli_connect_errno());
	}
?>