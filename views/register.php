<main>
        <h2 class="boardTitle">Inscription</h2>
        <!-- Formulaire d'inscription -->
        <form method="POST" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" novalidate>
            <!-- Mail -->
            <fieldset>
                <legend>Mail</legend>
                <label for="userMail">Email</label>
                <input type="email" name="userMail" id="userMail" placeholder="jeandupont@gmail.com" value="<?=(!empty($userMail))?$userMail:''?>" required>
                <span>Obligatoire <span class="redTxt"><?= (!empty($errorMsg['userMailError']))? $errorMsg['userMailError'] : ''?></span></span>
                <label for="userMailCheck">Confirmation de l'email</label>
                <input type="email" name="userMailCheck" id="userMailCheck" placeholder="jeandupont@gmail.com" value="<?=(!empty($userMailCheck))?$userMailCheck:''?>" required>
                <span>Obligatoire <span class="redTxt"><?= (!empty($errorMsg['userMailCheckError']))? $errorMsg['userMailCheckError'] : ''?></span></span>
            </fieldset>
            <!-- Téléphone -->
            <fieldset>
                <legend>Téléphone</legend>
                <label for="userMobilNumber">Numéro</label>
                <input type="tel" name="userMobilNumber" id="userMobilNumber" placeholder="0601020304" value="<?=(!empty($userMobilNumber))?$userMobilNumber:''?>" pattern="<?=REGEX_PHONE?>">
                <span>Optionnel <span class="redTxt"><?= (!empty($errorMsg['userMobilNumber']))? $errorMsg['userMobilNumber'] : ''?></span></span>
            </fieldset>
            <!-- Identité -->
            <fieldset>
                <legend>Identité</legend>
                
                <label for="civility">Civilité :</label>
                <select name="civility" id="civility" required>
                    <option value="" <?=(empty($civility))?'selected':'' ?>>Selectionner votre civilité :</option>
                    <option value="Mr" <?=(!empty($civility)&& $civility == 'Mr')?'selected':'' ?>>Monsieur</option>
                    <option value="Mme" <?=(!empty($civility)&& $civility == 'Mme')?'selected':'' ?>>Madame</option>
                </select>                
                <span>Obligatoire <span class="redTxt"><?= (!empty($errorMsg['civilityError']))? $errorMsg['civilityError'] : ''?></span></span>
                
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname" placeholder="Jean" value="<?=(!empty($firstname))?$firstname:'' ?>" pattern="<?=REGEX_NAME?>" required>
                <span>Obligatoire <span class="redTxt"><?= (!empty($errorMsg['firstname']))? $errorMsg['firsname'] : ''?></span></span>
                
                <label for="lastname">Nom</label>
                <input type="text" name="lastname" id="lastname" placeholder="Dupont" value="<?=(!empty($lastname))?$lastname:'' ?>" pattern="<?=REGEX_NAME?>" required>
                <span>Obligatoire <span class="redTxt"><?= (!empty($errorMsg['lastname']))? $errorMsg['lastname'] : ''?></span></span>
                
                <label for="country" id="adressLocation" >Votre pays de naissance :</label>
                <select id="country" name="country" required>
                <option value="">Pays</option>
                <?php 
                    foreach ($countriesArray as $key => $countrie) {
                        $isSelected = (!empty($country) && $country == $key)?'selected':'';
                        echo "<option value=".$key." ".$isSelected.">$countrie</option>";
                    }
                ?>
                </select>
                <span>Obligatoire <span class="redTxt"><?=(!empty($errorMsg['countryError']))? $errorMsg['countryError'] : ''?></span></span>

                <label for="birthday">Votre date de naissance :</label>
                <input type="date" value="<?=(!empty($birthday))?$birthday:'' ?>" min="<?=$minDateInput?>" max="<?=$todayInput?>" name="birthday" id="birthday">
                <span>Obligatoire, Format : jj/mm/aaaa <span class="redTxt"><?= (!empty($errorMsg['birthdayError']))? $errorMsg['birthdayError'] : ''?></span></span>
            </fieldset>
            <!-- Coordonnier (:D) -->
            <fieldset>
                <legend>Coordonnées</legend>
                
                <label for="userAdress">Adresse</label>
                <input type="text" name="userAdress" id="userAdress" placeholder="1 rue du général de gaulle 75001 Paris" autocomplete="off" value="<?=(!empty($userAdress))?$userAdress:'' ?>" pattern="<?=REGEX_ADRESS?>">
                <span>Optionnel <span class="redTxt"><?= (!empty($errorMsg['userAdress']))? $errorMsg['userAdress'] : ''?></span></span>
                
                <div id="propAdress">
                </div>
                
                <label for="userAdressComplete">Complément d'adresse</label>
                <input type="text" name="userAdressComplete" id="userAdressComplete" placeholder="Appartement 12" value="<?=(!empty($userAdressComplete))?$userAdressComplete:'' ?>" pattern="<?=REGEX_ADRESS_COMPL?>">
                <span>Optionnel <span class="redTxt"><?= (!empty($errorMsg['userAdressComplete']))? $errorMsg['userAdressComplete'] : ''?></span></span>
            </fieldset>
            <!-- Password -->
            <fieldset>
                <legend>Mot de passe</legend>
                
                <label for="userPw">Mot de passe</label>
                <input type="password" name="userPw" id="userPw" required>
                <span>Obligatoire <span class="redTxt"><?= (!empty($errorMsg['userPw']))? $errorMsg['userPw'] : ''?></span></span>
                
                <label for="userPwCheck">Confirmation du mot de passe</label>
                <input type="password" name="userPwCheck" id="userPwCheck" required>
                <span>Obligatoire <span class="redTxt"><?= (!empty($errorMsg['userPwCheck']))? $errorMsg['userPwCheck'] : ''?></span></span>
            </fieldset>
            <button type="submit" title="envoyer">Envoyer</button>
        </form>
    </main>