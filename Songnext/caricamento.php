<?php
	session_start();
	include_once 'connessione.php';
	//var_dump($_POST);
	//print_r($_FILES);
	if(isset($_POST['pubblica'])){
		$file=$_FILES["file"]["name"];
		$descrizione=$_POST['descrizione'];
		$nome_f=$_POST['nome_f'];
	}
	$sql="insert into canzone values (null, '$file','$nome_f','$descrizione','".date("Y-m-d h:i:s")."','".$_SESSION['nomeu']."');";
	$inserimento = "song/";
	$result=mysqli_query($conn,$sql);
	$target_file = $inserimento . basename($_FILES["file"]["name"]&&$result);
	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		header("location:home.php");
	} else {
		if(!$result){
			die("<p style='color: red;text-align:center;'>Error<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
		}
		echo "<p style='color: red;text-align:center;'>Sorry, there was an error uploading your file.</p>";
	}
?>