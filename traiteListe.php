<?php 
session_start();
require('C:\wamp\phpmailer\PHPMailerAutoload.php');
?>
<!DOCTYPE html>
<html>	$row=mysqli_fetch_array($resultsItems,MYSQLI_NUM)
	<head>
		<meta charset="UTF-8">
    	<meta name="Home" content="projet,html,php">
		<link rel="stylesheet" type"text/css" href="style.css">
	</head>
	<body>
	<?php 

		/*$mailV = new PHPMailer();
		$mailV->IsSMTP();
		$mailV->Host = 'smtp.mail.yahoo.fr';
		$mailV->SMTPAuth = true;
		$mailV->Username = 'thehobbitstore@yahoo.fr';
		$mailV->Password = 'gandoulflevieux';
		$mailV->Port = 465; // Par défaut
		$mailV->SetFrom('thehobbitstore@yahoo.fr', 'The Hobbit Store');

		$mailA = new PHPMailer();
		$mailA->Host = 'smtp.mail.yahoo.fr';
		$mailA->SMTPAuth = true;
		$mailA->Username = 'thehobbitstore@yahoo.fr';
		$mailA->Password = 'gandoulflevieux';
		$mailA->Port = 465; // Par défaut
		$mailA->SetFrom('thehobbitstore@yahoo.fr', 'The Hobbit Store');*/


		include("Connexion.php");
		$link=connect();
		mysqli_set_charset($link,'utf8');

		$today=date('Y-m-d')." 00:00:00.0";

		echo "<br>";

		$getObj="SELECT * FROM objets";
		$resultGetObj=mysqli_query($link,$getObj);
		$j=1;
		while($row=mysqli_fetch_array($resultGetObj,MYSQLI_NUM)){
			$dateFin=$row[5]." 00:00:00.0";
			if( strtotime($today) >= strtotime($dateFin)){

				print("Fin de l'enchère n°".$row[0]);

				//AJOUTER "SI IL Y A EU UNE ENCHERE"


				$getVendeur="SELECT * FROM users u INNER JOIN vente v ON u.id_u=v.id_vendeur INNER JOIN objets o ON v.id_obj=o.id_o INNER JOIN enchere e 
					ON v.id_obj=e.id_obj WHERE v.id_obj=".$row[0];
				$resultGetVen=mysqli_query($link,$getVendeur);
				$rowV=mysqli_fetch_array($resultGetVen,MYSQLI_NUM);
				print($rowV[4]);

				echo "<br><br>";
				echo "Bonjour ".$rowV[1]." aka ".$rowV[3].".<br>
				Vous avez vendu cet objet :<br>
				".$rowV[9]."<br>
				pour ".$rowV[16]." €.";
				echo "<br><br>";

				/*$mailV->AddAddress($rowV[4]);
				$mailV->Subject = 'Objet vendu';
				$mailV->MsgHTML("Bonjour ".$rowV[1]." aka ".$rowV[3]."\r\n
				Vous avez vendu cet objet :\r\n
				".$rowV[9]."\r\n
				pour ".$rowV[16]." €.");
				if(!$mailV->Send())
					echo 'Error : ' . $mailV->ErrorInfo;
				else
					echo 'Message envoyé !';*/
				


				$getAcheteur="SELECT * FROM enchere e INNER JOIN users u ON e.id_acheteur=u.id_u INNER JOIN objets o ON e.id_obj=o.id_o WHERE e.id_obj=".$row[0];
				$resultGetAch=mysqli_query($link,$getAcheteur);
				$rowA=mysqli_fetch_array($resultGetAch,MYSQLI_NUM);

				echo "Bonjour ".$rowA[4]." aka ".$rowA[6].".<br>
					Vous avez acheté cet objet :<br>
					".$rowA[10]."<br>
					pour ".$rowA[2]." €.";
				echo "<br><br>";

				/*$mailA->AddAddress($rowA[7]);
				$mailA->Subject = 'Objet acheté';
				$mailA->MsgHTML("Bonjour ".$rowA[4]." aka ".$rowA[6]."\r\n
					Vous avez acheté cet objet :\r\n
					".$rowA[10]."\r\n
					pour ".$rowV[2]." €.");
				if(!$mailA->Send())
					echo 'Error : ' . $mailA->ErrorInfo;
				else
					echo 'Message envoyé !';*/


				$delObjRequest="DELETE FROM objets WHERE id_o = ".$row[0];
				$resultDel=mysqli_query($link,$delObjRequest);
				$delVenteRequest="DELETE FROM vente WHERE id_obj = ".$row[0];
				$resultDel=mysqli_query($link,$delVenteRequest);
				$delEnchRequest="DELETE FROM enchere WHERE id_obj = ".$row[0];
				$resultDel=mysqli_query($link,$delEnchRequest);
			}
			$j++;
		}

		header('Location: .\Home.php');
		exit();
		
?>
</body>
</html>