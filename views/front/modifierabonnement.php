<?php
    include_once '../model/abonnement.php';
    include_once '../controller/abonnementC.php';

    $error = "";

    // create adherent
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
                $_POST['Id'],
				$_POST['DateDebut'],
                $_POST['DateFin']
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>abonnement Display</title>
    
</head>
    <body>
        <button><a href="afficherListeabonnement.php">Retour à la liste des abonnements</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['Id'])){
				$abonnement = $abonnementC->recupererabonnement($_POST['Id']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="Id">Numéro abonnement:
                        </label>
                    </td>
                    <td><input type="number" name="Id" id="Id" value="<?php echo $abonnement['Id']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="DateDebut">DateDebut:
                        </label>
                    </td>
                    <td><input type="datetime-local" name="DateDebut" id="DateDebut" value="<?php echo $abonnement['DateDebut']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="DateFin">adresse mail:
                        </label>
                    </td>
                    <td><input type="datetime-local" name="DateFin" id="DateFin" value="<?php echo $abonnement['DateFin']; ?>" maxlength="30"></td>
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