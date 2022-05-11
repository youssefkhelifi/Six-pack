<?php
	include '../config.php';
	include_once '../Model/Commande.php';
	class CommandeC {
		function affichercommande(){
			$sql="SELECT * FROM cart";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimercommande($id){
			$sql="DELETE FROM cart WHERE id=:id";
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
		
		function ajoutercommande($commande){
			$sql="INSERT INTO cart ( user_id, pid, name, price, quantity, image) 
			VALUES (:user_id, :pid, :name, :price, :quantity, :image)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					
					'user_id' => $commande->getuser_id(),
					'pid' => $commande->getpid(),
					'name' => $commande->getp_name(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperercommande($idC){
			$sql="SELECT * from Gestion_de_commande where idC=$idC";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$commande=$query->fetch();
				return $commande;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function afficherproduit(){
			$sql="SELECT * FROM produit";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterproduit($produit){
			$sql="INSERT INTO commande ( dateCmd, etat,prix,nomP,idP) 
			VALUES ( :dateCmd, :etat, :prix, :nomP, :idP)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					
					'dateCmd' => $produit->getdatecmd(),
					'etat' => $produit->getetate(),
					'prix' => $produit->getprix(),
					'nomP' => $produit->getNomp(),
					'idP' => $produit->getidp()

					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

	}
?>