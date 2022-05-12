<?php
    include_once '../model/abonnement.php';
    include_once '../controller/abonnementC.php';

    $error = "";

    // create abonnement
    $abonnement = null;

    // create an instance of the controller
    $abonnementC = new abonnementC();
    if (
        isset($_POST["Id"]) &&
		isset($_POST["DateDebut"]) &&		
        isset($_POST["DateFin"]) 
    ) {
        if (
            !empty($_POST["Id"]) && 
			!empty($_POST["DateDebut"]) &&
            !empty($_POST["DateFin"]) 
        ) {
            $abonnement = new abonnement(
                $_POST["Id"],
				$_POST["DateDebut"],
                $_POST["DateFin"]
            );
            $abonnementC->modifierabonnement($abonnement, $_POST["Id"]);
            header('Location:tableabonnement.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonnement Display</title>
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
        <button><a href="tableabonnement.php">Retour à la liste des abonnements</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['Id'])){
				$abonnement = $abonnementC->recupererabonnement($_POST['Id']);
				
		?>
        
        <form  action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="Id">Id :
                        </label>
                    </td>
                    <td><input type="number" name="Id" id="Id" value="<?php echo $abonnement['Id']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="DateDebut">DateDebut:
                        </label>
                    </td>
                    <td><input type="datetime-local" name="DateDebut" id="DateDebut" value="<?php echo $abonnement['DateDebut']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="DateFin">DateFin:
                        </label>
                    </td>
                    <td><input type="datetime-local" name="DateFin" id="DateFin" value="<?php echo $abonnement['DateFin']; ?>"></td>
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