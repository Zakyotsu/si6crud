<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
    <title>PROJET CRUD</title>
  </head>
  <body>
    <h1>Liste des produits</h1> 
    <input type="button" value="Retour à l'accueil" onClick="document.location.href='../index.html'" />
	<?php  foreach ($result as $produit) {
				echo '<hr/>';
				foreach ($produit as $key => $value) {
					echo "<pre> $key : $value </pre>";
				}
			}
	?>
    <hr/>
  </body>
</html>
