<?php
	
	if($_POST['func']=="sendlike"){
		include_once 'connessione.php';
		$codc=$_POST['id'];
		$nomeu=$_POST['nome'];
		$sql="select * from slike where codc=$codc and nome_u='$nomeu';";
		$result=mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0){
			$sql="delete from slike where codc=$codc and nome_u='$nomeu';";
			$result=mysqli_query($conn, $sql);
			if(!$result){
				echo 0;
			}
			else
				echo 2;
		}
		else{
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