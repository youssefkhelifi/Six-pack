<?php
	class type{
		
		private $Idt=null;
		private $categorie=null;
		private $prix=null;
		
		function __construct($Idt, $categorie, $prix){
			$this->Idt=$Idt;
			$this->categorie=$categorie;
			$this->prix=$prix;
		}
		
		function getIdt(){
			return $this->Idt;
		}
		
		function getcategorie(){
			return $this->categorie;
		}
		function getprix(){
			return $this->prix;
		}
		
		
		function setcategorie(string $categorie){
			$this->categorie=$categorie;
		}
		function setprix(string $prix){
			$this->prix=$prix;
		}
		
	}


?>