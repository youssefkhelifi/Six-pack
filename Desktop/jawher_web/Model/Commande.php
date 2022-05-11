
<?php
	class Commande{
		
		private $user_id;
		private $pid;
		private $p_name;
		private $p_price;
		private $p_image;
		
		function __construct($user_id, $pid, $p_name, $p_price, $p_image){
			$this->user_id=$$user_id;
			$this->pid=$pid;
			$this->p_name=$p_name;
			$this->p_price=$p_price;
			$this->p_image=$p_image;
		}
		function getuser_id(){
			return this->user_id;
		}
		function getpid(){
			return this->pid;
		}
		function getp_name(){
			return $this->p_name;
		}
		function getp_price(){
			return $this->p_price;
		}
		function getp_image(){
			return $this->p_image;
		}
		
		
		
	}
	class Ligne{
		private $quantite=null;
		private $idCmd=null;


		
		function __construct($quantite,$idCmd){
			$this->quantite=$quantite;
			$this->idCmd=$idCmd;
		}
		function getquantite(){
			return $this->quantite;
		}
		function getidCmd(){
			return $this->idCmd;
		}
	}
?>