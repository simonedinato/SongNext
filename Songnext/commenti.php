<?php
	require_once 'connessione.php';
	if(isset($_POST['posta'])){
			session_start();
			include_once 'connessione.php';
			$commento=$_POST['commento'];
			$codc=$_POST['codc'];
			echo $sql="insert into commenti values (null, $codc, '$commento', '".$_SESSION['nomeu']."');";
			$result=mysqli_query($conn, $sql);
				if(!$result){
					die("<p style='color: red;text-align:center;'>Errore<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
				}
				else
					header("location:home.php");
	}
?>