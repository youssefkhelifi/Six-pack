<?php
include '../../config.php';
require_once '../../model/blog.php';
    $update=false;
	class blogC {
		function afficherBlogs(){
			$sql="SELECT * FROM blogs";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerid_blog($id_blog){
			$sql="DELETE FROM blogs WHERE id_blog=:id_blog";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_blog', $id_blog);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterblog($blogs){
			$sql="INSERT INTO blogs (objet,date,description,image) 
			VALUES (:objet,:date,:description,:image)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					
					'objet' => $blogs->getObjet(),
					'date' => $blogs->getdate(),
					'description' => $blogs->getdescription(),
					'image' => $blogs->getimage()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
            //header("Location: index.php");		
		}
		function recupererblog($id_blog){
			$sql="SELECT * from blogs where id_blog=$id_blog";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$id_blog=$query->fetch();
				return $id_blog;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierblog($blogs, $id_blog){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE blogs SET
				
						objet= :objet, 
						date= :date, 
						description= :description
						
					WHERE id_blog= :id_blog'
				);
				$query->execute([
					
					'objet' => $blogs->getObjet(),
					'date' => $blogs->getdate(),
					'description' => $blogs->getDescription(),
					'id_blog' => $id_blog
					
					
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>