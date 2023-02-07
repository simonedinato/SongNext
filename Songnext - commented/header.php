<!DOCTYPE html>
<html>
    <head>
	<script>
            if (location.protocol != 'https:') {
              location.href = 'https:' + window.location.href.substring(window.location.protocol.length);
            }
        </script>
        <meta charset="UTF-8">
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
		<meta name="description" content="Dimostra le tue abilità in ambito musicale, carica hit e brani personali 
				da te ideati, condividi con gli altri iscritti della piattaforma tracce audio degli artisti più noti 
				sul piano mondiale, fai sapere la tua opinione sulle altre canzoni e lasciati trasportare dalla bellezza
				della musica.">
		<meta name="author" content="Simone Dinato">
        <title>SongNext</title>
    </head>
    <body>
		<?php
			include_once "connessione.php";
		?>
		<div id="barra-1">
			<h1><a href="index.php">SongNext</a></h1>
		</div>
