/*
    Run through all input of the form, if one is empty, prints error message.
*/

function validateFormSignUp(form) {
    if (form['first_name'].value === '') {
        document.getElementById('error_fname').innerHTML = "*Champs doit être rempli*";
        return false;
    } else {
        document.getElementById('error_fname').innerHTML = "";
    }

    if (form['last_name'].value === '') {
        document.getElementById('error_lname').innerHTML = "*Champs doit être rempli*";
        return false;
    } else {
        document.getElementById('error_lname').innerHTML = "";
    }

    if (form['email'].value === '') {
        document.getElementById('error_email').innerHTML = "*Champs doit être rempli*";
        return false;
    } else {
        document.getElementById('error_email').innerHTML = "";
    }

    // To check if user is in national database, email must end up with cesi.fr or viacesi.fr
    if (!new RegExp(/.*\@(cesi|viacesi).fr/).test(form['email'].value)) {
        document.getElementById('error_email').innerHTML = "*L'adresse mail doit être valide (cesi ou viacesi)*";
        return false;
    } else {
        document.getElementById('error_email').innerHTML = "";
    }

    // Regex to match if the password is 8 charaters long, on uppercase letter, one lowercase letter and one number

    if (!new RegExp(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/).test(form['password'].value)) {
        document.getElementById('error_password').innerHTML = "*Mot de passe invalide (9 characteres, une lettre et un chiffre)*";
        return false;
    } else {
        document.getElementById('error_password').innerHTML = "";
    }

    if (form['password_conf'].value != form['password'].value) {
        document.getElementById('error_password_conf').innerHTML = "*Mot de passe ne correspond pas*";
        return false;
    } else {
        document.getElementById('error_password_conf').innerHTML = "";
    }

    return true;
}


function validateFormSignIn(form) {
    if (form['first_name'].value === '') {
        document.getElementById('error_fname').innerHTML = "*Champs doit être rempli*";
        return false;
    } else {
        document.getElementById('error_fname').innerHTML = "";
    }

    if (form['last_name'].value === '') {
        document.getElementById('error_lname').innerHTML = "*Champs doit être rempli*";
        return false;
    } else {
        document.getElementById('error_lname').innerHTML = "";
    }
    return true;
}