// API du gouvernement pour chopper les adresses
const userAdress = document.getElementById('userAdress');
if (userAdress) {
    // Quand utilisateur clic dans le champ input de l'adresse :
    userAdress.addEventListener('input', function () {
    let dataInput = document.getElementById('userAdress');
    let dataInputBis = dataInput.value;
    let q = `${dataInputBis}`;
    // Récuperation de l'API du gouv
    let adressData = `https://api-adresse.data.gouv.fr/search/?q=${q}&type=housenumber&autocomplete=1`;
    fetch(adressData)
        .then(reponse => reponse.json())
        .then(json => {
            json.features.forEach(adress => {
                //Création d'un bouton pour chaque adresse ( 5 max)
                let btnAdd = document.createElement('button');
                //ajout de l'adresse (properties.label) en innerText
                btnAdd.innerText = adress.properties.label;
                //ajout de la class btnAdress pour le style
                btnAdd.classList.add('btnAdress');
                //Selection de la div ou mettre le bouton (btnAdd)
                let whereToPutAdress = document.getElementById('propAdress');
                //Ajout de btnAdd dans la div "propAdress"
                whereToPutAdress.append(btnAdd);
                //Si y a plus de 5 childs
                if (propAdress.childElementCount > 5) {
                    //alors enleve le premier element ( qui est le plus ancien)
                    whereToPutAdress.firstElementChild.remove();
                }
                //Selection de TOUS les btn
                let adressArray = document.querySelectorAll('.btnAdress');
                //pour Chaque boutons
                adressArray.forEach(adress => {
                    //ecoute si l'utilisateur clic sur l'un d'eux
                    adress.addEventListener('click', event => {
                        event.preventDefault();
                        //Si utilisateur clic sur un bouton, alors ajoute la valeur du bouton (event.target.innerHTML)
                        //dans le champs input de l'adresse
                        dataInput.value = event.target.innerHTML;
                        //Et vu qu'il en a plus besoin, supprime toute les btn
                        adressArray.forEach(adressB => {
                            adressB.remove();
                        })
                    })
                });
            })
        });
    })
}

// ============= Check des inputs du forms. =========================
window.addEventListener('input', (e) => {
    if (e.target.id == 'userPwCheck') {
        let inputPw1 = userPw.value;
        let inputPw2 = userPwCheck.value;
        let result = check2valuesForm(inputPw1, inputPw2);
        if (result == 0) {
            userPwCheck.classList.add('checkNok');
        } else {
            userPwCheck.classList.remove('checkNok');
            userPwCheck.classList.add('checkOk');    
        }
    }    
    if (e.target.id == 'userMailCheck') {
        let inputMail1 = userMail.value;
        let inputMail2 = userMailCheck.value;
        let result = check2valuesForm(inputMail1, inputMail2);
        if (result == 0) {
        userMailCheck.classList.add('checkNok');
        } else {
        userMailCheck.classList.remove('checkNok');
        userMailCheck.classList.add('checkOk');    
        }
    }
    
})
// Event listener sur user adress pour remonter la fenêtre afin de voir les blocs soumi par l'api
if (userAdress) {
    userAdress.addEventListener('focus', () => {
        //remontage a l'input d'avant (sinon ca coupe)
        document.location.href ='#userLastName';
        //Reselection du input userAdress
        userAdress.focus();
    })
}
// ============ FONCTION =======================
// Check des valeurs des formulaires (mdp & email par ex) return 1 si vrai, 0 si faux
check2valuesForm = (val1, val2) => {
    if (val1 !== val2) 
    {return 0;}
    else 
    {return 1}
}