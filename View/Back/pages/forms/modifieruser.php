<?php
    include_once '../Model/User.php';
    include_once '../Controller/UserC.php';

    $error = "";

    // create adherent
    $user = null;

    // create an instance of the controller
    $userC = new UserC();
    if (
        isset($_POST["id"]) &&
		isset($_POST["name"]) &&
        isset($_POST["email"]) &&		
        isset($_POST["password"]) &&
		isset($_POST["user_type"]) && 
        isset($_POST["image"]) &&
        isset($_POST["etat"]) 
    ) {
        if (
            !empty($_POST["id"]) && 
			!empty($_POST["name"]) &&
            !empty($_POST["email"]) && 
			!empty($_POST["password"]) && 
            !empty($_POST["user_type"]) &&
            !empty($_POST["image"]) &&
            !empty($_POST["etat"]) 
        ) {
            $user = new User(
                $_POST['id'],
				$_POST['name'],
                $_POST['email'],
                $_POST['password'], 
				$_POST['user_type'],
                $_POST['image'],
                $_POST['etat']
            );
            $userC->modifieruser($user, $_POST["id"]);
            header('Location:afficherListeUsers.php');
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
			if (isset($_POST['id'])){
				$user = $userC->recupereruser($_POST['id']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
				<tr>
                    <td>
                        <label for="name">name:
                        </label>
                    </td>
                    <td><input type="text" name="name" id="name" value="<?php echo $user['name']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="email">adresse mail:
                        </label>
                    </td>
                    <td><input type="email" name="email" id="email" value="<?php echo $user['email']; ?>" maxlength="30"></td>
                </tr>
                <tr>
                    <td>
                        <label for="password">password:
                        </label>
                    </td>
                    <td>
                        <input type="password" name="password" id="password" value="<?php echo $user['password']; ?>" maxlength="30">
                    </td>
                </tr>
                <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
                <tr>
                    <td>
                        <label for="image">votre image:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="image" id="image" value="<?php echo $user['image']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="etat">etat:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="etat" id="etat" value="<?php echo $user['etat']; ?>">
                    </td>
                </tr>
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