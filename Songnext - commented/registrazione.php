<?php
    /**
     * @file
     * File for registering a user to the website.
     */

    session_start();

    /**
     * If the user is already logged in, redirect to home page
     */
    if(isset($_SESSION['nomeu'])){
        header ('location:home.php');
    }

    /**
     * Page title
     */
    $title = "Registrati";

    /**
     * Include header
     */
    include_once "header.php";

    
    /**
     * ICheck if the form was submitted
     */
    if(isset($_POST['invio'])){

        /** 
         * Get form data
         */
        $nome=$_POST['nome'];
        $cognome=$_POST['cognome'];
        $dataN=$_POST['dataN'];
        $nomeu=$_POST['nomeu'];
        $psw=md5($_POST['password']);

        /**
         * Check if the username already exists in the database
         */
        $sql="select nome_u from utente where nome_u='$nomeu';";
        $result=mysqli_query($conn,$sql);

        /**
         * If the result is not false
         */
        if($result){

            /**
             * If the username already exists
             */
            if(mysqli_num_rows($result)>0){
                echo "<p style='color: red;text-align:center;'>Nome utente già esistente</p>";
            }
            else{
                /**
                 * Insert the new user into the database
                 */
                $sql="insert into utente values ('$nomeu','$nome','$cognome','$dataN','$psw');";
                $result=mysqli_query($conn,$sql);

                /**
                 * If the query failed
                 */
                if(!$result){
                    die("<p style='color: red;text-align:center;'>Errore in fase di inserimento utente <br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
                }
                else{
                    /**
                     * Redirect to the login page
                     */
                    header("location:accesso.php");
                }
            }
        }
    }

    /**
     * Get the date 16 years ago
     */
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
					<input class="registrazione input1" type="text" 
                    <?php 
                    /**
                     * @brief This checks if the "invio" key is set in the $_GET array.
                     * If it is set, the value of $nome is printed within the value attribute of an HTML element.
                     */
                     if(isset($_GET['invio'])){ echo "value='$nome'"; } ?> 
                     name="nome" required><br><br>
					<label class="label1" >Cognome:</label>
					<input class="registrazione input1" type="text" 
                    <?php 
                    /**
                     * @brief This checks if the "invio" key is set in the $_GET array.
                     * If it is set, the value of $nome is printed within the value attribute of an HTML element.
                     */
                    if(isset($_GET['invio'])){ echo "value='$cognome'"; } ?>
                    name="cognome" required><br><br>
					<label class="label1" >Data di Nascita:</label>
					<input class="registrazione input1" type="date" 
                    <?php 
                    /**
                     * @brief This checks if the "invio" key is set in the $_GET array.
                     * If it is set, the value of $nome is printed within the value attribute of an HTML element.
                     */
                    if(isset($_GET['invio'])){ echo "value='$dataN'"; } echo "max='$data'"; ?>
                    name="dataN" required><br><br>
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