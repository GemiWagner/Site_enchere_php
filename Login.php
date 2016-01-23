<!DOCTYPE html>
<?php $bg=rand(1,6); ?>
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
		        <img src="images/logo.png" class="logo"></a>
		        <nav>
		        	<a href='./Home.php'>ACCUEIL</a><a href='./Login.html' class=active>SE CONNECTER</a><a href='./Inscription.php'> S'INSCRIRE </a>        </nav>

		    </div>
		</div>
		<div class="structure">
		    <div id="body">
		        <section>
		            <article>
                		<h1>Connexion</h1>
            		</article>
                	<article>
						<form name="formulaire" action="traitelogin.php" method="POST">
							<table class="tableform">
								<tr>
									<td><th>Login : </th></td>	
									<td><input title="Nom" id="nom" name="login" type="text"/></td>
								</tr>
								<tr>
									<td><th>Mot de Passe : </th></td>
									<td><input title="MotdePasse" id="mdp" name="mdp" type="password"/></td>
								</tr>
							</table>
							<br><br>
						<input type="submit" value="Envoyer" id="button"/></form>
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
	        <div class="structure white">
	        </div>
	    </div>
	    <div id="bottom_footer">
	        <div class="structure white">
	            <div id="bottom_footer_white">
	                <p id="fl_left"> 2015-2016 - Tous droits reservés</p>

	                <p id="fl_right">Contact: mail</p>
	            </div>
	        </div>
	    </div>
	</footer>
	</body>
</html>