<?php
	include '../config1.php';
	include_once '../Model/produit.php';
	class produitC {
		
		function afficherproduit(){
			$sql="SELECT * FROM produit";
			$db = config1::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerproduit($idP){
			$sql="DELETE FROM produit WHERE idP =:idP";
			$db = config1::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idP', $idP);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterproduit($produit){
			$sql="INSERT INTO produit (idP,nom, prix,quantité,id) 
			VALUES (:idP,:nom,:prix,:quantité,:id)";
			$db = config1::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'idP' => $produit->getidP(),
					'nom' => $produit->getnom(),
					'prix' => $produit->getprix(),
					'quantité' => $produit->getquantité(),
					'id' => $produit->getid()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererproduit($idP){
			$sql="SELECT * from produit where idP=$idP";
			$db = config1::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->bindValue(':idP',$idP);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierproduit($produit, $idP){
			try {
				$db = config1::getConnexion();
				$query = $db->prepare(
					'UPDATE produit SET
					    nom=:nom,
						prix= :prix, 
						quantité= :quantité
					WHERE idP= :idP'
				);
				$query->execute([
					'nom' => $produit->getnom(),
					'prix' => $produit->getprix(),
					'quantité' => $produit->getquantité(),
					'idP'=>$idP
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		
		
	}

?>