<?php  
 
class commentaire{
    // table fields  
    private $id_comment=null;  
    private $contenu_c=null;  
    private $date_c=null;  
    private $id_blog=null; 
    // message string  
      
    // constructor set default value  
    function __construct($contenu_c, $id_blog)  
    {  
        
			$this->contenu_c=$contenu_c;
			//$this->date_c=$date_c;
			$this->id_blog=$id_blog; 
    }  

    function getid_comment(){
        return $this->id_comment;
    }
    function getcontenu_c(){
        return $this->contenu_c;
    }
    function getdate_c(){
        return $this->date_c;
    }
    function getid_blog(){
        return $this->id_blog;
    }
    
    function setid_comment(string $id_comment){
        $this->id_comment=$id_comment;
    }
    function setcontenu_c(string $contenu_c){
        $this->contenu_c=$contenu_c;
    }
    function setdate_c(string $date_c){
        $this->date_c=$date_c;
    }
    function setid_blog(string $id_blog){
        $this->id_blog=$id_blog;
    }
    
}  
?> 