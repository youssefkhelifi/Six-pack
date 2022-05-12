<?php
	include '../../config.php';
	include_once '../../model/type.php';
	class typeC {
		function affichertype (){
			$sql="SELECT * FROM type";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimertype($Idt){
			$sql="DELETE FROM type WHERE Idt=:Idt";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':Idt', $Idt);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajoutertype($type){
			$sql="INSERT INTO type (Idt, categorie, prix) 
			VALUES (:Idt,:categorie,:prix)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'Idt' => $type->getIdt(),
					'categorie' => $type->getcategorie(),
					'prix' => $type->getprix()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperertype($Idt){
			$sql="SELECT * from type where Idt=$Idt";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$type=$query->fetch();
				return $type;
				
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		

		function modifiertype($type, $Idt){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE type SET 
						categorie= :categorie, 
						prix= :prix
					WHERE Idt= :Idt'
				);
				$query->execute([
					'categorie' => $type->getcategorie(),
					'prix' => $type->getprix(),
					'Idt' => $Idt
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>