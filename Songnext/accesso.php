<?php
session_start();
if(isset($_SESSION['nomeu'])){
	header ('location:home.php');
}
$title = "Accedi";
include_once "header.php";
if(isset($_POST['invio'])){
	$nomeu=$_POST['nomeu'];
	$psw=md5($_POST['psw']);
	$sql="select psw from utente where nome_u='$nomeu' and psw='$psw'";
	$result=mysqli_query($conn,$sql);
	if(!$result){
		die("<p style='color: red;text-align:center;'>Errore col database<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
	}
	if(mysqli_num_rows($result)==0){
		die("<p style='color: red;text-align:center;'>Nome utente o password errati<br></p>");
	}
	$_SESSION["nomeu"]=$nomeu;
	header("location:home.php");
} 
?>
		<div id="barra-2">
			<h2>Accedi</h2>
		</div><br>
		<div id="box">
			<form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
				<fieldset>
					<label class="label1" >Nome utente:</label>
					<input class="input1" type="text" name="nomeu" required><br><br>
					<label class="label1" >Password:</label>
					<input class="input1" type="password" name="psw" required><br><br>
					<div class="reg">
						<input class="button inv" type="submit" name="invio" value="Invio">
					</div>
				</fieldset>
			</form>
		</div>
<?php
 include_once 'footer.php';  
?>
