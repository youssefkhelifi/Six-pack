<?php
	include '../controller/categorieC.php';
	$categorieC=new categorieC();
	$listecategories=$categorieC->affichercategorie(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajoutercategorie.php">Ajouter une categorie</a></button>
		<center><h1>Liste des categories</h1></center>
		<table border="1" align="center">
			<tr>
			<th>id</th>
				<th>sexe</th>
				<th>type_produit</th>
				<th>taille</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listecategories as $categorie){
			?>
			<tr>
			<td><?php echo $categorie['id']; ?></td>
				<td><?php echo $categorie['sexe']; ?></td>
				<td><?php echo $categorie['type_produit']; ?></td>
				<td><?php echo $categorie['taille']; ?></td>
				<td>
					<form method="POST" action="modifiercategorie.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $categorie['id']; ?> name="id">
					</form>
				</td>
				<td>
					<a href="supprimercategorie.php?id=<?php echo $categorie['id']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
