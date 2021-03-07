<?php
    session_cache_limiter('private_no_expire');
    session_start();
    // Connexion à la base de données
    require_once '../modele/connexion.php';

    $table = $_SESSION['table'];

    if($table == 'client') {
        include '../modele/modeleClient.php';
    } else if($table == 'produit') {
        include '../modele/modeleProduit.php';
    }

    $result=liste($pdo);
    $_SESSION['result'] = $result;

    include '../vue/vueListe.php';
    $pdo = null;
?>
