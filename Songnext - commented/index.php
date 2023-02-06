<?php
/**
 * @brief Include the header for the current page
 */

$title = "Benvenuto";

/**
 * @details This function will include the header file for the current page, providing the title
 */
include_once "header.php";
?>

		<div id="box">
			<img id="img-1" src="img/track.png">
			<h3>Il progetto SongNext</h3>
			<p>
				SongNext è una piattaforma online che permette a tutti gli utenti interessati di creare un proprio profilo,
				necessario per utilizzare tutte le funzioni disponibili.
				Dimostra le tue abilità in ambito musicale, carica hit e brani personali da te ideati, condividi con gli altri 
				iscritti della piattaforma tracce audio degli artisti più noti sul piano mondiale, fai sapere la tua opinione sulle altre canzoni
				e lasciati trasportare dalla bellezza della musica.
			</p>
		</div>
		<div class="menu">
			<input class="button" type="button" name="accedi" onclick="location.href='accesso.php';" value="Accedi">
		</div>
		<div class="menu" style="top:130px;">
			<input class="button" type="button" name="registrati" onclick="location.href='registrazione.php';" value="Registrati">
		</div>
<?php
include_once "footer.php";
?>
