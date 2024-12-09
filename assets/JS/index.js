const email = document.getElementById("email");
const senha = document.getElementById("senha");
const submit = document.getElementById("submit");

submit.addEventListener("click", () => {

    localStorage.removeItem("carrinho");

    let users = JSON.parse(localStorage.getItem("users"));

    users.forEach(user => {
        if(email.value == 'adm@gmail.com'){
            if(senha.value == 'adm1234') {
                mensagem("Logado com sucesso");
                setTimeout(() => {
                    window.location.href = "admprodutos.html";
                }, 1000)
               
            }
        }else{if(user.email == email.value) {
            if(user.senha == senha.value) {
                mensagem("Logado com sucesso");
                setTimeout(() => {
                    window.location.href = "produtos.html";
                }, 1000)
               
            }
        }
    }});

});