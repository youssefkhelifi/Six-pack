<?php
	class abonnement{
		
		private $Id=null;
		private $DateDebut=null;
		private $DateFin=null;
		private $Idt=null;
		function __construct($Id, $DateDebut, $DateFin,$Idt){
			$this->Id=$Id;
			$this->DateDebut=$DateDebut;
			$this->DateFin=$DateFin;
			$this->Idt=$Idt;
		}
		
		function getId(){
			return $this->Id;
		}
		
		function getDateDebut(){
			return $this->DateDebut;
		}
		function getDateFin(){
			return $this->DateFin;
		}
		
		function getIdt(){
			return $this->Idt;
		}
		
		function setDateDebut(string $DateDebut){
			$this->DateDebut=$DateDebut;
		}
		function setDateFin(string $DateFin){
			$this->DateFin=$DateFin;
		}
		function setIdt(string $Idt){
			$this->Idt=$Idt;
		}
		
	}


?>