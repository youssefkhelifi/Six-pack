<?php require '../config.php'; 

$nom_utilisateur = null; if ( !empty($_GET['nom_utilisateur'])) { $nom_utilisateur = $_REQUEST['nom_utilisateur']; } if ( null==$nom_utilisateur ) { header("Location: afficherFormation.php"); } if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) { 
      $nom_formationError = null; 
      $niveau_formationError = null; 
      $type_de_ressourceError = null;
      $fichierError = null;
      $nom_utilisateurError = null; 
      
// On assigne nos valeurs
       $nom_formation = $_POST['nom_formation']; 
       $niveau_formation = $_POST['niveau_formation']; 
        $type_de_ressource = $_POST['type_de_ressource'];
        $fichier = $_POST['fichier'];
         $nom_utilisateur = $_POST['nom_utilisateur']; 
         // On verifie que les champs sont remplis 
         $valid = true; 
         if (empty($nom_formation)) { $nom_formationError = 'Please enter nom_formation'; $valid = false; } if (empty($niveau_formation)) { $niveau_formationError = 'Please enter your name'; $valid = false; } if (empty($type_de_ressource)) { $type_de_ressourceError = 'Please enter type_de_ressource$type_de_ressource'; $valid = false; } if (empty($fichier)) { $fichierError = 'Please enter Email Address'; $valid = false; } else if (!filter_var($fichier, FILTER_VALIDATE_EMAIL)) { $fichierError = 'Please enter a valid Email Address'; $valid = false; }  if (empty($sujet)) { $sujetError = 'Please enter phone'; $valid = false; }  if  (!isset($nom_utilisateur)){ $nom_utilisateurError = 'Please enter website nom_utilisateur'; $valid = false; } 
         // mise à jour des donnés 
         if ($valid) { $pdo = config::getConnexion();
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $sql = "UPDATE formation SET nom_formation = ?, niveau_formation = ?, type_de_ressource = ?, fichier = ?, nom_utilisateur = ?  WHERE nom_utilisateur = ?";
             $q = $pdo->prepare($sql);
             $q->execute(array($nom_formation, $niveau_formation ,$type_de_ressource, $fichier,  $nom_utilisateur ,$nom_utilisateur));
             config::disconnect();
             header("Location: afficherFormation.php");
             
         } 
        }else {
            
            $pdo = config::getConnexion();
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $sql = "SELECT * FROM formation where nom_utilisateur = ?";
             $q = $pdo->prepare($sql);
             $q->execute(array($nom_utilisateur));
             $data = $q->fetch(PDO::FETCH_ASSOC);
             $nom_formation = $data['nom_formation'];
             $niveau_formation = $data['niveau_formation'];
             $type_de_ressource = $data['type_de_ressource'];
             $fichier = $data['fichier'];
             $nom_utilisateur = $data['nom_utilisateur'];
             config::disconnect();
         }
     
     ?>

<!DOCTYPE html>
<html>
 <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>Crud-Update</title>
         <link href="css/bootstrap.min.css" rel="stylesheet">
     <img src="data:imname/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />

 </head>
 <body>
  

<br />
<div class="container">

<br />
<div class="row">

<br />
<h3>Modifier un contact</h3>
<p>

</div>
<p>

<br />
<form method="post" action="update.php?id=<?php echo $id ;?>">

<br />
<div class="control-group <?php echo!empty($nomError) ? 'error' : ''; ?>">
                    <label class="control-label">name</label>

<br />
<div class="controls">
                        <input name="nom" type="text"  placeholder="nom" value="<?php echo!empty($nom) ? $nom : ''; ?>">
                        <?php if (!empty($nomError)): ?>
                            <span class="help-inline"><?php echo $nomrror; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>



<br />
<div class="control-group<?php echo!empty($prenomError) ? 'error' : ''; ?>">
                    <label class="control-label">prenom</label>

<br />
<div class="controls">
                        <input type="text" name="prenom" value="<?php echo!empty($prenom) ? $prenom : ''; ?>">
                        <?php if (!empty($prenomError)): ?>
                            <span class="help-inline"><?php echo $prenomError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>

<div class="controls">
                        <input type="text" name="nomUtilisateur" value="<?php echo!empty($nomUtilisateur) ? $nomUtilisateur : ''; ?>">
                        <?php if (!empty($nomUtilisateurError)): ?>
                            <span class="help-inline"><?php echo $nomUtilisateurError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>
<br />
<div class="control-group <?php echo!empty($emailError) ? 'error' : ''; ?>">
                    <label class="control-label">Email Address</label>

<br />
<div class="controls">
                        <input name="email" type="text" placeholder="Email Address" value="<?php echo!empty($email) ? $email : ''; ?>">
                        <?php if (!empty($emailError)): ?>
                            <span class="help-inline"><?php echo $emailError; ?></span>
                        <?php endif; ?>
</div>






<p>

</div>
<p>







<br />
<div class="control-group <?php echo!empty($explicationError) ? 'error' : ''; ?>">
                    <label class="control-label">explicationaire </label>
                    <br />
<div class="controls">
                        <textarea rows="4" cols="30" name="explication" ><?php if (isset($explication)) echo $explication; ?></textarea>    
                        <?php if (!empty($explicationError)): ?>
                            <span class="help-inline"><?php echo $explicationError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>


<br />
<div class="form-actions">
                    <input type="submit" class="btn btn-success" name="submit" value="submit">
                    <a class="btn" href="reclamationBack.php">Retour</a>
</div>
<p>

            </form>
<p>



</div>
<p>


    </body>
</html>