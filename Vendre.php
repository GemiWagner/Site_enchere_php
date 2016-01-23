html
<?php session_start() ?>
<?php $bg=rand(1,6);?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="projet,html,php">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datededebut" ).datepicker({ dateFormat: "yy-mm-dd"});
            $( "#datedefin" ).datepicker({ dateFormat: "yy-mm-dd"});
        });
    </script>
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
    <title>Vendre un objet</title>
</head>
<body>
    <div id="menu" class="fixed">
        <div class="structure black">
            <img src="images/logo.png" class="logo"></a>
            <nav>
            	<a href='./home.php'>ACCUEIL</a>
                <?php 
                if(isset($_SESSION['login'])){
                	echo "<a href='./deconnection.php'>SE DECONNECTER</a>";
                	echo "<a href='./Vendre.php' class=active>SOUMETTRE UNE VENTE</a>";
                }
                else
                    echo "<a href='./Login.html'>SE CONNECTER</a><a href='./Inscription.php'> S'INSCRIRE </a>"
                ?>
            </nav>
            <?php  if(isset($_SESSION['login'])) echo "<p>Bienvenue <b>".$_SESSION['nom']."</b> aka <b>".$_SESSION['login']."</b>.</p>"; ?>
        </div>
    </div>
    <div class="structure">
        <div id="body">
            <section>
                <article>
                    <h1>Soumettre la vente d'un objet</h1>
                </article>
                <article>
                	<form name="formulaire" action="traitevente.php" method="POST">
    				<table class="tableform">
    					<tr>
    						<td><th>Nom : </th></td>	
    						<td><input title="Nom" id="nom" name="nom" type="text"/></td>
    					</tr>
    					<tr>
    						<td><th>Photo : </th></td>
    						<td><input title="Photo" id="photo" name="photo" type="search" placeholder="Entrez l'url de votre image"/></td>
    						
    					</tr>
    					
    					<td><th>Prix Minimum: </th></td>
    						<td><input title="PrixMinimum" id="prixminimum" name="prixminimum" type="text"/></td>
    					</tr>
    						<td><th>Date de début: </th></td>
    						<td><input title="Datededebut" id="datededebut" name="datededebut" type="text" placeholder="YYYY-MM-DD"/></td>
    					</tr>
    					</tr>
    						<td><th>Date de fin: </th></td>
    						<td><input title="Datedefin" id="datedefin" name="datedefin" type="text" placeholder="YYYY-MM-DD"/></td>
    					</tr>
    					
    				</table>	
                    <br><br>
    				<button type="reset" id="button">REINITIALISER</button>
                    <button type="submit" id="button">ENVOYER!</button>

    				</form>		
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
                    <p id="fl_left"> 2015-2016 - Tous droits reserves</p>

                    <p id="fl_right">Contact: julienl2pl@gmail.com</p>
                </div>
            </div>
        </div>
    </footer>
<body>
<html>
