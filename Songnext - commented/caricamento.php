<?php
	/**
	 * Start a PHP session
	 */
	session_start();

	/**
	 * Includes database connection file
	 */
	include_once 'connessione.php';
    
	/**
	 * Checks if a form has been submitted using the POST method and if the "post" input has been set
	 */
	if(isset($_POST['pubblica'])){
		/**
		 * Retrieves the name of the uploaded file
		 */
		$file=$_FILES["file"]["name"];

		/**
		 * Retrieves the description of the uploaded file
		 */
		$descrizione=$_POST['descrizione'];

		/**
		 * Retrieves the artist name of the uploaded file
		 */
		$nome_f=$_POST['nome_f'];
	}

	/**
	 * Enter the details of the song loaded into the database
	 */
	$sql="insert into canzone values (null, '$file','$nome_f','$descrizione','".date("Y-m-d h:i:s")."','".$_SESSION['nomeu']."');";

	/**
	 * Specifies the folder where the file will be uploaded
	 */
	$inserimento = "song/";

	/**
	 * Execute the SQL query to insert the song details into the database
	 */
	$result=mysqli_query($conn,$sql);

	/**
	 * Specifies the full path to the file that will be uploaded
	 */
	$target_file = $inserimento . basename($_FILES["file"]["name"]&&$result);
    
	/**
	 * Check if the file was uploaded successfully
	 */
	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		/**
		 * Redirects the user to the home.php page
		 */
		header("location:home.php");
	} else {
		/**
		 * Check if the SQL query was successful
		 */
		if(!$result){
			/**
			 * Print an error message
			 */
			die("<p style='color: red;text-align:center;'>Error<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
		}
		/**
		 * Print an error message if the file was not uploaded correctly
		 */
		echo "<p style='color: red;text-align:center;'>Sorry, there was an error uploading your file.</p>";
	}
?>