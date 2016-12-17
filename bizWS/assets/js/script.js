//first name
var firstName = document.getElementById("fname");

firstName.onfocus = function () {
    if (firstName.value == "First Name") {
        firstName.value = "";
    }
};

firstName.onblur = function () {
    if (firstName.value == "") {
        firstName.value = "First Name";
    }
};

//second name
var secondName = document.getElementById("sname");

secondName.onfocus = function () {
    if (secondName.value == "Second Name") {
        secondName.value = "";
    }
};

secondName.onblur = function () {
    if (secondName.value == "") {
        secondName.value = "Second Name";
    }
};

//email
var sEmail = document.getElementById("semail");

sEmail.onfocus = function () {
    if (sEmail.value == "Email") {
        sEmail.value = "";
    }
};

sEmail.onblur = function () {
    if (sEmail.value == "") {
        sEmail.value = "Email";
    }
};

//confirm email
var cEmail = document.getElementById("cemail");

cEmail.onfocus = function () {
    if (cEmail.value == "Confirm Email") {
        cEmail.value = "";
    }
};

cEmail.onblur = function () {
    if (cEmail.value == "") {
        cEmail.value = "Confirm Email";
    }
};

//password
var sPassword = document.getElementById("spass");

sPassword.onfocus = function () {
    if (sPassword.value == "Password") {
        sPassword.value = "";
    }
};

sPassword.onblur = function () {
    if (sPassword.value == "") {
        sPassword.value = "Password";
    }
};

//confirm password
var cPassword = document.getElementById("cpass");

cPassword.onfocus = function () {
    if (cPassword.value == "Confirm Password") {
        cPassword.value = "";
    }
};

cPassword.onblur = function () {
    if (cPassword.value == "") {
        cPassword.value = "Confirm Password";
    }
};