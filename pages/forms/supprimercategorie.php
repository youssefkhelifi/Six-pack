<?php
	include '../Controller/categorieC.php';
	$categorieC=new categorieC();
	$categorieC->supprimercategorie($_GET["id"]);
	header('Location:tablecategorie.php');
?>