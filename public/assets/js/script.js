//========== EVENT LISTENER ==========
window.addEventListener('click', (e) => {
    //menu hamburger mobile affiche le menu, si il est déjà afficher efface le.
    if (e.target.id == 'menuMobile') {
        e.preventDefault();
        if (mobilLinks.style.height == '20vh') {
            mobilLinks.style.height = '0px';
            menuMobile.setAttribute('src', 'public/assets/img/burger.svg');
            //remet le burger en retrecissant

        } else {
            mobilLinks.style.height = '20vh';
            //met la croix en aggrandissant
            menuMobile.setAttribute('src', 'public/assets/img/burgerClose.svg');
        }
    }
    if (e.target.id == 'registerGo') {
        funcModalRegister();
    }
    if (e.target.id == 'connectGo') {
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
                                <label for="userPw">Mot de passe:</label>
                                <input type="password" name="userPw" id="userPw" placeholder="Mot de passe">
                                <button type="submit">connexion</button>
                            </form>  
                            `;
    modal.style.display = 'block';
}
//close ALL modal
funcModalClose = () => {
    modal.style.display = 'none';
}