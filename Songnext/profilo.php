<?php
session_start();
if(!$_SESSION['nomeu']){
	header ('location:index.php');
}
include_once 'header.php';

?>
		<script>
			function elimina(){
				if(confirm("Sei sicuro di voler eliminare il tuo account")){
					location.href="deleteaccount.php";
				}
			}
		</script>
		<div id="barra-2">
			<h2>Profilo</h2>
		</div>
		<div id="barra-3">
			<h3><?php echo $_SESSION['nomeu']; ?></h3>
		</div><br>
		<div id="canzoni" class="menu-c">
			<h4 style="text-align:center;color:white;">Le tue canzoni</h4>
			<?php
				$sql="select * from canzone where nome_u='".$_SESSION['nomeu']."' ;";
				$result=mysqli_query($conn,$sql);
				if(!$result){
					die("<p style='color: red;text-align:center;'>Errore<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
				}
				while($row=mysqli_fetch_assoc($result)){
					$sql="select * from slike where codc=".$row["codc"].";";
						$sql1="select * from slike where codc=".$row["codc"]." and nome_u='".$_SESSION['nomeu']."';";
						$result1=mysqli_query($conn, $sql);
						$result2=mysqli_query($conn, $sql1);
						if(mysqli_num_rows($result2)>0){
						$fill="#e56b6b";
					}
					else
						$fill="#a8b773";
			?>
			<div id="element">
				<h4 style="color:white;text-align:center;"><?php echo $row["nome_f"]; ?></h4>
				<audio controls>
					<source src='song/<?php echo $row["nome"]; ?>'/>
				</audio>
				<div style="display:inline-block;" onclick="sendlike(<?php echo $row["codc"]; ?>)" title="Like">
					<svg id="like-<?php echo $row["codc"]; ?>" style="cursor:pointer;margin-bottom:14px;" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="<?php echo $fill; ?>">
					<path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 18h2V6H7v12zm4 4h2V2h-2v20zm-8-8h2v-4H3v4zm12 4h2V6h-2v12zm4-8v4h2v-4h-2z"/></svg>
					<p class="nlike" id="nlike-<?php echo $row["codc"]; ?>" style="color:white;display:inline-block;"><?php echo mysqli_num_rows($result1) ?></p>
				</div>
				<p style="color:white;">
					<?php 
						echo $row["descrizione"];
					?>
				</p>
				<br>
				<div>
						<script> var x=true;</script>
						<a><span onclick="sign3(<?= $row["codc"] ?>)">
							<svg style="cursor:pointer;" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff">
							<path d="M0 0h24v24H0V0z" fill="none"/><path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18zM20 4v13.17L18.83 16H4V4h16zM6 12h12v2H6zm0-3h12v2H6zm0-3h12v2H6z"/></svg>
						</span></a>
						<div style="display:none;" id="commento-<?= $row["codc"] ?>">
							<form action="commenti.php" method="post">
								<input type="text" value="<?= $row["codc"] ?>" style="display:none;" name="codc">
								<input class="input1" type="text" name="commento">
								<input class="button1" type="submit" name="posta" value="Posta"><br><br>
							</form>
						</div>
						<script> var y=true;</script><br>
						<div id="bottone1-<?php echo $row["codc"]; ?>"><button onclick="sign4(<?php echo $row["codc"]; ?>)" type="button" class="button1" style="width:170px;">Carica commenti</button><br><br></div>
						<button id="bottone2-<?php echo $row["codc"]; ?>" onclick="sign4(<?php echo $row["codc"]; ?>)" type="button" class="button1" style="display:none;width:180px;margin-bottom:10px;">Nascondi commenti</button>
						<div>
							<?php
								$sql="select * from commenti where codc=".$row['codc'].";";
								$result2=mysqli_query($conn, $sql);
								if(!$result2){
									die("<p style='color: red;text-align:center;'>Errore<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
								}
							?>
							<div style="display:none;" id="stampa-c-<?php echo $row["codc"]; ?>">
								<?php
									while($row1=mysqli_fetch_assoc($result2)){
								?>
									<p style="color:white;margin:0;"><?php echo "".$row1['nome_u'].": ".$row1['commento']."" ?></p><br>
								<?php
									}
								?>
							</div>
						</div>
					</div>
			</div>
			<br>
			<?php
				}
			?>
		</div>
		<div class="menu-s">
			<a onclick="sign()"><div class="canzoni"><h5 class="bordo" style="cursor:pointer;margin-top:6px;margin-bottom:4px;">Le tue canzoni</h5></div></a>
			<a onclick="sign1()"><div class="dati"><h5 class="bordo" style="cursor:pointer;margin-top:6px;margin-bottom:3px;" class="bordo">I tuoi dati</h5></div></a>
			<a onclick="sign2()"><div class="contatti"><h5 class="bordo" style="cursor:pointer;margin-top:6px;margin-bottom:3px;" class="bordo">Contatti</h5></div></a>
			<a><div class="elimina" onclick="elimina()"><h5 style="cursor:pointer;margin-top:0px;">Elimina account</h5></div></a>
		</div>
		<div style="display:none;" id="dati" class="menu-c">
			<?php 
				$sql="select nome_u,nome,cognome,dataN from utente where nome_u='".$_SESSION['nomeu']."';";
				$result=mysqli_query($conn,$sql);
				if(!$result){
					die("<p style='color: red;text-align:center;'>Errore<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
				}
				$row=mysqli_fetch_assoc($result);
			?>
			<h4 style="text-align:center;color:white;">I tuoi dati</h4>
			<table style="color:white;">
				<tr>
					<th>Nome</th>
					<th>Cognome</th>
					<th>Data di nascita</th>
					<th>Nome utente</th>
				</tr>
				<tr>
					<td><?php echo $row['nome'] ?></td>
					<td><?php echo $row['cognome'] ?></td>
					<td><?php echo $row['dataN'] ?></td>
					<td><?php echo $row['nome_u'] ?></td>
				<tr>
			</table>
		</div>
		<div style="display:none;" id="contatti" class="menu-c">
			<div style="color:white;text-align:center;">
				<p>
					Non sono presenti contatti al momento
				</p>
			</div>
		</div>
		<div class="menu-d">
			<a href="home.php" >
			<svg class="icona" style="cursor:pointer;margin-top:2.5px;" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
			<path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/></svg>
			<h5 class="bordo">Home</h5></a>
			
			<a id="menu-caricamento">
			<svg class="icona" style="margin-top:3px;right:133px;cursor:pointer;" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#14223a">
			<path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
			<h5 class="bordo" style="cursor:pointer;">Carica</h5></a>
			
			<a href="logout.php" >
			<svg href="logout.php" class="icona" style="margin-top:7px;cursor:pointer;" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="20px" viewBox="0 0 24 24" 
			width="20px" fill="#000000"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><path 
			d="M17,8l-1.41,1.41L17.17,11H9v2h8.17l-1.58,1.58L17,16l4-4L17,8z M5,5h7V3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h7v-2H5V5z"/>
			</g></svg><h5>Logout</h5></a>	
		</div>
<?php
include_once 'footer.php';
?>