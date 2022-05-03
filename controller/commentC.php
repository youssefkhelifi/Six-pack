<?php
	include_once '../../config.php';
	require_once '../../model/commentaire.php';
    $update=false;
	class commentC {
		function afficherComment(){
			$sql="SELECT * FROM commentaireblog";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		
		function ajouterComment($comment){
			$sql="INSERT INTO commentaireblog (contenuC, id_blog) VALUES ( :contenuC, :id_blog)"; 
            //INSERT INTO `commentaireblog` (`contenuC`, `id_blog`) VALUES ( 'test', 2);
			
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					
					'contenuC' => $comment->getcontenu_c(),
					'id_blog' => $comment->getid_blog()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
            //header("Location: blogDetails.php");		
		}
		
		function supprimercommentC($idCommentaire){
			$sql="DELETE FROM commentaireblog WHERE idCommentaire=:idCommentaire";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idCommentaire', $idCommentaire);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

		function modifierblog($blog, $idCommentaire){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE commentaireblog SET 
						dateC= :dateC,
						contenuC= :contenuC 
					
					WHERE idCommentaire= :idCommentaire'
				);
				$query->execute([
					'idCommentaire' => $blog->getidCommentaire(),
					'dateC' => $blog->getdateC(),
					'contenuC' => $blog->getcontenuC()
					
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		
		

	}
?>