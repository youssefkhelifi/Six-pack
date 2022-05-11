<?php
	include '../config.php';
	include_once '../Model/Role.php';
	class RoleC {
		function afficherrole(){
			$sql="SELECT * FROM role";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerrole($IdR){
			$sql="DELETE FROM role WHERE IdR=:IdR";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':IdR', $IdR);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterrole($role){
			$sql="INSERT INTO role (IdR, Description) 
			VALUES (:IdR, :Description)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'IdR' => $role->getIdR(),
					'Description' => $role->getDescription()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererrole($IdR){
			$sql="SELECT * from role where IdR=$IdR";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$role=$query->fetch();
				return $role;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierrole($role, $IdR){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE role SET 
 
						Description= :Description
					WHERE IdR= :IdR'
				);
				$query->execute([

					'Description' => $role->getDescription(),
					'IdR' => $IdR
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>