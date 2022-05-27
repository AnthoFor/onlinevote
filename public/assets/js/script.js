//========== EVENT LISTENER ==========
window.addEventListener('click', (e) => {
    //menu hamburger mobile affiche le menu, si il est déjà afficher efface le.
    if (e.target.id == 'menuMobile') {
        e.preventDefault();
        if (mobilLinks.style.height == '27vh') {
            mobilLinks.style.height = '0px';
            menuMobile.setAttribute('src', 'public/assets/img/burger.svg');
            //remet le burger en retrecissant
        } else {
            mobilLinks.style.height = '27vh';
            //met la croix en aggrandissant
            menuMobile.setAttribute('src', 'public/assets/img/burgerClose.svg');
        }
    }
    if (e.target.classList.contains('connectGo')) {
        e.preventDefault();
        funcModalConnect();
    }
    if (e.target.id == 'closeModal') {
        funcModalClose();
    }
})


//==================== FONCTION ====================

//modal register
funcModalRegister = () => {
    insideModal.innerHTML = ``;
    modal.style.display = 'block';
}
//modal connect
funcModalConnect = () => {
    insideModal.innerHTML = `
                            <h3>Se connecter</h3>
                            <form action="indexConnected.html">
                                <label for="connectId">Identifiant de connexion:</label>
                                <input type="text" name="connectId" id="connectId" placeholder="Votre identifiant">
                                <label for="connectPw">Mot de passe:</label>
                                <input type="password" name="connectPw" id="connectPw" placeholder="Mot de passe">
                                <span class="smallSpan">mot de passe oublié ?</span>
                                <button type="submit">connexion</button>
                            </form>  
                            `;
    modal.style.display = 'block';
}
//close ALL modal
funcModalClose = () => {
    modal.style.display = 'none';
}