<?php
    include_once '../../model/type.php';
    include_once '../../controller/typeC.php';

    $error = "";

    // create type
    $type = null;

    // create an instance of the controller
    $typeC = new typeC();
    if (
        isset($_POST["Idt"]) &&
		isset($_POST["categorie"]) &&
        isset($_POST["prix"])
    ) {
        if (
            !empty($_POST["Idt"]) && 
			!empty($_POST["categorie"]) &&
            !empty($_POST["prix"])
        ) {
            $type = new type(
                $_POST['Idt'],
				$_POST['categorie'],
                $_POST['prix']
            );
            $typeC->modifiertype($type, $_POST["Idt"]);
            header('Location:tabletype.php');
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
  <title>type display </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
    
</head>
    <body>
    <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

        <button><a href="tabletype.php">Retour à la liste des types</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['Idt'])){
				$type = $typeC->recuperertype($_POST['Idt']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="Idt">Numéro type:
                        </label>
                    </td>
                    <td><input type="number" name="Idt" id="Idt" value="<?php echo $type['Idt']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="categorie">categorie:
                        </label>
                    </td>
                    <td><input type="text" name="categorie" id="categorie" value="<?php echo $type['categorie']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">prix:
                        </label>
                    </td>
                    <td><input type="number" name="prix" id="prix" value="<?php echo $type['prix']; ?>"></td>
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