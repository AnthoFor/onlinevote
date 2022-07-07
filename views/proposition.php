<main class="mainBoard">
    <h2 class="titleBoard">Proposer votre référendum</h2>
    <!-- Formulaire d'inscription -->
    <form method="POST" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" novalidate>
        <!-- Mail -->
        <fieldset>
            <legend>Votre proposition</legend>
            <label for="propQuestion">Indiquez ici la question qui apparaitra dans la liste des propositions, n'oubliez pas de faire une question fermé.</label>
            <textarea class="textareaQ" name="propQuestion" id="propQuestion" maxlength="200"><?=(!empty($propQuestion))?$propQuestion:''?></textarea>
            <span>Obligatoire <span class="redTxt"><?= (!empty($propErrorMsg['propQuestion']))? $propErrorMsg['propQuestion'] : ''?></span></span>

            <label for="propDescription">Description complémentaire</label>
            <textarea class="textareaD" name="propDescription" id="propDescription" maxlength="400"><?=(!empty($propDescription))?$propDescription:''?></textarea>
            <span>Optionnel <span class="redTxt"><?= (!empty($propErrorMsg['propDescription']))? $propErrorMsg['propDescription'] : ''?></span></span>
        </fieldset>
        <button type="submit" title="envoyer">Envoyer</button>
    </form>
</main>