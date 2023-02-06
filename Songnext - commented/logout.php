<?php
    /**
     * @file
     * End the current user session and redirect the user to the login page
     *
     * @see session_start()
     * @see session_destroy()
     * @see header()
     */
	session_start();
	session_destroy ();
	header ('location:index.php');
?>