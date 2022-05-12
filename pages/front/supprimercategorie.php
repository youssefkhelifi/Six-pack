<?php
	include '../controller/categorieC.php';
	$categorieC=new categorieC();
	$categorieC->supprimercategorie($_GET["id"]);
	header('Location:categorie.php');
?>