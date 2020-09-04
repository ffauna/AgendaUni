function passwordValidation(){
    var password = document.getElementById("pass");
    var pwd = password.value;
    var valid = true;

    valid = valid && (pwd.length>=8);

    var hasNumber = /\d/;
    var hasUpperCases = /[A-Z]/;
    var hasLowerCases = /[a-z]/;
    valid = valid && (hasNumber.test(pwd)) && (hasUpperCases.test(pwd)) && (hasLowerCases.test(pwd));

    // Si no cumple las restricciones, devolvemos un error
    if(!valid){
        var error = "Introduzca una contraseña valida. De longitud 8, (mayusculas y minusculas) letras y numeros";
    }else{
        var error = "";
    }
    password.setCustomValidity(error);
    return error;
}

function passwordConfirmation(){
    var password = document.getElementById("pass");
    var pwd = password.value;

    var passconfirm = document.getElementById("confirmpass");
    var confirmation = passconfirm.value;

    if (pwd != confirmation) {
        var error = "Las contraseñas no coinciden";
    }else{
        var error = "";
    }

    passconfirm.setCustomValidity(error);

    return error;
}