<?php
	class categorie{
		private $id=null;
		private $sexe=null;
		private $type_produit=null;
		private $taille=null;
		
		
		function __construct($id,$sexe, $type_produit, $taille){
			$this->id=$id;
			$this->sexe=$sexe;
			$this->type_produit=$type_produit;
			$this->taille=$taille;
		
			
			
		}
		function getid(){
			return $this->id;
		}
		function getsexe(){
			return $this->sexe;
		}
		function gettype_produit(){
			return $this->type_produit;
		}
		function gettaille(){
			return $this->taille;
		}
		
		function setid(string $id){
			$this->id=$id;
		}
		function setsexe(string $sexe){
			$this->sexe=$sexe;
		}
		function settype_produit(string $type_produit){
			$this->type_produit=$type_produit;
		}
		function settaille(string $taille){
			$this->taille=$taille;
		}
		
	}


?>