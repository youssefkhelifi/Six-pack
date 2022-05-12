<?php
    include_once '../Model/produit.php';
    include_once '../Controller/produitC.php';

    $error = "";

    // create produit
    $produit = null;

    // create an instance of the controller
    $produitC = new produitC();
    if (
        isset($_POST["idP"]) &&
		isset($_POST["nom"]) &&
        isset($_POST["prix"]) &&		
        isset($_POST["quantité"]) 
		
    ) {
        if (
            !empty($_POST["idP"]) && 
			!empty($_POST["nom"]) &&
            !empty($_POST["prix"]) && 
			!empty($_POST["quantité"]) 
          
        ) {
            $produit = new produit(
                $_POST['idP'],
				$_POST['nom'],
                $_POST['prix'],
                $_POST['quantité']
				
            );
            $produitC->modifierproduit($produit, $_POST["idP"]);
            header('Location:tableproduit.php');
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

        <button><a href="tableproduit.php">Retour à la liste des produits</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['idP'])){
				$produit= $produitC->recupererproduit($_POST['idP']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idP">idP:
                        </label>
                    </td>
                    <td><input type="number" name="idP" id="idP" value="<?php echo $produit['idP']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $produit['nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">prix:
                        </label>
                    </td>
                    <td><input type="number" name="prix" id="prix" value="<?php echo $produit['prix']; ?>" maxlength="30"></td>
                </tr>
                <tr>
                    <td>
                        <label for="quantité">quantité:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="quantité" id="quantité" value="<?php echo $produit['quantité']; ?>" maxlength="30">
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