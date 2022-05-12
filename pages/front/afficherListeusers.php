<?php
	include '../Controller/UserC.php';
	$userC=new UserC();
	$listeUsers=$userC->afficheruser(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="AjouterUser.php">Ajouter user</a></button>
		<center><h1>Liste des users</h1></center>
		<table border="1" align="center">
			<tr>
				<th>IdU</th>
				<th>Pseudo</th>
                <th>Email</th>
				<th>Password</th>
				<th>Telephone</th>
				<th>CodePostale</th>
                <th>Ville</th>
				<th>DateInscription</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeUsers as $user){
			?>
			<tr>
				<td><?php echo $user['IdU']; ?></td>
				<td><?php echo $user['Pseudo']; ?></td>
				<td><?php echo $user['Email']; ?></td>
				<td><?php echo $user['Password']; ?></td>
				<td><?php echo $user['Telephone']; ?></td>
                <td><?php echo $user['CodePostale']; ?></td>
                <td><?php echo $user['Ville']; ?></td>
				<td><?php echo $user['DateInscription']; ?></td>
				<td>
					<form method="POST" action="modifieruser.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $user['IdU']; ?> name="IdU">
					</form>
				</td>
				<td>
					<a href="supprimeruser.php?IdU=<?php echo $user['IdU']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
