<?php
	session_start();
	require_once "connessione.php";
	$sql="delete from slike where nome_u='".$_SESSION['nomeu']."';";
	$result=mysqli_query($conn,$sql);
	if(!$result){
		die( "<p style='color: red;text-align:center;'>Errore<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
	}
	$sql2="delete from commenti where nome_u='".$_SESSION['nomeu']."';";
	$result2=mysqli_query($conn,$sql2);
	if(!$result2){
		die( "<p style='color: red;text-align:center;'>Errore<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
	}
	$sql3="delete from canzone where nome_u='".$_SESSION['nomeu']."';";
	$result3=mysqli_query($conn,$sql3);
	if(!$result3){
		die( "<p style='color: red;text-align:center;'>Errore<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
	}
	$sql4="delete from utente where nome_u='".$_SESSION['nomeu']."';";
	$result4=mysqli_query($conn,$sql4);
	if(!$result4){
		die( "<p style='color: red;text-align:center;'>Errore<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
	}
	session_destroy();
	header("Location:index.php");
?>