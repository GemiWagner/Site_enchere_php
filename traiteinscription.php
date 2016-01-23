<?php session_start();?>
<!DOCTYPE html>
<html>	
	<head>
		<meta charset="UTF-8">
    	<meta name="Home" content="projet,html,php">
		<link rel="stylesheet" type"text/css" href="style.css">
	</head>
	<body>
	<?php 
		include("Connexion.php");
		$link=connect();
		mysqli_set_charset($link,'utf8');
		if(empty($_POST['nom'])||empty($_POST['mdp'])||empty($_POST['login'])||empty($_POST['adresse'])||empty($_POST['tel'])){
			header("Location: .\Inscription.php");
			exit();
		}
		$_SESSION['nom']=$_POST['nom'];
		$_SESSION['adresse']=$_POST['adresse'];
		$_SESSION['tel']=$_POST['tel'];
		$_SESSION['login']=$_POST['login'];

		if($_POST['mdp'] !== $_POST['mdp2']){
			header("Location: .\InscriptionMDP.php");
			exit();
		}

		else{
			$queryInscr = "INSERT INTO p1403797.users 
				VALUES(NULL, '".$_POST['nom']."', '".$_POST['mdp']."', '".$_POST['login']."', '".$_POST['adresse']."', '".$_POST['tel']."')";
			$results=mysqli_query($link,$queryInscr);

			header('Location:Login.php');
		}

?>
</body>
</html>