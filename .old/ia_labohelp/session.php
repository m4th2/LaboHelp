<?php
session_start();
if (!isset($_POST["destroy"]))
{
	if (isset($_GET['ref']))
	{
		$_SESSION["ref"] = $_GET["ref"];
	}
	elseif (isset($_POST['code'])) {
		$_SESSION["code"] = True;
	}
	else {
		for ($i=0 ; $i<$_POST["nombre"] ; $i++) { 
			if (isset($_POST["bouton-{$i}"])) {
				$_SESSION["ref"] = $_POST["ref-{$i}"];
			}
		}
	}
}
else{
	session_destroy();
}
header("Location: ../index.php");
exit();
?>