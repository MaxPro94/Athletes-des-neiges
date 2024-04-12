const mail = document.querySelector('#mail')
const lastname = document.querySelector('#lastname')
const firstname = document.querySelector('#firstname')
const pwd = document.querySelector('#pwd')
const pwd2 = document.querySelector('#pwd2')
const mySubmit = document.querySelector('#submit_inscription')
const error_mail = document.querySelector('#error_mail')
const error_lastname = document.querySelector('#error_lastname')
const error_firstname = document.querySelector('#error_firstname')
const error_pwd = document.querySelector('#error_pwd')
const error_pwd2 = document.querySelector('#error_pwd2')
const error_submit = document.querySelector('#error_form')
const expressionReguliereMail = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
const expressionReguliereMdp = /^(?=(?:.*[A-Z]){1,})(?=(?:.*[a-z]){1,})(?=(?:.*[\W_]){1,}).{6,}$/
let erreur



mail.addEventListener("blur", function(e){
    if(mail.value.trim().length == 0){
        error_mail.innerHTML = "Le champs e-mail est obligatoire";
        console.log(erreur)
        erreur += 1


    } else {

        if (expressionReguliereMail.test(mail.value)) {
            error_mail.innerHTML = ""
            fetch('./api.php?action=check_mail&mail=' + this.value)
            .then(function(response){
                return response.json()
            })
            .then(function(resultat){

                if(resultat.nb == 1){
                    error_mail.innerHTML = "Cette adresse mail existe déjà"
                } else {
                    error_mail.innerHTML = ""
                }
            })
        } else {
            erreur += 1
            error_mail.innerHTML = "L'adresse mail n'est pas valide";
        }
    }
})

lastname.addEventListener("blur", function(e){
    if(lastname.value.trim().length <= 1){
        erreur += 1
        error_lastname.innerHTML = "Le nom doit comporter plus d'une lettre";


    } else {
        error_lastname.innerHTML = "";
    }
    
})

firstname.addEventListener("blur", function(e){
    if(firstname.value.trim().length <= 1){
        erreur += 1
        error_firstname.innerHTML = "Le prénom doit comporter plus d'une lettre";
    } else {
        error_firstname.innerHTML = "";
    }

    
})

pwd.addEventListener("blur", function(e){ 

    if(pwd.value.length > 0){

        if(expressionReguliereMdp.test(pwd.value) == false){
            erreur += 1
            error_pwd.innerHTML = "Le mot de passe renseigner doit contenir entre et 32 carcatères avec des minuscules, des MAJUSCULES et des caractères spéciaux comme @,$,€,*,^,§,%,&.";
    
        } else {
            error_pwd.innerHTML = "";
        }
    } else {
        error_pwd.innerHTML = "Veuillez renseigner un mot de passe"
    }


})

pwd2.addEventListener("blur", function(e){

    if(pwd2.value.length > 0){
        if(expressionReguliereMdp.test(pwd2.value) == false){
            erreur += 1
            error_pwd2.innerHTML = "Le mot de passe renseigner doit contenir entre 6 et 32 carcatères avec des minuscules, des MAJUSCULES et des caractères spéciaux comme @,$,€,*,^,§,%,&.";
    
        }
        if(pwd2.value == pwd.value){
            error_pwd2.innerHTML = "";
    
        } else {
            erreur += 1
            error_pwd2.innerHTML = "Les mots de passe ne correspondent pas"
            
        }
    } else {
        error_pwd2.innerHTML = "Veuillez remplir la verification de votre mot de passe"
    }


})


mySubmit.addEventListener("click", function(e){
    e.preventDefault()
    console.log(erreur)
    if(mail.value.length === 0 && lastname.value.length === 0 && firstname.value.length === 0 && mail.value.length === 0 && pwd.value.length === 0 && pwd2.value.length === 0){
        error_submit.innerHTML = "Veuillez remplir les champs requis"
    } 
    if(erreur === undefined){
        document.querySelector('#form').submit()
    }


})
