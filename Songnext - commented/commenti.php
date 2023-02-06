<?php
	/**
	 * Requests database connection file
	 */
	require_once 'connessione.php';

	/**
	 * Check if the form has been sent
	 */
	if(isset($_POST['posta'])){
			/**
			 * Start the session
			 */
			session_start();
			/**
			 * Include the database connection file
			 */
			include_once 'connessione.php';

			/**
			 * Set the $comment variable to the value of the form's "comment" field
			 */
			$commento=$_POST['commento'];
			/**
			 * Set the variable $codc with the value of the "codc" field of the form
			 */
			$codc=$_POST['codc'];

			/**
			 * Build the SQL query for inserting data into the database
			 */
			echo $sql="insert into commenti values (null, $codc, '$commento', '".$_SESSION['nomeu']."');";

			/**
			 * Run the SQL query
			 */
			$result=mysqli_query($conn, $sql);

			/**
			 * Check if the SQL query was successful
			 */
			if(!$result){
				/**
				 * Print an error message
				 */
				die("<p style='color: red;text-align:center;'>Errore<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
			}
			/**
			 * Redirects the user to the home.php page
			 */
			else
				header("location:home.php");
	}
?>
