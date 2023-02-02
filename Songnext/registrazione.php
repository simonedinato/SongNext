<?php
session_start();
if(isset($_SESSION['nomeu'])){
	header ('location:home.php');
}
$title = "Registrati";
include_once "header.php";

if(isset($_POST['invio'])){
	$nome=$_POST['nome'];
	$cognome=$_POST['cognome'];
	$dataN=$_POST['dataN'];
	$nomeu=$_POST['nomeu'];
	$psw=md5($_POST['password']);
	$sql="select nome_u from utente where nome_u='$nomeu';";
	$result=mysqli_query($conn,$sql);
	//var_dump($result);
	if($result){
		if(mysqli_num_rows($result)>0){
			echo "<p style='color: red;text-align:center;'>Nome utente già esistente</p>";
		}
		else{
			echo $sql="insert into utente values ('$nomeu','$nome','$cognome','$dataN','$psw');";
			$result=mysqli_query($conn,$sql);
			if(!$result){
				die("<p style='color: red;text-align:center;'>Errore in fase di inserimento utente <br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
			}
			else{
				header("location:accesso.php");
			}
		}
	}
}
$future_timestamp = strtotime("-16 years");
$data = date('Y-m-d', $future_timestamp);
?>
		
		<div id="barra-2">
			<h2>Registrati</h2>
		</div><br>
		<div id="box">
			<form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
				<fieldset>
					<legend style="text-align:center;">Dati anagrafici</legend>
					<label class="label1" >Nome:</label>
					<input class="registrazione input1" type="text" <?php if(isset($_GET['invio'])){ echo "value='$nome'"; } ?> name="nome" required><br><br>
					<label class="label1" >Cognome:</label>
					<input class="registrazione input1" type="text" <?php if(isset($_GET['invio'])){ echo "value='$cognome'"; } ?> name="cognome" required><br><br>
					<label class="label1" >Data di Nascita:</label>
					<input class="registrazione input1" type="date" <?php if(isset($_GET['invio'])){ echo "value='$dataN'"; } echo "max='$data'"; ?> name="dataN" required><br><br>
				</fieldset>
				<br>
				<fieldset>
					<legend style="text-align:center;">Credenziali</legend>
					<label class="label1" >Nome Utente:</label>
					<input class="registrazione input1" type="text" name="nomeu" required><br><br>
					<label class="label1" >Password:</label>
					<input class="registrazione input1" type="password" name="password" required><br><br>
					<br><br>
					<div class="reg">
						<input class="button inv" type="submit" name="invio" value="Invio">
						<input class="button" type="button" onclick="location.href='index.php';" name="annulla" value="Annulla">
					</div>
				</fieldset>
			</form>
		</div>
<?php
include_once "footer.php";
?>