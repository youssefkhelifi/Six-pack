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
            $userC->modifieruser($user, $_POST["IdU"]);
            header('Location:tableU.php');
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
        <button><a href="afficherListeUsers.php">Retour à la liste des users</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['IdU'])){
				$user = $userC->recupereruser($_POST['IdU']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="IdU">Numéro User:
                        </label>
                    </td>
                    <td><input type="number" name="IdU" id="IdU" value="<?php echo $user['IdU']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="Pseudo">Pseudo:
                        </label>
                    </td>
                    <td><input type="text" name="Pseudo" id="Pseudo" value="<?php echo $user['Pseudo']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Email">adresse mail:
                        </label>
                    </td>
                    <td><input type="email" name="Email" id="Email" value="<?php echo $user['Email']; ?>" maxlength="30"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Password">Password:
                        </label>
                    </td>
                    <td>
                        <input type="password" name="Password" id="Password" value="<?php echo $user['Password']; ?>" maxlength="30">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Telephone">telephone:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="Telephone" id="Telephone" value="<?php echo $user['Telephone']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="CodePostale">Code Postale:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="CodePostale" id="CodePostale" value="<?php echo $user['CodePostale']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Ville">Ville:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="Ville" id="Ville" value="<?php echo $user['Ville']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="DateInscription">Date d'inscription:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="DateInscription" id="DateInscription" value="<?php echo $user['DateInscription']; ?>">
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
    </body>
</html>