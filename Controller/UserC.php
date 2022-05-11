<?php
	include '../config.php';
	include_once '../Model/User.php';
	class UserC{
		function afficherUser(){
			$sql="SELECT * FROM users";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerUser($id){
			$sql="DELETE FROM users WHERE id=:id";
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
		function ajouterUser($user){
			$sql="INSERT INTO users (id, name, email, password, user_type, image, etat) 
			VALUES (:id,:name,:email,:password,:user_type,:image,:etat)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id' => $user->getid(),
					'name' => $user->getname(),
					'email' => $user->getemail(),
					'password' => $user->getpassword(),
					'user_type' => $user->getuser_type(),
                    'image' => $user->getimage(),
                    'etat' => $user->getetat(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupereruser($id){
			$sql="SELECT * from users where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifieruser($user, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE users SET 
						name= :name,
                        email= :email, 
						password= :password, 
						user_type= :user_type, 
						image= :image,
                        etat= :etat,
					WHERE id= :id'
				);
				$query->execute([
					'name' => $user->getname(),
                    'email' => $user->getemail(),
					'password' => $user->getpassword(),
					'user_type' => $user->getuser_type(),
                    'image' => $user->getimage(),
					'etat' => $user->getetat(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>