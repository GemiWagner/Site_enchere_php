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
		print_r($_POST);
		$_SESSION['prix']=$_POST['prix'];
		$_SESSION['prixInit']=$_POST['prixInit'];

		

		if(empty($_POST['prix']) || $_POST['prixInit'] >= $_POST['prix']){
			header("Location: .\Enchere.php");
			exit();
		}

		else{
			$delObjRequest="DELETE FROM enchere WHERE id_obj = ".$_SESSION['idEnchere'];
			$resultDel=mysqli_query($link,$delObjRequest);

			$queryAjout = "INSERT INTO enchere
			 VALUES('".$_SESSION['num']."', '".$_POST['idObj']."', '".$_POST['prix']."')";
			$results=mysqli_query($link,$queryAjout);

			header('Location: .\Home.php');
			exit();
		}

?>
</body>
</html>