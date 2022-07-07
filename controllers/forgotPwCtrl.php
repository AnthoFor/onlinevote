<?php
// Necessaire pour l'authentification
require_once(__DIR__.'/globalCtrl.php');
if (empty($modalAuthHasToBeDraw) || $modalAuthHasToBeDraw == 'none') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //mail
        $pwToMail = trim(filter_input(INPUT_POST, 'pwToMail', FILTER_SANITIZE_EMAIL));
        if (empty($pwToMail)) {
            $forgotPwErrorMsg['pwToMail'] = 'merci de remplir votre email.';
        } else {
            $pwToMailResult = filter_var($pwToMail, FILTER_VALIDATE_EMAIL);
            if (!$pwToMailResult) {
                $forgotPwErrorMsg['pwToMail'] = 'email non valide.';
            }
        }
        if (empty($forgotPwErrorMsg)) {
            $whatModalShouldShow = '<form action="homeCtrl.php">
                                    <span class="specialSpan">Un email de recupération vient d\'etre envoyé à <strong>'. $pwToMail. '</strong>. 
                                    <br>Merci de vérifier vos mails.</span> 
                                    <br><br> 
                                    <button type="submit" class="closeMe">Fermer</button>';
            $confHasToBeDraw = 'block';
            $drawCloseModal = '<span id="closeModal"></span>';
            // header("Refresh:5 url=boardCtrl.php");
        }
    }
}
include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/templates/nav.php');
include(__DIR__.'/../views/forgotPw.php');
include(__DIR__.'/../views/templates/footer.php');