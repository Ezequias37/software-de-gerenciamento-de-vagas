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
        senhaV.innerHTML = "Senha: A senha deve no minimo conter 8 caracteres";
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
        window.location.href = "../html/enderecos.html";
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
        window.location.href = "../html/enderecos.html";
        return false;
    } else {
        alert("Por favor, preencha todos os campos corretamente.");
        return false; 
    }
}
function validarSenhaC(){
    var senha = document.getElementById("senha").value
    var senhaC = document.getElementById("senhaC").value
    var senhaVC = document.getElementById("senhaVC")
    if(senha == senhaC ){
        senhaVC.innerHTML = "Confirmar senha:"; 
        senhaVC.style.color = "";
        return true 
    }else{
        senhaVC.innerHTML = "Confirmar senha: Os campos nao são compativeis";
        senhaVC.style.color = "red"
        return false
    }
}
function validarSenhas(){
    senhaValido = validarSenha();
    senhaValidoC = validarSenhaC();
    if(senhaValido && senhaValidoC){
        window.location.href = "../html/index.html";
        return false;
    }else{
        alert("Por favor, preencha todos os campos corretamente.");
        return false; 
    }
}
function gerarPix(){
    alert("Seu codigo é pxjs30ck90");
    setTimeout(function() {
        window.location.href = '../html/historico-reservas.html';
    }, 2000);

}
function numCartao(){
    cartao = document.getElementById("cartao")
    cartaoV = document.getElementById("cartaoV")
    var cartaoLimpo = cartao.value.replace(/\D/g, '');
    if(cartaoLimpo.length < 16){
        cartaoV.innerHTML = "Numero do cartão: Campo invalido";
        cartaoV.style.color = "red"
        return false
    }else{
        cartaoV.innerHTML = "Numero do cartão: ";
        cartaoV.style.color = ""
        var cartaoFormatado = cartaoLimpo.substr(0, 4) + ' ' + cartaoLimpo.substr(4, 4) + ' ' + cartaoLimpo.substr(8, 4) + ' ' + cartaoLimpo.substr(12,4)+ ' ' ;
        document.getElementById("cartao").value = cartaoFormatado;
        return true
    }
}
function validarCvv(){
    cvv = document.getElementById("cvv")
    cvvV = document.getElementById("cvvV")
    if(cvv.value.length <3){
        cvvV.innerHTML = "Cvv: Campo invalido";
        cvvV.style.color = "red"
        return false 
    }else{
        cvvV.innerHTML = "Cvv:";
        cvvV.style.color = ""
        return true 
    }
}
function validarCartao(){
    cartaoValido = numCartao();
    nomeValido = validarNome();
    cvvValido = validarCvv();
    if (nomeValido && cartaoValido && cvvValido) {
        alert("Pagamento efetuado com sucesso");
        setTimeout(function() {
        window.location.href = '../html/historico-reservas.html';
    }, 2000);
        return false;
    } else {
        alert("Por favor, preencha todos os campos corretamente.");
        return false; 
    }

}



