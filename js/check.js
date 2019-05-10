'use strict';

var lastName
var firstName
var address
var city
var zipCode
var phone
var email
var come
var contactChoice
var validation
var errorLastName
var errorFirstName
var errorAddress
var errorCity
var errorZipCode
var errorPhone
var errorEmail
var errorCome
var errorContactChoice
var regexMail
var regexName
var regexZipCode
var regexPhone

lastName = document.getElementById('lastName');
firstName = document.getElementById('firstName');
address = document.getElementById('address');
city = document.getElementById('city');
zipCode = document.getElementById('zipCode');
phone = document.getElementById('phone');
email = document.getElementById('email');
come = document.getElementById('come');
validation = document.getElementById('confirmBooking');
errorLastName = document.getElementById('errorLastName');
errorFirstName = document.getElementById('errorFirstName');
errorAddress = document.getElementById('errorAddress');
errorCity = document.getElementById('errorCity');
errorZipCode = document.getElementById('errorZipCode');
errorPhone = document.getElementById('errorPhone');
errorEmail = document.getElementById('errorEmail');
errorCome = document.getElementById('errorCome');
regexMail = /^[a-zA-Z0-9-\.]+@[a-zA-Z-]+\.[a-zA-Z]{2,6}$/;
regexName = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
regexZipCode = /^[0-9]{5,5}$/;
regexPhone = /^(\d\d\s){4}(\d\d)$/;

// FONCTIONS

function check(event) {
    // vérification du nom
    if(lastName.validity.valueMissing) {
        event.preventDefault();
        $('#errorLastName').removeClass('noError');
        $('#errorLastName').text('Nom manquant');
    } else if (regexName.test(lastName.value) === false) {
        event.preventDefault();
        $('#errorLastName').removeClass('noError');
        $('#errorLastName').text('Le nom n\'est pas valide');
    } else {
        $('#errorLastName').addClass('noError');
    }
    // vérification du prénom
    if(firstName.validity.valueMissing) {
        event.preventDefault();
        $('#errorFirstName').removeClass('noError');
        $('#errorFirstName').text('Nom manquant');
    } else if (regexName.test(firstName.value) === false) {
        event.preventDefault();
        $('#errorFirstName').removeClass('noError');
        $('#errorFirstName').text("Votre prénom n'est pas valide");
    } else {
        $('#errorFirstName').addClass('noError');
    }
    // vérifiacation adresse
    if(address.validity.valueMissing) {
        event.preventDefault();
        $('#errorAddress').removeClass('noError');
        $('#errorAddress').text('Adresse manquante');
    } else {
        $('#errorAddress').addClass('noError');
    }
    // vérification de la ville
    if(city.validity.valueMissing) {
        event.preventDefault();
        $('#errorCity').removeClass('noError');
        $('#errorCity').text('Ville manquante');
    } else if (!isNaN(city.value)) {
        event.preventDefault();
        $('#errorCity').removeClass('noError');
        $('#errorCity').text("La ville ne peut être composé de chiffres");
    } else {
        $('#errorCity').addClass('noError');
    }
    // vérification du code postal
    if(zipCode.validity.valueMissing) {
        event.preventDefault();
        $('#errorZipCode').removeClass('noError');
        $('#errorZipCode').text('Code postal manquant');
    } else if (regexZipCode.test(zipCode.value) === false) {
        event.preventDefault();
        $('#errorZipCode').removeClass('noError');
        $('#errorZipCode').text('Le code postal n\est pas valide');
    } else {
        $('#errorZipCode').addClass('noError');
    }
    // vérification du numéro de téléphone
    if(phone.validity.valueMissing) {
        event.preventDefault();
        $('#errorPhone').removeClass('noError');
        $('#errorPhone').text('Numéro de téléphone manquant');
    } else if (regexPhone.test(phone.value) === false) {
        $('#errorPhone').removeClass("noError");
        $('#errorPhone').text("Le numéro de téléphone n'est pas au bon format (00 00 00 00 00)");
    } else if (phone.value.length < 10) {
        $('#errorPhone').removeClass('noError');
        $('#errorPhone').text('Le numéro doit contenir au moins 10 chiffres');
    } else {
        $("#errorPhone").addClass('noError');
    }
    // vérification de l'e-mail
    if(email.validity.valueMissing) {
        event.preventDefault();
        $('#errorEmail').removeClass('noError');
        $('#errorEmail').text('E-mail manquant');
    } else if (regexMail.test(email.value) === false) {
        event.preventDefault();
        $('#errorEmail').removeClass('noError');
        $('#errorEmail').text('Ceci n\'est pas un e-mail');
    } else if(regex.test(email.value) === true) {
        $('#errorEmail').addClass('noError');
    }
    // vérification de la date d'arrivée
    if(come.validity.valueMissing) {
        event.preventDefault();
        $('#errorCome').removeClass('noError');
        $('#errorCome').text('Date d\'arrivée manquante');
    } else {
        $('#errorCome').addClass('noError');
    }
};

function phonespacing()
{
    if (phone.value.length === 2) {
        phone.value += " ";
    } else if (phone.value.length === 5) {
        phone.value += " ";
    }  else if (phone.value.length === 8) {
        phone.value += " ";
    }  else if (phone.value.length === 11) {
        phone.value += " ";
    }
}

// CODE PRINCIPAL

validation.addEventListener('click', check);
phone.addEventListener('keypress', phonespacing);