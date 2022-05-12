<?php
	include '../Controller/produitC.php';
	$produitC=new produitC();
	$produitC->supprimerproduit($_GET["idP"]);
	header('Location:tableproduit.php');
?>