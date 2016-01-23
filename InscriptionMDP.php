<?php session_start() ?>
<?php $bg=rand(1,6);?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="projet,html,php">
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
    <title>S'inscrire</title>
</head>
<body>
<div id="menu" class="fixed">
    <div class="structure black">
        <img src="images/logo.png" class="logo"></a>
        <nav>

            <a href='./Home.php'>ACCUEIL</a><a href='./Login.php'>SE CONNECTER</a><a href='./Inscription.php' class=active> S'INSCRIRE </a>        </nav>

    </div>
</div>
<div class="structure">
    <div id="body">
        <section>
            <article id="a">
                <h1>S'inscrire</h1>
            </article>
            <article id="b">
                <form name="formulaire'" action="traiteinscription.php" method="POST">
                    <table>
                    <tr>
                        <td><th>Nom : </th></td>    
                        <td><input title="nom" id="nom" name="nom" type="text" value=<?php echo "'".$_SESSION['nom']."'"; ?> /></td>
                    </tr>
                    <tr>
                        <td><th>Login : </th></td>
                        <td><input title="login" id="login" name="login" type="text" value=<?php echo "'".$_SESSION['login']."'"; ?> /></td>
                    </tr>
                    <tr>
                    <td><th>Adresse mail: </th></td>
                        <td><input title="adresse" id="adresse" name="adresse" type="text" value=<?php echo "'".$_SESSION['adresse']."'"; ?> /></td>
                    </tr>
                    <tr>
                    <td><th>Tel : </th></td>
                        <td><input title="tel" id="tel" name="tel" type="text" value=<?php echo "'".$_SESSION['tel']."'"; ?> /></td>
                    </tr>
                    <tr>
                    <td><th>Mot de Passe : </th></td>
                        <td><input title="mdp" id="mdp" name="mdp" type="password"/></td>
                    </tr>
                    <tr>
                    <td><th>Répéter mot de Passe : </th></td>
                        <td><input title="mdp2" id="mdp2" name="mdp2" type="password"/></td>
                    </tr>
                    <tr>
                    <td><th></th></td>
                        <td><font color="red">Mauvais mot de passe</font></td>
                    </tr>
                </table>
                
                <br>
                    <button type="reset" id="button">REINITIALISER</button>
                    <button type="submit" id="button">ENVOYER!</button>
            </form>

                    

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
</footer><body>
<html>