<?php
	include '../../config1.php';
	include_once '../../model/abonnement.php';
	class abonnementC {
		function afficherabonnement (){
			$sql="SELECT * FROM abonnement";
			$db = config1::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerabonnement($Id){
			$sql="DELETE FROM abonnement WHERE Id=:Id";
			$db = config1::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':Id', $Id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterabonnement($abonnement){
			$sql="INSERT INTO abonnement (Id, DateDebut, DateFin,Idt) 
			VALUES (:Id,:DateDebut,:DateFin, :Idt)";
			$db = config1::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'Id' => $abonnement->getId(),
					'DateDebut' => $abonnement->getDateDebut(),
					'DateFin' => $abonnement->getDateFin(),
					'Idt' => $abonnement->getIdt()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererabonnement($Id){
			$sql="SELECT * from abonnement where Id=$Id";
			$db = config1::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$abonnement=$query->fetch();
				return $abonnement;
				
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierabonnement($abonnement, $Id){
			try {
				$db = config1::getConnexion();
				$query = $db->prepare(
					'UPDATE abonnement SET 
						DateDebut= :DateDebut, 
						DateFin= :DateFin
					WHERE Id= :Id'
				);
				$query->execute([
					'DateDebut' => $abonnement->getDateDebut(),
					'DateFin' => $abonnement->getDateFin(),
					'Id' => $Id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

       
	}
?>