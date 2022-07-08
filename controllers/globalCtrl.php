<!-- Traitement de l'authentification -->
<?php 
$modalErrorMsg = array();
//Exeption pour ne pas executer le code si on est sur la page registerCtrl ou si on est sur la page forgotPwCtrl
if (empty($errorMsg)) {
    if (empty($_POST['pwToMail'])) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $connectId = trim(filter_input(INPUT_POST, 'connectId', FILTER_SANITIZE_EMAIL));
            $connectPw = $_POST['connectPw'];
            if (empty($connectId)) {
                $modalErrorMsg['connectId'] = 'merci de remplir votre identifiant.';
            } else {
                $connectIdResult = filter_var($connectId, FILTER_VALIDATE_EMAIL);
                if (!$connectIdResult) {
                    $modalErrorMsg['connectId'] = 'L\'identifiant ne correspond pas à un mail';
                }
            }
            if (empty($connectPw)) {
                $modalErrorMsg['connectPw'] = 'merci de remplir votre mot de passe.';
            }
            if (empty($modalErrorMsg)) {
                $modalAuthHasToBeDraw = 'none';
                header("Refresh:0 url=boardCtrl.php");
            } else {
                $modalAuthHasToBeDraw = 'block';
            }    
        }
    }
}



