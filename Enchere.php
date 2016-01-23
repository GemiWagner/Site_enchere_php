<?php session_start() ?>
<?php $bg=rand(1,6);?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
    	<meta name="Home" content="projet,html,php">
		<link rel="stylesheet" type"text/css" href="style.css">
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
		<title>Se Connecter</title>
	</head>
	<body>
		<div id="menu" class="fixed">
		    <div class="structure black">
		        <img src="images/logo.png" class="logo"></a> <nav> <a href='./home.php'>ACCUEIL</a>
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
                		<h1>Enchérir</h1>
            		</article>
                	<article>
                		<?php
                			if(isset($_GET['id']))
                				$_SESSION['idEnchere']=$_GET['id'];
							include("Connexion.php");
							$link=connect();
							mysqli_set_charset($link,'utf8');

							if(isset($_SESSION['idEnchere']))
								$queryItems="SELECT * FROM objets WHERE id_o=".$_SESSION['idEnchere'];
							else
								$queryItems="SELECT * FROM objets WHERE id_o=".$_GET['id'];
							$resultsItems=mysqli_query($link,$queryItems);
							$row=mysqli_fetch_array($resultsItems,MYSQLI_NUM);

							if(isset($_SESSION['idEnchere']))
								$queryGetEnchere="SELECT * FROM enchere WHERE id_obj=".$_SESSION['idEnchere'];
							else
								$queryGetEnchere="SELECT * FROM enchere WHERE id_obj=".$_GET['id'];
							$resultsGetEnchere=mysqli_query($link,$queryGetEnchere);
							$rowGetEnchere=mysqli_fetch_array($resultsGetEnchere,MYSQLI_NUM);
							?>

						<form name="formulaire" action="traiteenchere.php" method="POST">
							<table class="tableform">
								<tr>
									<td><th>Nom de l'objet : </th></td>	
									<td><?php echo $row[1] ?></td>
								</tr>
							</table>
							<?php
								echo '<td> <img class="imageEnch" src="'.$row[2].'" alt="'.$row[2].'" /> </td>';
							?>
							<table class="tableform">
								<tr>
									<td><th>Prix : </th></td>
									<?php
										if($rowGetEnchere[2] >= $row[3])
											echo '<td> '.$rowGetEnchere[2].' € </td>';
										else
											echo '<td> '.$row[3].' € </td>';
									?>
								</tr>
								<tr>
									<td><th>Prix de l'enchère : </th></td>
									<td><input title="PrixEnchere" id="prix" name="prix" type="text"/></td>
								</tr>
								<?php 
								if(isset($_SESSION['idEnchere']))
									echo "<input type='hidden' name='idObj' value='".$_SESSION['idEnchere']."'/>";
								else
									echo "<input type='hidden' name='idObj' value='".$_GET['id']."'/>";

									echo "<input type='hidden' name='prixInit' value='".$row[3]."'/>"; 
								?>
							</table>
							<br><br>
						<input type="submit" value="Enchérir" id="button"/></form>
					</article>                
		        </section>
		    </div>
		</div>
		<footer>
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