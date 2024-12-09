let tbody = document.getElementById("lista-carrinho");


function constroi() {
    let carrinho = JSON.parse(localStorage.getItem("carrinho"));
    tbody.innerHTML = "";
    document.getElementById("total").innerHTML = "";

    if(carrinho == null) return;
    var total = 0;
    carrinho.forEach(item => {
        total += item.valor * item.quant;
        tbody.innerHTML += `
        <tr>
        <td>
          <div class="produto">
            <div class="informacoes">
              <div class="name">${item.nome}</div>
            </div>
          </div>
        </td>
        <td>R$ ${item.valor}</td>
        <td>
          <div class="testecomx">
            <span>${item.quant}</span>
          </div>
        </td>
        <td>R$ ${item.valor * item.quant}</td>
        <td>
          <button class="noselect"><span class="text">Remover</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z">
              </path></svg></span></button>
        </td>
      </tr>`
    });
    document.getElementById("total").innerHTML = `R$ ${total}`;
    criaListener();
}


document.getElementById("submit-compra").addEventListener("click", () => {
    localStorage.removeItem("carrinho");
    constroi();
    mensagem("Todos os itens foram comprados e dentro de alguns minutos seus GIFT-CARDS serão enviados ao seu email! :)")
}, );

function criaListener() {
    let remove = document.querySelectorAll(".noselect");
    remove.forEach( (btn, i) => {
        btn.addEventListener("click", () => {
            console.log(i);
            let carrinho = JSON.parse(localStorage.getItem("carrinho"));
            carrinho.splice(i, 1);
            localStorage.setItem("carrinho", JSON.stringify(carrinho));
            constroi();
        })
    })
}


constroi();