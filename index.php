<?php
	
	include('includes/constantes.inc');
	include('includes/functions.inc');
	include_once('includes/header.inc');

    // -- Gestion du traitement du formulaire et son affichage

    if ($_POST === []) {
		require 'form.php';
		} else {
		$firstname = valeur_saisie($_POST['firstname']);
		$lastname = valeur_saisie($_POST['lastname']);
		$telephone = valeur_saisie($_POST['telephone']);
		$dateachat = valeur_saisie($_POST['dateachat']);
		

		if (isset($_POST['errors']) && $_POST['errors']) {
			header("location: form.php");
			} else {
				calculRate();
		}
	}

    
    include_once('includes/footer.inc');
?>