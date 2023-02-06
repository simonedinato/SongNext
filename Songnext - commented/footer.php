		<div id="pagina-c" class="caricamento">
			<div class="contenuto-c">
				<span class="close">&times;</span>
				<form class="form1" method="post" action="caricamento.php" enctype="multipart/form-data">
					<label>Seleziona la canzone</label><br><br>
					<input type="file" accept="audio/*" name="file" ><br><br>
					<label>Nome:</label>
					<input class="nome" type="text" name="nome_f"><br><br>
					<label>Descrizione</label><br>
					<textarea class="descrizione" rows="6" cols="150" name="descrizione"></textarea><br><br>
					<input class="button submit" type="submit" name="pubblica" value="Pubblica">
				</form>
			</div>
		</div>
		<script>
			/**
             * Function to send a like to a specific post
             * @param {number} i - id of the post to send the like
             * 
             * Makes an AJAX call to "funzioni.php" with the following parameters:
             * id: id of the post to send the like
             * nome: name of the user sending the like, taken from the PHP session
             * func: the function to call on "funzioni.php", in this case "sendlike"
             * 
             * On successful completion, updates the fill color of the like icon and the like count for the specified post
             */
            function sendlike(i) {
                $.post("funzioni.php", {
                    id: i,
                    nome: <?php echo "'".$_SESSION['nomeu']."'"; ?>,
                    func: 'sendlike'
                }, function (data) {
                    if (data == 1) {
                        $('#like-' + i).attr("fill", "#e56b6b");
                        $('#nlike-' + i).text(parseInt($('#nlike-' + i).text()) + 1);
                    } else if (data == 2) {
                        $('#like-' + i).attr("fill", "#a8b773");
                        $('#nlike-' + i).text(parseInt($('#nlike-' + i).text()) - 1);
                    }
                });
            }
            
			// Get the modal
			var modal = document.getElementById("pagina-c");

			// Get the button that opens the modal
			var btn = document.getElementById("menu-caricamento");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks on the button, open the modal
			btn.onclick = function() {
				modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
				modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}
            /**
             * sign function is used to display the "canzoni" element and hide the "dati" and "contatti" elements.
             * sign1 function is used to display the "dati" element and hide the "canzoni" and "contatti" elements.
             * sign2 function is used to display the "contatti" element and hide the "canzoni" and "dati" elements.
             * sign3 function is used to toggle the display of an element with the id "commento-i".
             * sign4 function is used to toggle the display of an element with the id "stampa-c-i", "bottone2-i", 
             * and hide/show the element with the id "bottone1-i".
             */
			function sign(){
				document.getElementById("canzoni").style.display="block";
				document.getElementById("dati").style.display="none";
				document.getElementById("contatti").style.display="none";
			}
			function sign1(){
				document.getElementById("canzoni").style.display="none";
				document.getElementById("dati").style.display="block";
				document.getElementById("contatti").style.display="none";
			}
			function sign2(){
				document.getElementById("contatti").style.display="block";
				document.getElementById("canzoni").style.display="none";
				document.getElementById("dati").style.display="none";
			}
			function sign3(i){
				if(x==true){
					document.getElementById("commento-"+i).style.display="block";
					x=false;
				}
				else{
					document.getElementById("commento-"+i).style.display="none";
					x=true;
				}
			}
			function sign4(i){
				if(y==true){
					document.getElementById("stampa-c-"+i).style.display="block";
					document.getElementById("bottone2-"+i).style.display="block";
					document.getElementById("bottone1-"+i).style.display="none";
					y=false;
				}
				else{
					document.getElementById("stampa-c-"+i).style.display="none";
					document.getElementById("bottone2-"+i).style.display="none";
					document.getElementById("bottone1-"+i).style.display="block";
					y=true;
				}
			}
			
		</script>
	</body>
</html>