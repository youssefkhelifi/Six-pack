<?php
	include '../controller/produitC.php';
	$produitC=new produitC();
	$listeproduits=$produitC->afficherproduit(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajouterproduit.php">Ajouter un produit</a></button>
		<center><h1>Liste des produits</h1></center>
		<table border="1" align="center">
			<tr>
			<th>idP</th>
				<th>nom</th>
				<th>prix</th>
				<th>quantité</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeproduits as $produit){
			?>
			<tr>
			<td><?php echo $produit['idP']; ?></td>
				<td><?php echo $produit['nom']; ?></td>
				<td><?php echo $produit['prix']; ?></td>
				<td><?php echo $produit['quantité']; ?></td>
				<td>
					<form method="POST" action="modifierproduit.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $produit['idP']; ?> name="idP">
					</form>
				</td>
				<td>
					<a href="supprimerproduit.php?id=<?php echo $produit['idP']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
