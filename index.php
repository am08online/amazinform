<?php
include('view/includes/constantes.inc.php');
include('view/includes/functions.inc.php');
include_once('view/includes/header.inc.php');

require 'checkDatasForm.php';

// -- Gestion du traitement du formulaire et son affichage

if ($_POST === []) {
	require 'view/form.php';
} else {
	$firstname = valeur_saisie($_POST['firstname']);
	$lastname  = valeur_saisie($_POST['lastname']);
	$phone     = valeur_saisie($_POST['tel']);
	$dateachat = valeur_saisie($_POST['dateachat']);
	
	$error = checkDatasForm($_POST);
	if ($error !== []) {
		header("location: 'view/form.php");
	} else {



		/**** (- Partie à améliorer et à mettre dans une fonction dans le dossier conroller et l'appeler ici.)
		 * 
		 * L'affichage du nombre d'étoiles et de points noires avec le système de pondération "R201"
		 * est plus naturel, intuitif et proche de la logique métier. Il se fait en  fonction du score total 
		 * et dépend des réponses du client et du nombre de questions posées à ce dernier. 
		 * Système de pondération "R201": Oui(2pts), Non(0pts), SAV(1pt). 
		 *
		 * On a toujours cette inégalité qui est vérifiée: 
		 * ($rmin=0<=$r<=$rmax=2*$nbtq), où $nbtq = nombre total de questions du questionnaire. 
		 * Les réponses aux questions sont obligatoires (required). Cet affichage obéit à une loi 
		 * d'échelle de proportionnalité(scalabilité),
		 * La seule contrainte à respecter est que l'affichage graphique de l'avis ne doit comporter 
		 * ni plus de 5 étoiles, ni plus de 5 points noires. Cette partie est perfectible et reste donc à améliorer.
		 *****/
	
	
	
		// Calcul du score
	$score = 0;
	for ($i = 0; $i < 3; $i++) {
		$score += $_POST['question' . $i];
	}

	// Affichage visuel et proportionnel du résultat final sous forme 
	// "Nombre d'étoiles", le nombre d'étoiles représente le nombre de points cumulés.
	$rate = '';
	for ($i = 0; $i < $score; $i++) {
		$rate .= "⭐";
	}

	// Valable seulement pour notre projet (avec un nombre réduit de questions, 
	// mais une généralisation est à envisager et à faire ici)
	// if ($score > SCORE_MAX) $score = SCORE_MAX;
	$i = ($score === "6") ? SCORE_MAX  : $score;   // ( rmax=2*$nbq=2*3=6 ==> $i<=SCORE_MAX=5 )
	while ($i < SCORE_MAX) {
		$rate .= "⚫";
		$i++;
	}
	return $rate;

	echo "<div>Merci pour votre notation. <br> <a href='index.php'>Accueil</a></div><br>";
	
	<p>Merci pour votre notation : <?= rating($score]); ?></p> 

<?php
if ($_POST['question3'] === '0' && isset($_POST['recall'])) {
    echo 'Vous serez rapellé au : ' . $_POST['tel'];
}
}

include_once('view/includes/footer.inc.php');