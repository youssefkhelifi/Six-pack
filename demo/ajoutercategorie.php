<?php
    include_once 'categorie.php';
    include_once 'categorie.php';

    $error = "";

    // create categorie
    $categorie= null;

    // create an instance of the controller
    $categorie = new categorie();
    if (
        isset($_POST["sexe"]) &&
		isset($_POST["type"]) &&		
        isset($_POST["taille"]) 
    ) {
        if (
            !empty($_POST["sexe"]) && 
			!empty($_POST['type']) &&
            !empty($_POST["taille"])
        ) {
            $categorie = new categorie(
                $_POST['sexe'],
				$_POST['type'],
                $_POST['taille'], 
            );
            $categorie->ajoutercategorie($categorie);
            header('Location:afficherlistecategorie.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherlistecategorie.php">Retour à la liste des categories</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="sexe">sexe:
                        </label>
                    </td>
                    <td><input type="text" name="sexe" id="sexe" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="type">type:
                        </label>
                    </td>
                    <td><input type="text" name="type" id="type" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="taille">Prenom:
                        </label>
                    </td>
                    <td><input type="text" name="taille" id="taille" maxlength="20"></td>
                </tr>
           
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>