<?php

    /**
     * Start a new session or resume an existing session
     */
    session_start();

    /**
     * If the session variable 'uname' is set, the user is already logged in 
     * and is redirected to the 'home.php' page
     */
    if(isset($_SESSION['nomeu'])){
        header ('location:home.php');
    }

    /**
     * Set the page title as "Sign in"
     */
    $title = "Accedi";

    /**
     * Includes "header.php" file
     */
    include_once "header.php";

    /**
     * If a form has been submitted via the "Submit" button
     */
    if(isset($_POST['invio'])){

        /**
         * Assign the values entered in the "Username" and "Password" fields 
         * to the variables $uname and $psw
         */
        $nomeu=$_POST['nomeu'];
        $psw=md5($_POST['psw']);

        /**
         * Query the database to verify that the entered data corresponds to a registered user
         * corresponds to a registered user
         */
        $sql="select psw from utente where nome_u='$nomeu' and psw='$psw'";
        $result=mysqli_query($conn,$sql);

        /**
         * If the query is invalid, print an error message
         */
        if(!$result){
            die("<p style='color: red;text-align:center;'>Errore col database<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
        }

        /**
         * If there are no matching results, print an error message
         */
        if(mysqli_num_rows($result)==0){
            die("<p style='color: red;text-align:center;'>Nome utente o password errati<br></p>");
        }

        /**
         * Set the session variable 'uname' to the value of the username
         */
        $_SESSION["nomeu"]=$nomeu;

        /**
         * Redirect to 'home.php' page
         */
        header("location:home.php");
    } 
?>
    <!-- This code displays a login form to the user -->
    <div id="barra-2">
      <!-- This is the title of the login form -->
      <h2>Accedi</h2>
    </div><br>
    <!-- This is the main container of the login form -->
    <div id="box">
      <!-- This is the login form -->
      <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
        <!-- This is the fieldset that delimits the fields of the form -->
        <fieldset>
          <!-- This is the label for the username -->
          <label class="label1" >Nome utente:</label>
          <!-- This is the field to enter your username -->
          <input class="input1" type="text" name="nomeu" required><br><br>
          <!-- This is the password label -->
          <label class="label1" >Password:</label>
          <!-- This is the field to enter your password -->
          <input class="input1" type="password" name="psw" required><br><br>
          <!-- This is the container for the submit button -->
          <div class="reg">
            <!-- This is the submit button -->
            <input class="button inv" type="submit" name="invio" value="Invio">
          </div>
        </fieldset>
      </form>
    </div>
<?php
	/**
    * This includes the 'footer.php' file at the end of the document
    */
   	include_once 'footer.php';  
?>

