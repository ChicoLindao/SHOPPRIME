const image = document.querySelector("img");
const input = document.querySelector("input");

function verifica(valor) {
    if(valor == null || valor.length < 3) return true;
    return false;
}

document.getElementById("form-register").addEventListener("submit", (e) => {
    e.preventDefault();
    let formData = new FormData(e.target);

    if(verifica(formData.get("name"))) {
        mensagem("Valor inválido no nome!");
        return;
    }
    if(verifica(formData.get("email"))) {
        mensagem("Valor inválido no email!");
        return;
    }
    if(verifica(formData.get("password"))) {
        mensagem("Valor inválido na senha!");
        return;
    }

    fetch(URL_API + 'user/user-register.php', {
        method: "POST",
        body: formData,
      })
        .then((res) => res.json())
        .then((res) => {
          mensagem(res.message);
    
          if(res.status) {
            setTimeout(() => {
                window.location.href = "produtos.html";
            }, 1200)
          }
        });
});

input.addEventListener("change", () => {
    image.src = URL.createObjectURL(input.files[0]);
});
