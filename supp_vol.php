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

if(!empty($_POST["id"])){
	if(intval($_POST["id"]) > 0){
		$requete = $pdo->prepare("DELETE FROM `vols` WHERE `id` LIKE :id");
		$requete->bindParam(':id', $_POST["id"]);
		$requete->execute();

		// retour_json(true,"Le vol a bien été supprimer");
		EncodageJson();

	}else {
		retour_json(false,"L'id saisi est incorrect");
	}
} else {
		retour_json(false,"Il vous faut saisir un id");
}



?>