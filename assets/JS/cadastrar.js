const image = document.querySelector("img");
const input = document.querySelector("input");
const submit = document.getElementById("submit");

function verifica(valor) {
    if(valor.length < 3 || valor == null) return true;
    return false;
}

submit.addEventListener("click", () => {

    let usuario = {
        email: document.getElementById("email").value,
        senha: document.getElementById("senha").value
    }

    if(verifica(usuario.email)) {
        mensagem("Valor vazio no email");
        return;
    }
    if(verifica(usuario.senha)) {
        mensagem("Valor vazio na senha");
        return;
    }

    let users = JSON.parse(localStorage.getItem("users"));
    
    if(users == null) {
        users = [];
    }
    users.push(usuario);
    localStorage.setItem("users", JSON.stringify(users));

    mensagem("Conta criada com sucesso!");
    setTimeout(() => {
        window.location.href = "index.html";
    }, 1200)
});

input.addEventListener("change", () => {
    image.src = URL.createObjectURL(input.files[0]);
});
