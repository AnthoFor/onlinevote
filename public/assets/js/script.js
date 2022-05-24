//========== EVENT LISTENER ==========
window.addEventListener('click', (e) => {
    //menu hamburger mobile affiche le menu, si il est déjà afficher efface le
    if (e.target.id == 'menuMobile') {
        if (mobilLinks.style.height == '20vh') {
            mobilLinks.style.height = '0px';
        } else {mobilLinks.style.height = '20vh';}
    }
})

