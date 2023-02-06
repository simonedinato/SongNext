<?php
    /**
     * Start the session if the user is not already logged in.
     */

    session_start();

    /**
     * If the user is not logged in, redirect them to the login page.
     */
    if (!isset($_SESSION['nomeu'])) {
      header('location:index.php');
    }

    /**
     * Include the header file.
     */
    include_once 'header.php';
?>
		<div id="barra-2">
			<h2>Home</h2>
		</div><br>
		<div class="menu-c">
				<?php
                /**
                 * @brief Retrieves the songs from the database and displays them
                 *
                 * This script retrieves the songs from the database in descending order of their publication date
                 * and displays them in the page. For each song, it checks whether the user has liked the song
                 * and sets the fill color for the like button accordingly.
                 */
                    $sql = "SELECT * FROM canzone ORDER BY datap DESC;";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        die("<p style='color: red;text-align:center;'>Error<br>" . mysqli_error($conn) . " " . mysqli_errno($conn) . "</p>");
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sql = "SELECT * FROM slike WHERE codc=" . $row["codc"] . ";";
                        $sql1 = "SELECT * FROM slike WHERE codc=" . $row["codc"] . " AND nome_u='" . $_SESSION['nomeu'] . "';";
                        $result1 = mysqli_query($conn, $sql);
                        $result2 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result2) > 0) {
                            $fill = "#e56b6b";
                        } else {
                            $fill = "#a8b773";
                        }
                ?>
				<div id="element">
					<h3 style="color:white;text-align:center;"><?php echo $row["nome_f"]; ?></h3>
					<h4 style="color:white;text-align:left;"><?php echo $row["nome_u"]; ?></h4>
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
						<!-- Code block to retrieve and display comments related to a particular song -->
                        <div>
                            <?php
                                /**
                                 * SQL query to retrieve comments for a specific song
                                 */
                                $sql="select * from commenti where codc=".$row['codc'].";";

                                /**
                                 * Execute the query and store the result
                                 */
                                $result2=mysqli_query($conn, $sql);

                                /**
                                 * Check if the query execution was successful
                                 */
                                if(!$result2){
                                    /**
                                     * If query execution was unsuccessful, display error message
                                     */
                                    die("<p style='color: red;text-align:center;'>Errore<br>". mysqli_error($conn)." ". mysqli_errno($conn)."</p>");
                                }
                            ?>
                            <!-- Div block to display comments, the display is set to none -->
                            <div style="display:none;" id="stampa-c-<?php echo $row["codc"]; ?>">
                                <?php
                                    /**
                                     * Loop through the result set to retrieve comments for the song
                                     */
                                    while($row1=mysqli_fetch_assoc($result2)){
                                ?>
                                    <!-- Display each comment in a separate paragraph -->
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
		<div class="menu-d">
			<h4 class="bordo" style="color:#14223a;" ><?= $_SESSION['nomeu']; ?></h4>
			
			<a href="profilo.php" >
			<svg xmlns="http://www.w3.org/2000/svg" style="cursor:pointer;" class="icona" height="20px" viewBox="0 0 24 24" 
			width="20px" fill="#14223a"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2m0 10c2.7 0 5.8 1.29 6 2H6c.23-.72 3.31-2 6-2m0-12C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 10c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
			<h5 class="bordo">Profilo</h5></a>
			
			<a id="menu-caricamento">
			<svg class="icona" style="margin-top:3px;right:133px;cursor:pointer;" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#14223a">
			<path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
			<h5 class="bordo" style="cursor:pointer;">Carica</h5></a>
			
			<a href="logout.php" >
			<svg href="logout.php" class="icona" style="margin-top:7px;cursor:pointer;" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="20px" viewBox="0 0 24 24" 
			width="20px" fill="#14223a"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><path 
			d="M17,8l-1.41,1.41L17.17,11H9v2h8.17l-1.58,1.58L17,16l4-4L17,8z M5,5h7V3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h7v-2H5V5z"/>
			</g></svg><h5>Logout</h5></a>	
		</div>
		
<?php
include_once 'footer.php';
?>