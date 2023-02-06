<?php
    /**
     * This code handles the sending of a like to a song in the database.
     */
	if($_POST['func']=="sendlike"){
		include_once 'connessione.php';
		
		/**
		 * Get the song id and user name from the post request.
		 */
		$codc=$_POST['id'];
		$nomeu=$_POST['nome'];
		
		/**
		 * Check if the like already exists in the database.
		 */
		$sql="select * from slike where codc=$codc and nome_u='$nomeu';";
		$result=mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0){
			
			/**
			 * If the like exists, remove it from the database.
			 */
			$sql="delete from slike where codc=$codc and nome_u='$nomeu';";
			$result=mysqli_query($conn, $sql);
			if(!$result){
				echo 0;
			}
			else
				echo 2;
		}
		else{
			
			/**
			 * If the like doesn't exist, add it to the database.
			 */
			$sql="insert into slike values ($codc, '$nomeu');";
			$result=mysqli_query($conn, $sql);
			if(!$result){
				echo 0;
			}
			else
				echo 1;
		}
	}
?>