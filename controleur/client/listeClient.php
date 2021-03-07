<?php
session_cache_limiter('private_no_expire');
session_start();
// Connexion à la base de données
require_once '../modele/connexion.php';
// Appel du modèle pour récupérer les clients dans la base
include '../modele/modeleClient.php';
$result=listeClients($cnx);
$_SESSION['result'] = $result;
// Appel de la vue pour afficher les résultats
include '../vue/vueListeClients.php';
// Fermeture de la base
$cnx = null;
?>
