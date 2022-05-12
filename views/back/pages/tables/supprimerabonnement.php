<?php
	include '../Controller/abonnementC.php';
	$abonnementC=new abonnementC();
	$abonnementC->supprimerabonnement($_GET["Id"]);
	header('Location:tableabonnement.php');
?>