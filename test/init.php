<?php
// Connexion à la base de données
require_once '../modele/connexion.php';
// Appel du modèle de la table clients
include '../modele/modeleClient.php';
$resultat = initClicom($cnx);
if ($resultat != 0) echo "base clicom initialisée";
else echo "Une erreur est survenue";
// Fermeture de la base
$cnx = null;
?>
