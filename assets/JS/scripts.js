function mensagem(text) {
    let msg = document.createElement("span");
    msg.className = "mensagem";
    msg.textContent = text;
    document.body.appendChild(msg);

    setTimeout( () => {
        msg.remove();
    }, 1000)
}

const ROTAS = {
    index: "index.html",
    assinaturas: "index.html",
    index: "index.html",
    index: "index.html",
    index: "index.html",
}

const btnLogout = document.getElementById("logout");
if(btnLogout) {
    console.log("Logout")
    btnLogout.addEventListener("click", (e) => {
        fetch("./backend/logout.php").then(async res => {
            window.location.href = ROTAS.index;
        })
    })
}

const URL_API = "./backend/api/";