const progress_bar = document.querySelector('#blips .progress-bar');
const pwd = document.querySelector('#pwd')
let start = 0
const expressionReguliereMdpFaible = /^(?=(?:.*[A-Z]){1})(?=(?:.*[a-z]){1})(?=(?:.*[\W_]){1}).{6,}$/
const expressionReguliereMdpMoyen = /^(?=(?:.*[A-Z]){2})(?=(?:.*[a-z]){2})(?=(?:.*[\W_]){2}).{8,}$/
const expressionReguliereMdpFort = /^(?=(?:.*[A-Z]){3})(?=(?:.*[a-z]){3})(?=(?:.*[\W_]){3}).{10,}$/

pwd.addEventListener("input", function(e){
    if(expressionReguliereMdpFaible.test(pwd.value) == false){
        progress_bar.style.width = start + 33
        progress_bar.style.BackgroundColor = green
    }

    if(expressionReguliereMdpMoyen.test(pwd.value) == false){
        progress_bar.style.width = start + 66
        progress_bar.style.BackgroundColor = yellow
    }

    if(expressionReguliereMdpFort.test(pwd.value) == false){
        progress_bar.style.width = start + 100
        progress_bar.style.BackgroundColor = green
    }
})