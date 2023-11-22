const email = document.getElementById("email");
const senha = document.getElementById("senha");
const submit = document.getElementById("submit");

submit.addEventListener("click", () => {

    let users = JSON.parse(localStorage.getItem("users"));

    users.forEach(user => {
        if(user.email == 'adm@gmail.com'){
            if(user.senha == 'adm1234') {
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