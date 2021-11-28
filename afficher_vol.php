<?php
include 'header.php'; // Test de connection a la BDD

/**
 * API de vol d'avion
 * 
 * API permettant l'affichage, l'ajout, la modification et la suppression d'un vol
 * 
 * @author Valérian Touzard
 * @author Kristopher Planque
 * @author Ugo Pénet
 */

//Requete en triant par ville de départ
if (!empty($_POST["ville_depart"])) {
    $requete = $pdo->prepare("SELECT * FROM `vols` WHERE `ville_depart` LIKE :v");
    $requete->bindParam(':v', $_POST["ville_depart"]);
    $requete->execute();
}else{
    // Si aucune ville saisie par l'utilisateur, affiche tout les vols par défaut
    $requete = $pdo->prepare("SELECT * FROM `vols`");
    $requete->execute();
}

$resultat = $requete->fetchAll(); // recupere toutes les donnée y compris leur indice (ce qui créé un doublon)

$results["nb"] = count($resultat); // Affiche le nombre de vol
$results["results"]["vols"] = $resultat; // Affiche la description de chaque vol

retour_json(true,"Voici les vols", $results);
?>