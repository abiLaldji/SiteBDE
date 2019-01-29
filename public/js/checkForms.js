function validateFormSignUp(form) {
    if (form['first_name'].value === '') {
        document.getElementById('error_fname').innerHTML = "*Champs doit être rempli*";
        return false;
    };

    if (form['last_name'].value === '') {
        document.getElementById('error_lname').innerHTML = "*Champs doit être rempli*";
        return false;
    };

    if (form['email'].value === '') {
        document.getElementById('error_email').innerHTML = "*Champs doit être rempli*";
        return false;
    }
    if (!new RegExp(/.*\@(cesi|viacesi).fr/).test(form['email'].value)) {
        document.getElementById('error_email').innerHTML = "*L'adresse mail doit être valide (cesi ou viacesi)*";
        return false;
    }
    if (!new RegExp(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/).test(form['password'].value)) {
        document.getElementById('error_password').innerHTML = "*Mot de passe invalide (9 characteres, une lettre et un chiffre)*";
        return false;
    }
    if (form['password_conf'].value != form['password'].value) {
        document.getElementById('error_password_conf').innerHTML = "*Mot de passe ne correspond pas*";
        return false;
    }
    return true;
}

function validateFormSignIn(form) {
    if (form['first_name'].value === '') {
        document.getElementById('error_fname').innerHTML = "*Champs doit être rempli*";
        return false;
    };

    if (form['last_name'].value === '') {
        document.getElementById('error_lname').innerHTML = "*Champs doit être rempli*";
        return false;
    };
    return true;
}