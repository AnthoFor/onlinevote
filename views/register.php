<main>
        <div id="modal">
            <div id="modalContent">
                <span id="closeModal">&times;</span>
                <div id="insideModal">
                </div>
            </div>
        </div>
        <h2 class="boardTitle">inscription</h2>
        <!-- A mettre en POST -->
        <form action="">
            <fieldset>
                <legend>Mail</legend>
                <label for="userMail">Email</label>
                <input type="email" name="userMail" id="userMail" placeholder="jeandupont@gmail.com" required>
                <label for="userMailCheck">Confirmation de l'email</label>
                <input type="email" name="userMailCheck" id="userMailCheck" placeholder="jeandupont@gmail.com" required>
            </fieldset>
            <fieldset>
                <legend>Téléphone</legend>
                <label for="userMobilNumber">Numéro</label>
                <input type="tel" name="userMobilNumber" id="userMobilNumber" placeholder="0601020304" pattern="^([0]{1})([6-7]{1})([0-9]{8})$">
            </fieldset>
            <fieldset>
                <legend>Identité</legend>
                <label for="userFirstName">Prénom</label>
                <input type="text" name="userFirstName" id="userFirstName" placeholder="Jean" required>
                <label for="userLastName">Nom</label>
                <input type="text" name="userLastName" id="userLastName" placeholder="Dupont" required>
            </fieldset>
            <fieldset>
                <legend>Coordonnées</legend>
                <label for="userAdress">Adresse</label>
                <input type="text" name="userAdress" id="userAdress" placeholder="1 rue du général de gaulle 75001 Paris" autocomplete="off" pattern="^([0-9A-Za-z éàè'-]*) ([0-9]{5}) ([A-Za-zéàè'-]*)$">
                <div id="propAdress">
                </div>
                <label for="userAdressComplete">Complément d'adresse</label>
                <input type="text" name="userAdressComplete" id="userAdressComplete" placeholder="Appartement 12">
            </fieldset>
            <fieldset>
                <legend>Mot de passe</legend>
                <label for="userPw">Mot de passe</label>
                <input type="password" name="userPw" id="userPw" required>
                <label for="userPwCheck">Confirmation du mot de passe</label>
                <input type="password" name="userPwCheck" id="userPwCheck" required>
            </fieldset>
            <button type="submit" title="envoyer">Envoyer</button>
        </form>
    </main>