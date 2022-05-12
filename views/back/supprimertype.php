<?php
	include '../../controller/typeC.php';
	$typeC=new typeC();
	$typeC->supprimertype($_GET["Idt"]);
	header('Location:tabletype.php');
?>