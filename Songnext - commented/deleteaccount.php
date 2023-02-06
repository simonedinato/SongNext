<?php
	/**
	 * Start the session
	 */
	session_start();

	/**
	 * Requests database connection file
	 */
	require_once "connessione.php";

	/**
	 * Delete all records from the "slike" table that belong to the current user
	 */
	$sql = "delete from slike where nome_u='".$_SESSION['nomeu']."';";
	$result = mysqli_query($conn, $sql);

	/**
	 * Verify that the query was executed successfully
	 */
	if (!$result) {
		die( "<p style='color: red;text-align:center;'>Errore<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
	}

	/**
	 * Delete all records from the "comments" table that belong to the current user
	 */
	$sql2 = "delete from commenti where nome_u='".$_SESSION['nomeu']."';";
	$result2 = mysqli_query($conn, $sql2);

	/**
	 * Verify that the query was executed successfully
	 */
	if (!$result2) {
		die( "<p style='color: red;text-align:center;'>Errore<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
	}

	/**
	 * Delete all records from the "song" table that belong to the current user
	 */
	$sql3 = "delete from canzone where nome_u='".$_SESSION['nomeu']."';";
	$result3 = mysqli_query($conn, $sql3);

	/**
	 * Verify that the query was executed successfully
	 */
	if (!$result3) {
		die( "<p style='color: red;text-align:center;'>Errore<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
	}

	/**
	 * Delete all records from the "user" table that belong to the current user
	 */
	$sql4 = "delete from utente where nome_u='".$_SESSION['nomeu']."';";
	$result4 = mysqli_query($conn, $sql4);

	/**
	 * Verify that the query was executed successfully
	 */
	if (!$result4) {
		die( "<p style='color: red;text-align:center;'>Errore<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
	}
    /**
    * Destroys the current session
    */
	session_destroy();
    /**
    * Redirect the user to the login page
    */
	header("Location:index.php");
?>