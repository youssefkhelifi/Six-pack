<?php  
 
class blogs{
    // table fields  
    private $id_blog=null;  
    private $objet=null;  
    private $date=null;  
    private $description=null; 
    private $image=null;
    // message string  
      
    // constructor set default value  
    function __construct( $objet, $description, $image)  
    {  
        
			$this->objet=$objet;
			
			$this->description=$description; 
            $this->image=$image;
    }  

    function getId_blog(){
        return $this->id_blog;
    }
    function getObjet(){
        return $this->objet;
    }
    function getdate(){
        return $this->date;
    }
    function getDescription(){
        return $this->description;
    }
    
    function getimage(){
        return $this->image;
    }
    
    function setId_blog(string $id_blog){
        $this->id_blog=$id_blog;
    }
    function setObject(string $objet){
        $this->objet=$objet;
    }
    function setimage(string $image){
        $this->image=$image;
    }
    function setdate(string $date){
        $this->date=$date;
    }
    function setDescription(string $description){
        $this->description=$description;
    }
    
}  
?> 