<?php
require_once(__DIR__.'../../config/data.php');
// Necessaire pour l'authentification
require_once(__DIR__.'/globalCtrl.php');
$errorMsg = array();
//Permet de ne pas check les inputs d'enregistrement si l'utilisateur tente de s'authentifier et qu'il fait une erreur
if (empty($modalErrorMsg)) {
    //si il ne souhaite pas s'authentifier, alors on procede au verif
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //mail
        $userMail = trim(filter_input(INPUT_POST, 'userMail', FILTER_SANITIZE_EMAIL));
        if (empty($userMail)) {
            $errorMsg['userMailError'] = 'merci de remplir votre email.';
        } else {
            $userMailResult = filter_var($userMail, FILTER_VALIDATE_EMAIL);
            if (!$userMailResult) {
                $errorMsg['userMailError'] = 'email non valide.';
            }
        }
        //email check
        $userMailCheck = trim(filter_input(INPUT_POST, 'userMailCheck', FILTER_SANITIZE_EMAIL));
        if (empty($userMailCheck)) {
            $errorMsg['userMailCheckError'] = 'merci de remplir votre email de vérification.';
        } else {
            $userMailCheckResult = filter_var($userMail, FILTER_VALIDATE_EMAIL);
            if (!$userMailCheckResult) {
                $errorMsg['userMailCheckError'] = 'email non valide.';
            }
        }
        if (empty($errorMsg['userMailCheckError']) && empty($errorMsg['userMailError'])) {
            if ($userMailResult != $userMailCheckResult) {
                $errorMsg['userMailCheckError'] = 'Les 2 emails ne correspondent pas';
                $errorMsg['userMailError'] = 'Les 2 emails ne correspondent pas';
            }
        }
        //Téléphone
        $userMobilNumber = trim(filter_input(INPUT_POST, 'userMobilNumber', FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($userMobilNumber)) {
            $userMobilNumberResult = filter_var($userMobilNumber, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEX_PHONE.'/')));
            if ($userMobilNumberResult == FALSE) {
                $errorMsg['userMobilNumber'] = 'Numéro de téléphone incorrect';
            }
        }        
        //Civilité
        $civility = trim(filter_input(INPUT_POST, 'civility', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($civility)) {
            $errorMsg['civilityError'] = 'Merci de ne pas laisser ce champ vide.';
        
        } else {
            $civilityResult = filter_var($civility, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEX_CIVILITY.'/')));
            if (!$civilityResult) {
                $errorMsg['civilityError'] = 'Civilité incorrect';
            }
        }
        //firstname ( prénom )
        $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($firstname)) {
            $errorMsg['firstnameError'] = 'Merci de ne pas laisser votre prénom vide';
        } else {
            $firstnameResult = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEX_NAME.'/')));
            if (!$firstnameResult) {
                $errorMsg['firstnameError'] = 'Prénom incorrect';
            }
        }
        //lastname (nom)
        $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($lastname)) {
            $errorMsg['lastnameError'] = 'Merci de ne pas laisser votre prénom vide';
        
        } else {
            $lastnameResult = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEX_NAME.'/')));
            if (!$lastnameResult) {
                $errorMsg['lastnameError'] = 'Nom incorrect';
            }
        }
        //Country
        $country = trim(filter_input(INPUT_POST, 'country', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($country)) {
            $errorMsg['countryError'] = 'Merci de ne pas laisser "pays" vide';
        
        } elseif (!array_key_exists($country, $countriesArray)) {
            $errorMsg['countryError'] = 'Pays incorrect';
        }
        //Birthday
        $birthday = trim(filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_NUMBER_INT));
        if (empty($birthday)) {
            $errorMsg['birthdayError'] = 'Merci de ne pas laisser votre date d\'anniversaire vide';
        
        } else {
            $birthdayResult = filter_var($birthday, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEX_BIRTH.'/')));
            //si la date est supérieur à 100 ans dans le passé ou supérieur à aujourd'hui => Date incorrect
            if ($birthday < $minDateInput || $birthday > $todayInput) {
                $$errorMsg['birthdayError'] = 'Date incorrect';
            }
        }
        //Adresse
        $userAdress = trim(filter_input(INPUT_POST, 'userAdress', FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($userAdress)) {
            $userAdressResult = filter_var($userAdress, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEX_ADRESS.'/')));
            if ($userAdressResult == FALSE) {
                $errorMsg['userAdressError'] = 'Adresse incorrect';
            }
        }
        //Complément d'adresse
        $userAdressComplete = trim(filter_input(INPUT_POST, 'userAdressComplete', FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($userAdressComplete)) {
            $userAdressCompleteResult = filter_var($userAdressComplete, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEX_ADRESS_COMPL.'/')));
            if ($userAdressCompleteResult == FALSE) {
                $errorMsg['userAdressCompleteError'] = 'Adresse incorrect';
            }
        }
        //pw
        if (empty($_POST['userPw'])) {
            $errorMsg['userPwError'] = 'merci de remplir votre mot de passe.';
        } else {
            $userPw = $_POST['userPw'];
        }
        //pw check
        if (empty($_POST['userPwCheck'])) {
            $errorMsg['userPwCheckError'] = 'merci de remplir votre email de vérification.';
        } else {
            $userPwCheck = $_POST['userPwCheck'];
        }
        //Controle de valeur des 2 mdp
        if (empty($errorMsg['userPwError']) && empty($errorMsg['userPwCheck'])) {
            if ($userPw != $userPwCheck) {
                $errorMsg['userPwError'] = 'Les 2 mots de passe ne correspondent pas';
                $errorMsg['userPwCheckError'] = 'Les 2 mots de passe ne correspondent pas';
            }
        }
    }
}

include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/templates/nav.php');
include(__DIR__.'/../views/register.php');
include(__DIR__.'/../views/templates/footer.php');