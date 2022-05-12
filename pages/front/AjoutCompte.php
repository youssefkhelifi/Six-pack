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
            header('Location:afficherListeusers.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
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

				<form class="forms-sample" method="POST">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="mail" name="Email"  id="Email"   placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="Password" id="Password"  placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
            <input type="submit" value="Ajouter"> 
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							 <a href="http://localhost:7882/demo/site2/front/CreeCompte.php">Cree votre compte</a>
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
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