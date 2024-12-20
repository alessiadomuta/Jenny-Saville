function validateEmail(){
    email = document.getElementById('user_email').value;
    if(!email.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
        document.getElementById('errore_email').className = "error";
        return false;
    }
    else{
        document.getElementById('errore_email').className = "error none";
        return true;
    }
}

function validateUsername(){
    username = document.getElementById('user_name').value;
    if(!username.match(/^[a-zA-Z0-9]+$/)){
        document.getElementById('errore_user_name').className = "error";
        return false;
    }
    else{
        document.getElementById('errore_user_name').className = "error none";
        return true;
    }
}

function validatePassword(){
    psw = document.getElementById('pass_old').value;
    if(!psw.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/)){
        document.getElementById('errore_pass_old').className = "error";
        return false;
    }
    else{
        document.getElementById('errore_pass_old').className = "error none";
        return true;
    }
}

function validatePswConfirm(){
    psw = document.getElementById('pass_old').value;
    pswrep = document.getElementById('pass_rep').value;
    if(psw != pswrep){
        document.getElementById('errore_pass_rep').className = "error";
        return false;
    }
    else{
        document.getElementById('errore_pass_rep').className = "error none";
        return true;
    }

}

function validateProvincia(){
    provincia = document.getElementById('provincia').value;
    if(!provincia.match(/^[A-zÀ-ú\s\']+$/)){
        document.getElementById('errore_provincia').className = "error";
        return false;
    }
    else{
        document.getElementById('errore_provincia').className = "error none";
        return true;
    }
}

function validateCitta(){
    citta = document.getElementById('citta').value;
    if(!citta.match(/^[A-zÀ-ú\s\']+$/)){
        document.getElementById('errore_citta').className = "error";
        return false;
    }
    else{
        document.getElementById('errore_citta').className = "error none";
        return true;
    }
}

function validateCAP(){
    CAP = document.getElementById('cap').value;
    if(!CAP.match(/^[0-9]{5}$/)){
        document.getElementById('errore_cap').className = "error";
        return false;
    }
    else{
        document.getElementById('errore_cap').className = "error none";
        return true;
    }
}

function validateIndirizzo(){
    ind = document.getElementById('indirizzo').value;
    if(!ind.match(/^[A-zÀ-ú\s\']+$/)){
        document.getElementById('errore_indirizzo').className = "error";
        return false;
    }
    else{
        document.getElementById('errore_indirizzo').className = "error none";
        return true;
    }
}

function validateNumCivico(){
    civ = document.getElementById('civico').value;
    if(!civ.match(/^[0-9]+$/)){
        document.getElementById('errore_civico').className = "error";
        return false;
    }
    else{
        document.getElementById('errore_civico').className = "error none";
        return true;
    }
}

function validateNomeCitofono(){
    interno = document.getElementById('interno').value;
    if(!interno.match(/^[A-zÀ-ú\s\']+$/)){
        document.getElementById('errore_interno').className = "error";
        return false;
    }
    else{
        document.getElementById('errore_interno').className = "error none";
        return true;
    }
}

function validateTitolare(){
    t = document.getElementById('titolare_carta').value;
    if(!t.match(/^[A-zÀ-ú\s\']+$/)){
        document.getElementById('errore_titolare_carta').className = "error";
        return false;
    }
    else{
        document.getElementById('errore_titolare_carta').className = "error none";
        return true;
    }
}

function validateNumCarta(){
    n = document.getElementById('numero_carta').value;
    if(n.match(/^[0-9]{16}/) || n.match(/^[0-9\s\-]{19}/)){
        document.getElementById('errore_numero_carta').className = "error none";
        return true;
    }
    else{
        document.getElementById('errore_numero_carta').className = "error";
        return false;
    }
}

function validateCvv(){
    cvv = document.getElementById('cvv').value;
    if(!cvv.match(/^[0-9]{3}$/)){
        document.getElementById('errore_cvv').className = "error";
        return false;
    }
    else{
        document.getElementById('errore_cvv').className = "error none";
        return true;
    }
}

function submitModifica(event){
    if(!(validatePassword() && validatePswConfirm() && validateUsername()
        && (document.getElementById('cap').value.tirm() == "" || validateCAP())
        && (document.getElementById('citta').value.tirm() == "" || validateCitta())
        && (document.getElementById('cvv').value.tirm() == "" || validateCvv())
        && (document.getElementById('indirizzo').value.tirm() == "" || validateIndirizzo())
        && (document.getElementById('interno').value.tirm() == "" || validateNomeCitofono())
        && (document.getElementById('numero_carta').value.tirm() == "" || validateNumCarta())
        && (document.getElementById('civico').value.tirm() == "" || validateNumCivico())
        && (document.getElementById('provincia').value.tirm() == "" || validateProvincia())
        && (document.getElementById('titolare_carta').value.tirm() == "" || validateTitolare()))){
            event.preventDefault();
            document.getElementById('errore_submit').className = "error";
    } 
    else{
        document.getElementById('errore_submit').className = "error none";
    }
}

function submitAcquisto(event){
    if(!(validateCAP() & validateCitta() & validateCvv() & validateIndirizzo() & validateNomeCitofono() & validateNumCarta() & validateNumCivico() & validateProvincia() & validateTitolare())){
        event.preventDefault();
        document.getElementById('errore_submit').className = "error";
    }
    else{
        document.getElementById('errore_submit').className = "error none";
    }
}

function submitRegistrazione(event){
    if(!(validatePassword() & validatePswConfirm() & validateUsername() & validateEmail())){
        event.preventDefault();
        document.getElementById('errore_submit').className = "error";
    }
    else{
        document.getElementById('errore_submit').className = "error none";
    }
}



