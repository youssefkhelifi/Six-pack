<?php
	class User{
		private $id=null;
		private $name=null;
		private $email=null;
		private $password=null;
		private $user_type=null;
		private $image=null;
        private $etat=null;
        
		
		
		function __construct($id, $name, $email, $password, $user_type, $image, $etat){
			$this->id=$id;
			$this->name=$name;
			$this->email=$email;
			$this->password=$password;
			$this->user_type=$user_type;
            $this->image=$image;
            $this->etat=$etat;
			$this->DateInscription=$DateInscription;
		}
		function getid(){
			return $this->getid;
		}
		function getname(){
			return $this->name;
		}
		function getemail(){
			return $this->email;
		}
		function getpassword(){
			return $this->password;
		}
		function getuser_type(){
			return $this->user_type;
		}
        function getimage(){
			return $this->image;
		}
        function getetat(){
			return $this->etat;
		}
		
        
        
        function setname(string $name){
			$this->name=$name;
		}
		function setemail(string $email){
			$this->email=$email;
		}
		function setpassword(string $password){
			$this->password=$password;
		}
		function setuser_type(int $user_type){
			$this->user_type=$user_type;
		}
        function setimage(int $image){
			$this->image=$image;
		}
        function setetat(int $etat){
			$this->etat=$etat;
		}
		
	}


?>