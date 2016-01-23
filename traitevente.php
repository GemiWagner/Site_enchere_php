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
		if(empty($_POST['nom'])||empty($_POST['photo'])||empty($_POST['prixminimum'])||empty($_POST['datededebut'])||empty($_POST['datedefin'])){
			header("Location: .\Vendre.php");
			exit();
		}

		else{
			$queryAjout = "INSERT INTO objets (nom,photo,prix_mini,date_debut,date_fin)
			 VALUES('".$_POST['nom']."', '".$_POST['photo']."', '".$_POST['prixminimum']."', '".$_POST['datededebut']."', '".$_POST['datedefin']."')";
			$results=mysqli_query($link,$queryAjout);
			$getIdObj="SELECT * FROM objets WHERE nom='".$_POST['nom']."'";
			$resultGetIdObj=mysqli_query($link,$getIdObj);
			$rowGetIdObj=mysqli_fetch_array($resultGetIdObj,MYSQLI_NUM);

			$queryLinkVendeurObjet = "INSERT INTO vente VALUES('".$_SESSION['num']."','".$rowGetIdObj[0]."')";
			$ajoutLinkVendeurObjet=mysqli_query($link,$queryLinkVendeurObjet);

			header('Location:Home.php');
			exit();
		}

?>
</body>
</html>