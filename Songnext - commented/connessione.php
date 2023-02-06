<?php
	/**
	 * Connect to the database.
	 *
	 * Connects to the database server and selects the specified database.
	 * If the connection is not successful, it will terminate the script
	 * and display an error message.
	 *
	 * @author Simone Dinato
	 */

	error_reporting(0);
	$server = "ftp.simonedinato.altervista.org"; 
	$user = "simonedinato"; 
	$psw = "5HDas56rDC27"; 
	$dbname="my_simonedinato";

	/**
	 * Connect to the database server with the specified credentials.
	 */
	$conn=mysqli_connect($server, $user, $psw, $dbname); 
	/**
	 * If the connection is not successful, terminate the script
	 * and display an error message.
	 */
	if(!$conn){
		die("problemi di connessione del db: <br>". mysqli_connect_error(). mysqli_connect_errno());
	}
?>