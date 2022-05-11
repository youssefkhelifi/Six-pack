<?php
	class Role{
		private $IdR=null;
		private $Description=null;
		
		function __construct($IdR, $Description){
			$this->IdR=$IdR;
			$this->Description=$Description;
		}
		function getIdR(){
			return $this->IdR;
		}
		function getDescription(){
			return $this->Description;
		}
		
		function setDescription(string $Description){
			$this->Description=$Description;
		}
		
		
	}


?>