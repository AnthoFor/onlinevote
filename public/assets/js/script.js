//========== EVENT LISTENER ==========
mobilHeight = mobilLinks.offsetHeight;
mobilLinks.style.height = '0px';
window.addEventListener('click', (e) => {
    //menu hamburger mobile affiche le menu, si il est déjà afficher efface le.
    if (e.target.id == 'menuMobile') {
        e.preventDefault();
        if (!mobilLinks.classList.contains('closed')) {
            mobilLinks.classList.toggle('closed');
            // mobilLinks.style.display = 'none';
            mobilLinks.style.height = '0px';
            menuMobile.setAttribute('src', '/../../public/assets/img/burger.svg');
            //remet le burger en retrecissant
        } else {
            mobilLinks.classList.toggle('closed');
            // mobilLinks.style.display = 'flex';
            console.log(mobilLinks.offsetHeight);
            mobilLinks.style.height = mobilHeight+'px';
            //met la croix en aggrandissant
            menuMobile.setAttribute('src', '/../../public/assets/img/burgerClose.svg');
        }
    }
    if (e.target.classList.contains('connectGo')) {
        e.preventDefault();
        modal.style.display = 'block';
    }
    if (e.target.id == 'closeModal') {
        modal.style.display = 'none';
        modalConf.style.display = 'none';
    }
    if (e.target.className.includes('closeMe')) {
        modalConf.style.display = 'none';
    }   
})