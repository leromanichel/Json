<?php
include 'header.php';

/**
 * API de vol d'avion
 * 
 * API permettant l'affichage, l'ajout, la modification et la suppression d'un vol
 * 
 * @author Valérian Touzard
 * @author Kristopher Planque
 * @author Ugo Pénet
 */

//Requete en triant par ville de départ, ville de destination, date, nombre d'heures et prix
if ( !empty($_POST["ville_depart"]) && !empty($_POST["ville_destination"]) && !empty($_POST["date"]) && !empty($_POST["nb_heure"]) && !empty($_POST["prix"]) ) {
    if (intval($_POST["prix"]) > 0) { //(intval convertit en entier) ce IF sert de test pour vérifier qu'on rentre de bonnes données dans "prix"
		$requete = $pdo->prepare("INSERT INTO `vols` (`id`, /* On donne les champs à remplir de la BDD */
													`ville_depart`, 
													`ville_destination`, 
													`date_depart`, 
													`nb_heure_vol`, 
													`prix`) VALUES (NULL, /* Et on y rentre ces valeurs (qui ne valent rien encore) */
																	:ville1, 
																	:ville2, 
																	:date_vol, 
																	:nb, 
																	:prix); ");

		// C'est ici qu'on vient attribuer aux valeurs juste au dessus les valeurs des $_POST														
		$requete->bindParam(':ville1', $_POST["ville_depart"]);
		$requete->bindParam(':ville2', $_POST["ville_destination"]);
		$requete->bindParam(':date_vol', $_POST["date"]);
		$requete->bindParam(':nb', $_POST["nb_heure"]);
		$requete->bindParam(':prix', $_POST["prix"]);
		$requete->execute();

		// retour_json(true,"Le vol a bien été ajouté");
		EncodageJson();

	} else {
		retour_json(false,"Le prix n'est pas correct.");
	}

} else {
	retour_json(false,"Il manque des infos.");
}

?>