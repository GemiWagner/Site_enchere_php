<?php session_start() ?>
<?php $bg=rand(1,6);?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
    	<meta name="Home" content="projet,html,php">
		<link rel="stylesheet" type"text/css" href="style.css">
		<title>Accueil</title>
		<style type="text/css">
			<!--
			body{
				background: url(images/<?php echo $bg.".jpg"; ?>);
				background-position: center;
			    background-attachment: fixed;
			    background-repeat: no-repeat;
			    background-size: cover;
			}
			-->
		</style>
	</head>
	<body>
	<div id="menu" class="fixed">
	    <div class="structure black">
	        <img src="images/logo.png" class="logo"></a> <nav> <a href='./home.php' class=active>ACCUEIL</a>
	            <?php 
	            if(isset($_SESSION['login'])){
	            	echo "<a href='./deconnection.php'>SE DECONNECTER</a>";
	            	echo "<a href='./Vendre.php'>SOUMETTRE UNE VENTE</a>";
	            }
	            else
	                echo "<a href='./Login.php'>SE CONNECTER</a><a href='./Inscription.php'> S'INSCRIRE </a>"
	            ?>
            </nav>
            <?php  if(isset($_SESSION['login'])) echo "<p><font size=\"4\">Bienvenue <b>".$_SESSION['nom']."</b> aka <b>".$_SESSION['login']."</b>.</font></p>"; ?>
	    </div>
	</div>
	<div class="structure">
    	<div id="body">
    		<section>
    			<article>
                    <h1>Bienvenue sur le Hobbit Store<br>Voici la liste des enchères<br>Fait vite ! Le temps, c'est de l'argent !</h1>
                </article>
				<?php
					include("Connexion.php");
					$link=connect();
					mysqli_set_charset($link,'utf8');
					$queryItems="SELECT * FROM objets";
					$resultsItems=mysqli_query($link,$queryItems);

					$today=date('Y-m-d')." 00:00:00.0";

					if(mysqli_num_rows($resultsItems)>0){
						echo '<br>';
						echo '<table cellpadding="5" class="tableListe">';
						echo '<tr class=\'titre\'>';
							echo '<td>Numéro Objet</td>';
							echo '<td>Nom</td>';
							echo '<td>Photo</td>';
							echo '<td>Enchère actuelle</td>';
							echo '<td>Date début</td>';
							echo '<td>Date fin</td>';
							if(isset($_SESSION['num']))
								echo '<td>Enchérir</td>';
						echo '</tr>';
						echo '</table>';
						$j=1;
						while($row=mysqli_fetch_array($resultsItems,MYSQLI_NUM)){
							$dateDebut=$row[4]." 00:00:00.0";
							if(strtotime($dateDebut) <= strtotime($today)){
								if($j % 2 == 1){
									echo '<table cellpadding="5" class="tableListe">';
									echo "<tr class='impair'>";
								}
								else{
									echo '<table cellpadding="5" class="tableListe">';
									echo "<tr class='pair'>";
								}
								for($i = 0; $i < count($row); $i++){
									if($i==0)
										echo '<td> '.$j.' </td>';
									elseif($i==2)
										echo '<td> <img class="imageListe" src="'.$row[$i].'" alt="'.$row[$i].'" /> </td>';
									elseif($i==3){
										$queryGetEnchere="SELECT * FROM enchere WHERE id_obj=".$row[0];
										$resultsGetEnchere=mysqli_query($link,$queryGetEnchere);
										$rowGetEnchere=mysqli_fetch_array($resultsGetEnchere,MYSQLI_NUM);
										if($rowGetEnchere[2] >= $row[$i])
											echo '<td> '.$rowGetEnchere[2].' € </td>';
										else
											echo '<td> '.$row[$i].' € </td>';
									}
									else
										echo '<td> '.$row[$i].' </td>';
								}
								if(isset($_SESSION['num'])){
									$queryUser="SELECT * FROM vente WHERE id_vendeur=".$_SESSION['num']." AND id_obj=".$row[0];
									$resultsUser=mysqli_query($link,$queryUser);
									if($resultsUser->num_rows > 0)
										echo "<td><input type='button' name='idEnchere' value='Enchérir' disabled='disabled'></td>";
									else
										echo "<td><input type='button' name='idEnchere' value='Enchérir' onclick='self.location.href=\"Enchere.php?id=".$row[0]."\"'></td>";
								}
								echo '</tr>';
								echo '</table>';
								$j++;
							}
						}
						if(isset($_SESSION['login']) && $_SESSION['login']=="admin")
							echo "<br><br><input type='button' id='button' name='traiteListe' value='Traitement' onclick='self.location.href=\"traiteListe.php\"'>";

					}
					else{
						echo 'Aucun objet en vente.';

					}


				?>
			</section>
	    </div>
	</div>
	<footer class="site-footer">
	    <div id="footer_white_background">
	        <div class="color_top_footer">
	            <div style="background-color:rgba(244, 67, 67, 1);"></div>
	            <div style="background-color:rgba(170, 47, 47, 1);"></div>
	            <div style="background-color:rgba(2, 165, 193, 1);"></div>
	            <div style="background-color:rgba(1, 115, 135, 1);"></div>
	            <div style="background-color:rgba(96, 179, 92, 1)"></div>
	            <div style="background-color:rgba(67, 125, 64, 1);"></div>
	            <div style="background-color:rgba(130, 118, 185, 1);"></div>
	            <div style="background-color:rgba(91, 82, 129, 1);"></div>
	        </div>
	        <div class="structure">
	        </div>
	    </div>
	    <div id="bottom_footer">
	        <div class="structure">
	            <div id="bottom_footer_white">
	                <p id="fl_left"> 2015-2016 - Tous droits reservés</p>

	                <p id="fl_right">Contact: mail</p>
	            </div>
	        </div>
	    </div>
	</footer>
	</body>
</html>
