function mensagem(text) {
    let msg = document.createElement("span");
    msg.className = "mensagem";
    msg.textContent = text;
    document.body.appendChild(msg);

    setTimeout( () => {
        msg.remove();
    }, 1000)
}