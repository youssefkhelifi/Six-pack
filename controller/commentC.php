<?php
	include '../../config1.php';
	require_once '../../model/commentaire.php';
    $update=false;
	class commentC {
		function afficherComment(){
			$sql="SELECT * FROM commentaireblog";
			$db = config1::getConnexion();
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
			
			$db = config1::getConnexion();
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
			$db = config1::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idCommentaire', $idCommentaire);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		
		
		

	}
?>