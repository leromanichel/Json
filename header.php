<?php
header('Content-Type: application/json'); // Spécifie a php que l'on veux des donnée en json lors de l'affichage

/**
 * API de vol d'avion
 * 
 * API permettant l'affichage, l'ajout, la modification et la suppression d'un vol
 * 
 * @author Valérian Touzard
 * @author Kristopher Planque
 * @author Ugo Pénet
 */

// Test de la connection de la BDD et retourne un message en json
try {
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=JSON;', 'root', '');
    $retour["success"] = true;
    $retour["message"] = "Connexion à la BDD établie";
} catch (Exception $e) {
    retour_json(false,"Connexion à la BDD échoué");
}


// Retourne un message en json pour dire si réussite ou echec d'une requête
function retour_json(bool $success, String $msg, $results=NULL){
    $retour["success"] = $success;
    $retour["message"] = $msg;
    $retour["results"] = $results; // Ligne pas obligatoire, mais c'est mieux de quand même rendre qqch plutôt que rien

    echo json_encode($retour);
}
function EncodageJson(){    
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=JSON;', 'root', '');
    $requete = $pdo->prepare("SELECT * FROM `vols`");
    $requete->execute();
    $resultat = $requete->fetchAll();
    $resultatJson = json_encode($resultat,JSON_PRETTY_PRINT);
    file_put_contents("vols.json",$resultatJson);
}
?>