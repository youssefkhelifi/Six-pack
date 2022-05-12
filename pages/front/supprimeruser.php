<?php
	include '../Controller/UserC.php';
	$userC=new UserC();
	$userC->supprimerUser($_GET["IdU"]);
	header('Location:tableU.php');
?>