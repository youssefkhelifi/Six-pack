<?php
	include '../controller/produitC.php';
	$produitC=new produitC();
	$produitC->supprimerproduit($_GET["idP"]);
	header('Location:afficherlisteproduits.php');
?>