<?php
	include '../config.php';
	include_once '../Model/categorie.php';
	class categorieC {
		function affichercategorie(){
			$sql="SELECT * FROM categorie";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimercategorie($id){
			$sql="DELETE FROM categorie WHERE id =:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajoutercategorie($categorie){
			$sql="INSERT INTO categorie (id,sexe, type_produit, taille) 
			VALUES (:id,:sexe,:type_produit,:taille)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id' => $categorie->getid(),
					'sexe' => $categorie->getsexe(),
					'type_produit' => $categorie->gettype_produit(),
					'taille' => $categorie->gettaille()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperercategorie($id){
			$sql="SELECT * from categorie where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->bindValue(':id',$id);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiercategorie($categorie, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE categorie SET 
					    sexe=:sexe,
						type_produit= :type_produit, 
						taille= :taille
					WHERE id= :id'
				);
				$query->execute([
					'sexe' => $categorie->getsexe(),
					'type_produit' => $categorie->gettype_produit(),
					'taille' => $categorie->gettaille(),
					'id'=>$id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>