<?php
	include '../Controller/abonnementC.php';
	$abonnementC=new abonnementC();
	$listeabonnement=$abonnementC->afficherabonnement(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajouterabonnement.php">Ajouter abonnement</a></button>
		<center><h1>Liste des abonnements</h1></center>
		<table border="1" align="center">
			<tr>
				<th>Id</th>
				<th>Date Debut</th>
                <th>Date Fin</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeabonnement as $abonnement){
			?>
			<tr>
				<td><?php echo $abonnement['Id']; ?></td>
				<td><?php echo $abonnement['DateDebut']; ?></td>
				<td><?php echo $abonnement['DateFin']; ?></td>
				<td>
					<form method="POST" action="modifierabonnement.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $abonnement['Id']; ?> name="Id">
					</form>
				</td>
				<td>
					<a href="supprimerabonnement.php?Id=<?php echo $abonnement['Id']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
