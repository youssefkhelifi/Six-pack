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
            $abonnementC->ajouterabonnement($abonnement);
            header('Location:tableabonnement.php');
        }
        else
            $error = "Missing information";
    }

    
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>Creation du compte V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<body>
 
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				
						Creation Abonnement
					</span>
                  </p>
                  <form class="forms-sample" method="POST">
                    <div class="form-group">
                      <label for="Id">Id</label>
                      <input type="number" class="form-control" name="Id" id="Id" placeholder="Id">
                    </div>
                    <div class="form-group">
                      <label for="DateDebut	">Date Debut</label>
                      <input type="datetime-local" class="form-control" id="DateDebut	" name="DateDebut	" placeholder="DateDebut	">
                    </div>
                    <div class="form-group">
                      <label for="DateFin">DateFin </label>
                      <input type="datetime-local" class="form-control" id="DateFin" name="DateFin"  placeholder="DateFin">
                    </div>
                  
                    <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        J'AI LU ET COMPRIS LA POLITIQUE DE CONFIDENTIALITÉ ET EN MATIÈRE DE COOKIES.
                      </label>
                    </div>
                    <button type="submit" class="btn btn-primary me-2" value="ajouter">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
           
       <!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>

</html>
