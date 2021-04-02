<?php
    session_cache_limiter('private_no_expire');
    session_start();
    // Connexion à la base de données
    require_once '../modele/connexion.php';

    //Liste de quelle table
    $table = $_SESSION['table'];

    if($table == 'client') {
        include '../modele/modeleClient.php';
    } else if($table == 'produit') {
        include '../modele/modeleProduit.php';
    }

    //On stocke le résultat dans la session
    $result=liste($cnx);
    $_SESSION['result'] = $result;

    include '../vue/vueListe.php';
    $cnx = null;
?>
