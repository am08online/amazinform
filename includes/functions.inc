<?php

// -- fichiers de fonctions utiles


function recuperer_donnee_saisie(string $saisie):string {
    $saisie = isset($_POST['saisie'])?$_POST['saisie']: "";    
    return $saisie;
}


/**	fonction à appeler uniquement sur des données GPC,
  * pour ne pas risquer d'enlever des caractères d'échappement
  * qui ne sont pas lié à un encodage "magic quotes"
  */
	
function supprimer_encodage_MQ(string $valeur) : string {
    //Si magic_quotes_gps=on, retourner la valeur après suppression de l'encodage
	// ==> appel à stripslashes, sinon retourner la valeur
    return (get_magic_quotes_gpc())?stripeslashes($valeur):$valeur;
}


function valeur_saisie(string $valeur): string { 
    return supprimer_encodage_MQ(trim($valeur));
}



function vers_formulaire($valeur): string {
	// Affichage dans un formulaire
	// Encoder tous les caractères HTML spéciaux
	// ENT_QUOTES: dont " et '	
    return htmlentities($valeur, ENT_QUOTES);
}



function vers_page($valeur): string {
	// Affichage direct dans une page
	// 1. Encode tous les caractères HTML spéciaux
	// ENT_QUOTES: dont " et '	
	// 2. transforme les sauts de ligne en <BR>
    return nl2br(htmlentities($valeur, ENT_QUOTES));
}


function calculRate(string $score): string {
    if ($score === '-1') $score = '0';
	
    $score = round($score / 7 * 5);

    $rate = '';
    for ($i = 1; $i <= $score; $i++) {
        $rate .= '⭐';
    }
    for ($i = $score + 1; $i <= 5; $i++) {
        $rate .= '⚫';
    }
    return $rate;
}

?>