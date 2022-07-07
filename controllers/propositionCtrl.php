<?php
require_once(__DIR__.'../../config/data.php');
$propErrorMsg = array();
// Traitement du formulaire de proposition de référendums
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //La question
    $propQuestion = trim(filter_input(INPUT_POST, 'propQuestion', FILTER_SANITIZE_SPECIAL_CHARS));    
    if (empty($propQuestion)) {
        $propErrorMsg['propQuestion'] = 'Merci de ne pas laisser ce champ vide.';
    } else {
        $propQuestionResult = filter_var($propQuestion, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEX_TEXTAREA.'/')));
        if (!$propQuestionResult) {
            $propErrorMsg['propQuestion'] = 'Veuillez ne pas utiliser de caractères spéciaux';
        }
    }
    //la description
    $propDescription = trim(filter_input(INPUT_POST, 'propDescription', FILTER_SANITIZE_SPECIAL_CHARS));
    // Optionnel, donc pas de check empty et $propDescription est sanitized.
    if (!empty($propDescription)) {
        $propDescriptionResult = filter_var($propDescription, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEX_TEXTAREA.'/')));
        if (!$propDescriptionResult) {
            $propErrorMsg['propDescription'] = 'Veuillez ne pas utiliser de caractères spéciaux';
        }
    }
    //Si ya pas d'erreur alors... ->
    if (empty($propErrorMsg)) {
        $whatModalShouldShow = 'Votre proposition à bien été pris en compte. </br> Vous allez etre redirigé automatiquement';
        $confHasToBeDraw = 'block';
        $drawCloseModal = '<span id="closeModal">&times;</span>';
        header("Refresh:5 url=boardCtrl.php");
    }
    // Affichage de la modal de confirmation 
}


include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/templates/navConnected.php');
include(__DIR__.'/../views/proposition.php');
include(__DIR__.'/../views/templates/footer.php');