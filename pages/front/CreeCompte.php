<?php
    include_once '../Model/User.php';
    include_once '../Controller/UserC.php';

    $error = "";

    // create adherent
    $user = null;

    // create an instance of the controller
    $userC = new UserC();
    if (
        isset($_POST["IdU"]) &&
		isset($_POST["Pseudo"]) &&
        isset($_POST["Email"]) &&		
        isset($_POST["Password"]) &&
		isset($_POST["Telephone"]) && 
        isset($_POST["CodePostale"]) &&
        isset($_POST["Ville"]) &&
        isset($_POST["DateInscription"])
    ) {
        if (
            !empty($_POST["IdU"]) && 
			!empty($_POST["Pseudo"]) &&
            !empty($_POST["Email"]) && 
			!empty($_POST["Password"]) && 
            !empty($_POST["Telephone"]) &&
            !empty($_POST["CodePostale"]) &&
            !empty($_POST["Ville"]) && 
            !empty($_POST["DateInscription"])
        ) {
            $user = new User(
                $_POST['IdU'],
				$_POST['Pseudo'],
                $_POST['Email'],
                $_POST['Password'], 
				$_POST['Telephone'],
                $_POST['CodePostale'],
                $_POST['Ville'],
                $_POST['DateInscription']
            );
            $userC->ajouterUser($user);
            header('Location:tableU.php');
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

				
						Member creation
					</span>
                  </p>
                  <form class="forms-sample" method="POST">
                    <div class="form-group">
                      <label for="IdU">Id</label>
                      <input type="number" class="form-control" name="IdU" id="IdU" placeholder="Id">
                    </div>
                    <div class="form-group">
                      <label for="Pseudo">Pseudo</label>
                      <input type="text" class="form-control" id="Pseudo" name="Pseudo" placeholder="Pseudo">
                    </div>
                    <div class="form-group">
                      <label for="Email">Email </label>
                      <input type="email" class="form-control" id="Email" name="Email"  placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="Password">Password</label>
                      <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="Telephone">Telephone</label>
                      <input type="number" class="form-control" id="Telephone" name="Telephone" placeholder="Telephone">
                    </div>
                    <div class="form-group">
                      <label for="CodePostale">CodePostale</label>
                      <input type="number" class="form-control" id="CodePostale" name="CodePostale"  placeholder="ZIP">
                    </div>
                    <div class="form-group">
                      <label for="Ville">Ville</label>
                      <input type="text" class="form-control" id="Ville" name="Ville" placeholder="Ville">
                    </div>
                    <div class="form-group">
                      <label for="DateInscription">Date d'inscription</label>
                      <input type="date" class="form-control" id="DateInscription" name="DateInscription" placeholder="date">
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
