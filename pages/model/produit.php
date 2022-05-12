<?php
class produit
{
    private $idP = null;
    private $nom = null;
    private $prix = null;
    private $quantité = null;
    private $id = null;

   
    public function __construct( $idP,$nom, $prix, $quantité,$id)
    {
        $this->idP= $idP;
        $this->nom= $nom;
        $this->prix= $prix;
        $this->quantité= $quantité;
        $this->id= $id;
       
    }

    public function getidP()
    {
        return $this->idP;
    }
   
   
    public function getnom()
    {
        return $this->nom;
    }
    public function getprix()
    {
        return $this->prix;
    }
    public function getquantité()
    {
        return $this->quantité;
    }
    public function getid()
    {
        return $this->id;
    }
    
   
    
    public function setnom($nom)
    {
        $this->nom = $nom;
    }

   
   
    
    public function setprix($prix)
    {
        $this->prix = $prix;
    }

    
    

   
    public function setquantité($quantité)
    {
        $this->quantité = $quantité;
    }
    public function setid($id)
    {
        $this->id= $id;
    }
   
   

}
?>