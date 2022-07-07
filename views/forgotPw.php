<main>
    <h3>Mot de passe oublié</h3>
    <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" novalidate>
        <label for="pwToMail">Entrer l'email utilisé pour vous enregistrer</label>
        <input type="email" name="pwToMail" id="pwToMail" placeholder="votre email" value="<?=(!empty($pwToMail))?$pwToMail:''?>">
        <span>Obligatoire <span class="redTxt"><?= (!empty($forgotPwErrorMsg['pwToMail']))? $forgotPwErrorMsg['pwToMail'] : ''?></span></span>
        <button type="submit">Envoyer</button>
    </form>    
</main> 