<?php
/**
 * API de vol d'avion
 * 
 * API permettant l'affichage, l'ajout, la modification et la suppression d'un vol
 * 
 * @author Valérian Touzard
 * @author Kristopher Planque
 * @author Ugo Pénet
 */

include 'header.php';

//Requete en triant par ville de départ
if (!empty($_POST["id"]) && !empty($_POST["ville_depart"]) && !empty($_POST["ville_destination"]) && !empty($_POST["date_depart"]) && !empty($_POST["nb_heure_vol"]) && !empty($_POST["prix"])) {
    if (intval($_POST["id"]) > 0 || intval($_POST["prix"])) {


        $requete = $pdo->prepare("UPDATE `vols` SET `ville_depart` = :ville1,
                                                    `ville_destination` = :ville2,
                                                    `date_depart` = :date1,
                                                    `nb_heure_vol` = :nb,
                                                    `prix` = :prix WHERE `id` = :id");
        $requete->bindParam(':id', $_POST["id"]);
        $requete->bindParam(':ville1', $_POST["ville_depart"]);
        $requete->bindParam(':ville2', $_POST["ville_destination"]);
        $requete->bindParam(':date1', $_POST["date_depart"]);
        $requete->bindParam(':nb', $_POST["nb_heure_vol"]);
        $requete->bindParam(':prix', $_POST["prix"]);
        $requete->execute();
    
    
        // retour_json(true,"Modification Effectuer");
        EncodageJson();
    }else {
        retour_json(false,"un des paramètre est invalide");
    }
}else{
    retour_json(false,"Il manque des informations");
}
?>