<?php session_start() ?>
<!DOCTYPE html>
<html>
<?php 
	session_destroy(); 
	header('Location:Home.php');
	exit();
?>
</html>