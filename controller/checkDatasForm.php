<?php
//  ici, j'ai repris  la correction: 
// tous les contrôles données utilisateurs se font ici pour valisation du formulaire.

function checkDataForm(array $post): array
{
    $messageError = [];

    if ($post['lastname'] === "" || strlen($post['lastname']) < 2) {
        $messageError['lastname'] = "Ce champs doit contenir au moins deux caractères";
    }

    if ($post['firstname'] === "" || strlen($post['firstname']) < 2) {
        $messageError['firstname'] = "Ce champs doit contenir au moins de ux caractères";
    }

    if (!preg_match('#^0[0-79][0-9]{8}$#', $post['phone'])) {
        $messageError['phone'] = "La saisie n'a pas le format d'un numéro de téléphone.";
    }

    if (!preg_match('#202[0-9]-[0-1][0-9]-[0-3][0-9]$#', $post['date'])) {
        $messageError['date'] = "La saisie n'a pas le format d'une date.";
    }

    if ($post['date'] > date('Y-m-d')) {
        $messageError['date'] = "La date ne peut être postérieure à aujourd'hui.";
    }


    for ($i = 1; $i <= 3; $i++) {
        if (!isset($post['question' . $i])) {
            $messageError['question' . $i] = "La réponse à cette question est obligatoire";
        }
    }

    if (isset($post['question1']) && !in_array($post['question1'], ['2', '1', '0'], true)) {
        $messageError['question1'] = "La réponse à cette question est obligatoire";
    }

    if (isset($post['question2']) && !in_array($post['question2'], ['2', '1', '0'], true)) {
        $messageError['question2'] = "La réponse à cette question est obligatoire";
    }

    if (isset($post['question3']) && !in_array($post['question3'], ['2', '0'], true)) {
        $messageError['question3'] = "La réponse à cette question est obligatoire";
    }

    if (!is_string($post['message'])) {
        $messageError['message'] = "Un problème est survenu avec ce champs";
    }

    if (isset($post['recall']) && $post['recall'] !== 'true') {
        $messageError['recall'] = "Un problème est survenu avec ce champs";
    }

    return $messageError;
}
