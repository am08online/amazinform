<?php

// -- fichiers de fonctions utiles


function recuperer_donnee_saisie(string $saisie): string
{
    $saisie = isset($_POST['saisie']) ? $_POST['saisie'] : "";
    return $saisie;
}


/**	fonction à appeler uniquement sur des données GPC,
 * pour ne pas risquer d'enlever des caractères d'échappement
 * qui ne sont pas liés à un encodage "magic quotes"
 */

function supprimer_encodage_MQ(string $valeur): string
{
    //Si magic_quotes_gps=on, retourner la valeur après suppression de l'encodage
    // ==> appel à stripslashes, sinon retourner la valeur
    // Deprecated Function : get_magic_quotes_gpc() is deprecated
    return (get_magic_quotes_gpc()) ? stripeslashes($valeur) : $valeur;
}


function valeur_saisie(string $valeur): string
{
    return supprimer_encodage_MQ(trim($valeur));
}



function vers_formulaire($valeur): string
{
    // Affichage dans un formulaire
    // Encoder tous les caractères HTML spéciaux
    // ENT_QUOTES: dont " et '	
    return htmlentities($valeur, ENT_QUOTES);
}



function vers_page($valeur): string
{
    // Affichage direct dans une page
    // 1. Encode tous les caractères HTML spéciaux
    // ENT_QUOTES: dont " et '	
    // 2. transforme les sauts de ligne en <BR>
    return nl2br(htmlentities($valeur, ENT_QUOTES));
}




function rating(string $score): string
{
    // Calcul du score
    $score = 0;
    for ($i = 0; $i < 3; $i++) {
        $score += $_POST['question' . $i];
    }

    // Affichage visuel et proportionnel du résultat final sous forme 
    // "Nombre d'étoiles", le nombre d'étoiles représente le nombre de points cumulés.
    $rate = '';
    for ($i = 0; $i < $_POST['result']; $i++) {
        $rate .= "⭐";
    }

    // Valable seulement pour notre projet (avec un nombre réduit de questions, 
    // mais une généralisation est à envisager et à faire ici)
    // if ($score > SCORE_MAX) $score = SCORE_MAX;
    $i = $_POST['result'] === "6" ? SCORE_MAX  : $_POST['result'];   // ( rmax=2*$nbq=2*3=6 ==> $i<=SCORE_MAX=5 )
    while ($i < SCORE_MAX) {
        $rate .= "⚫";
        $i++;
    }
    return $rate;
}
