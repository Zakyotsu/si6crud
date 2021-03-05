<?php
session_cache_limiter('private_no_expire');
session_start();
// Connexion à la base de données
require_once '../modele/connexion.php';
// Appel du modèle pour récupérer les produits dans la base
include '../modele/modeleProduit.php';
$result=listeProduits($cnx);
$_SESSION['result'] = $result;
// Appel de la vue pour afficher les résultats
include '../vue/vueListeProduits.php';
// Fermeture de la base
$cnx = null;
?>
