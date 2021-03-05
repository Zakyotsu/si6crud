<?php require 'vue/header.php'; ?>
    <div id='forms'>
      <div class='formElement'>
        <form action="controleur/principalClient.php" method="post">
            <legend>Choisissez une action pour les clients</legend>
            <select name="choix">
              <option value="create">Créer un nouveau client</option>
              <option value="read">Lire les informations d'un client</option>
              <option value="update">Modifier les informations d'un client</option>
              <option value="delete">Supprimer un client</option>
              <option value="liste">Afficher la liste des clients</option>
            </select>
            <input type="submit" value="OK" title="valider"/>
        </form>
      </div>

      <div class='formElement'>
        <form action="controleur/principalProduit.php" method="post"></form>
            <legend>Choisissez une action pour les produits</legend>
            <select name="choix">
              <option value="create">Créer un nouveau produit</option>
              <option value="read">Lire les informations d'un produit</option>
              <option value="update">Modifier les informations d'un produit</option>
              <option value="delete">Supprimer un produit</option>
              <option value="liste">Afficher la liste des produits</option>
            </select>
            <input type="submit" value="OK" title="validerProduit"/>
        </form>
      </div>
    </div>
    <br/>
    <hr/>
  </body>
</html>
