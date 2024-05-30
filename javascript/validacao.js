function validarNome(){
    var nome = document.getElementById("nome");
    var nomeV = document.getElementById("nomeV");

    if(nome.value.length < 10){
        nomeV.innerHTML = "Nome: Campo invalido";
        nomeV.style.color = "red"
        return false;
    }else{
        nomeV.innerHTML = "Nome:"; 
        nomeV.style.color = "";
        return true;
    }
}
function validarCpf(){
    var cpf = document.getElementById("cpf");
    cpfV = document.getElementById("cpfV");
    var cpfLimpo = cpf.value.replace(/\D/g, '');
    if(cpfLimpo.length < 11){
        cpfV.innerHTML = "Cpf: Campo invalido";
        cpfV.style.color = "red"
        return false
    }else{
        cpfV.innerHTML = "Cpf: ";
        cpfV.style.color = ""
        var cpfFormatado = cpfLimpo.substr(0, 3) + '.' + cpfLimpo.substr(3, 3) + '.' + cpfLimpo.substr(6, 3) + '-' + cpfLimpo.substr(9, 2);
        document.getElementById("cpf").value = cpfFormatado;
        return true
    }

}
function validarEmail() {
    var email = document.getElementById("email").value;
    var re = /\S+@\S+\.\S+/;
    var emailV = document.getElementById("emailV");
    if (re.test(email)) {
        emailV.innerHTML = "Email:";
        emailV.style.color = "";
        return true
    } else {
        emailV.innerHTML = "Email: Campo inválido";
        emailV.style.color = "red";
        return false

    }
}
function validarSenha(){
    var senha = document.getElementById("senha");
    var senhaV = document.getElementById("senhaV");

    if(senha.value.length < 8){
        senhaV.innerHTML = "Senha: A senha deve conter 8 caracteres";
        senhaV.style.color = "red"
        return false
    }else{
        senhaV.innerHTML = "Senha:"; 
        senhaV.style.color = "";
        return true
    }
}
function validar() {
    var nomeValido = validarNome();
    var cpfValido = validarCpf();
    var emailValido = validarEmail();
    var senhaValido = validarSenha();

    if (nomeValido && cpfValido && emailValido && senhaValido) {
        window.location.href = "index.html";
        return false;
    } else {
        alert("Por favor, preencha todos os campos corretamente.");
        return false; 
    }
}
function validarLogin(){
    var emailValido = validarEmail();
    var senhaValido = validarSenha();
    if (emailValido && senhaValido) {
        window.location.href = "index.html";
        return false;
    } else {
        alert("Por favor, preencha todos os campos corretamente.");
        return false; 
    }
}



