<!-- modal event -->
<div id="modal">
    <div id="modalContent">
        <span id="closeModal">&times;</span>
        <div id="insideModal">
            <h3>Se connecter</h3>
            <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" novalidate>
                <label for="connectId">mail :</label>
                <input type="email" name="connectId" id="connectId" placeholder="Votre identifiant" value="<?=(!empty($connectId))?$connectId:''?>">
                <span>Obligatoire <span class="redTxt"><?= (!empty($modalErrorMsg['connectId']))? $modalErrorMsg['connectId'] : ''?></span></span>
                <label for="connectPw">Mot de passe :</label>
                <input type="password" name="connectPw" id="connectPw" placeholder="Votre mot de passe">
                <span>Obligatoire <span class="redTxt"><?= (!empty($modalErrorMsg['connectPw']))? $modalErrorMsg['connectPw'] : ''?></span></span>
                <button type="submit">Connexion</button>
                <a href="forgotPwCtrl.php" class="smallSpan">mot de passe oublié ?</a>
            </form>
        </div>
    </div>
</div>
<script>
    modal.style.display = '<?=!empty($modalAuthHasToBeDraw)?$modalAuthHasToBeDraw:'none'?>';
</script>