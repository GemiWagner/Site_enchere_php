<?php session_start() ?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type"text/css" href="style.css" >
	</head>
	<body>
	<?php
		include("Connexion.php");
		$link=connect();
		mysqli_set_charset($link,'utf8');

		$queryUsers="SELECT * FROM users WHERE login='".$_POST['login']."' AND mdp='".$_POST['mdp']."'";
		$resultsUsers=mysqli_query($link,$queryUsers);
		$row=mysqli_fetch_array($resultsUsers,MYSQLI_NUM);


		if($resultsUsers->num_rows>0 || !empty($_POST['nom']) && !empty($_POST['mdp'])){
			$_SESSION['num'] = $row[0];
			$_SESSION['nom'] = $row[1];
			$_SESSION['login'] = $row[3];

			header('Location:Home.php');
			exit();
		}
		else{
			header('Location:Login.php');
			exit();
		}


	?>
	</body>
</html>
