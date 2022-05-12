<?php
    include_once '../Model/categorie.php';
    include_once '../Controller/categorieC.php';

    $error = "";

    // create categorie
    $categorie = null;

    // create an instance of the controller
    $categorieC = new categorieC();
    if (
        isset($_POST["id"]) &&
        isset($_POST["sexe"]) &&
		isset($_POST["type_produit"]) &&		
        isset($_POST["taille"]) 
    ) {
        if (
            !empty($_POST["id"]) &&
            !empty($_POST["sexe"]) && 
			!empty($_POST['type_produit']) &&
            !empty($_POST["taille"]) 
        ) {
            $categorie = new categorie(
                $_POST["id"],
                $_POST["sexe"],
				$_POST["type_produit"],
                $_POST["taille"]
            );
           
           
           
            $categorieC->modifiercategorie($categorie, $_POST["id"]);
            header('Location:afficherlistecategories.php');

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
        <button><a href="afficherlistecategories.php">Retour à la liste des categories</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['id'])){
				$categorie = $categorieC->recuperercategorie($_POST['id']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id">id:
                        </label>
                    </td>
                    <td><input type="number" name="id" id="id" value="<?php echo $categorie['id']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="sexe">sexe:
                        </label>
                    </td>
                    <td><input type="text" name="sexe" id="sexe" value="<?php echo $categorie['sexe']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="type_produit">type_produit:
                        </label>
                    </td>
                    <td><input type="text" name="type_produit" id="type_produit" value="<?php echo $categorie['type_produit']; ?>" maxlength="20"></td>
                </tr>
                       
                <tr>
                    <td>
                        <label for="taille">taille:
                        </label>
                    </td>
                    <td><input type="text" name="taille" id="taille" value="<?php echo $categorie['taille']; ?>" maxlength="20"></td>
                </tr>
                           
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
    </body>
</html>