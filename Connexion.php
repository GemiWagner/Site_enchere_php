<?php
	function connect(){
		include("param.inc.php");
		$link = mysqli_connect($host, $user, $password, $dbname);
		if (!$link) {
		    die('Erreur de connexion (' . mysqli_connect_errno() . ') '
		            . mysqli_connect_error());
		}
		return $link;
	}

	function disconnect(){
		mysqli_close($link);
	}
?> 