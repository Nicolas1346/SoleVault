const campoEmail = document.getElementById("email");
const erroEmail = document.getElementById("email-error")
const campoNome = document.getElementById("nome")
const erroNome = document.getElementById("nome-error")
const campoSenha = document.getElementById("senha")
const erroSenha = document.getElementById("senha-error")
const campoConfirmacao = document.getElementById("confirmacao")
const erroConfirmacao = document.getElementById("error-confirmacao")


campoEmail.addEventListener("blur", function() {
    if (!campoEmail.value.includes("@")) {
        erroEmail.textContent = "Digite um e-mail válido.";
    } else {
        erroEmail.textContent = "";
    }
});

campoNome.addEventListener("blur", function() {

    if (campoNome.value.trim().length < 3) {
        erroNome.textContent = "Digite um nome válido.";
    } else {
        erroNome.textContent = "";
    }
});

campoSenha.addEventListener("blur", function() {

    if (campoSenha.value.length < 8) {
        erroSenha.textContent = "Digite uma senha válida.";
    } else {
        erroSenha.textContent = "";
    }
});

campoConfirmacao.addEventListener("blur", function() {

    if (campoConfirmacao.value !== campoSenha.value) {
        erroConfirmacao.textContent = "As senhas não coincidem.";
    } else {
        erroConfirmacao.textContent = "";
    }
});

    

