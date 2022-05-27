let userAdress = document.getElementById('userAdress');
userAdress.addEventListener('focus', () => {
    document.location.href ='#userAdress'               
})
document.getElementById('userAdress').addEventListener('input', function () {
    let dataInput = document.getElementById('userAdress');
    let dataInputBis = dataInput.value;
    let q = `${dataInputBis}`;
    let adressData = `https://api-adresse.data.gouv.fr/search/?q=${q}&type=housenumber&autocomplete=1`;
    fetch(adressData)
        .then(reponse => reponse.json())
        .then(json => {
            json.features.forEach(adress => {
                let btnAdd = document.createElement('button');
                btnAdd.innerText = adress.properties.label;
                btnAdd.classList.add('btnAdress');
                let whereToPutAdress = document.getElementById('propAdress');
                whereToPutAdress.append(btnAdd);
                if (propAdress.childElementCount > 5) {
                    whereToPutAdress.firstElementChild.remove();
                }
                let adressArray = document.querySelectorAll('.btnAdress');
                adressArray.forEach(adress => {
                    adress.addEventListener('click', event => {
                        event.preventDefault();
                        dataInput.value = event.target.innerHTML;
                        adressArray.forEach(adressB => {
                            adressB.remove();
                        })
                    })
                });
            })
        });
})

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
// ============ FONCTION =======================
// Check des valeurs des formulaires (mdp & email par ex) return 1 si vrai, 0 si faux
check2valuesForm = (val1, val2) => {
    if (val1 !== val2) {return 0;
    } else {return 1}
}