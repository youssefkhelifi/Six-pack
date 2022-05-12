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
            !empty($_POST["type_produit"]) && 
			!empty($_POST["taille"]) 
          
        ) {
            $categorie = new categorie(
                $_POST['id'],
				$_POST['sexe'],
                $_POST['type_produit'],
                $_POST['taille']
				
            );
            $categorieC->modifiercategorie($categorie, $_POST["id"]);
            header('Location:tablecategorie.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User display </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
    
</head>
    <body>
    <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

        <button><a href="tablecategorie.php">Retour à la liste des categories</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['id'])){
				$categorie= $categorieC->recuperercategorie($_POST['id']);
				
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
                    <td><input type="text" name="type_produit" id="type_produit" value="<?php echo $categorie['type_produit']; ?>" maxlength="30"></td>
                </tr>
                <tr>
                    <td>
                        <label for="taille">taille:
                        </label>
                    </td>
                    <td>
                        <input type="taille" name="taille" id="taille" value="<?php echo $categorie['taille']; ?>" maxlength="30">
                    </td>
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
        </div>
              </div>
            </div>
        </div>
              </div>
            </div>
    </body>
</html>