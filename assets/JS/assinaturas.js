let lista = document.getElementById("section-gift-card");

var listaGiftCard = [
    {
        id: 7,
        imagem: 'img/xboxlivegold.jpg',
        nome: "Xbox Live Gold",
        valor: 200
    },
    {
        id: 8,
        imagem: 'img/netflix.jpg',
        nome: "Netflix",
        valor: 110
    }
]

lista.innerHTML = "";
listaGiftCard.forEach( item => {
    lista.innerHTML += `
    <div class="produtos">
       <img src="${item.imagem}">
        <div class="nomeprodutos">${item.nome}</div>
        <br class="divisordeprodutos">
        <div class="produtospart2">
            <div class="precoprodutos"><span>$</span>${item.valor}</div>
            <button class="botaoprodutos">
              <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m397.78 316h-205.13a15 15 0 0 1 -14.65-11.67l-34.54-150.48a15 15 0 0 1 14.62-18.36h274.27a15 15 0 0 1 14.65 18.36l-34.6 150.48a15 15 0 0 1 -14.62 11.67zm-193.19-30h181.25l27.67-120.48h-236.6z"></path><path d="m222 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z"></path><path d="m368.42 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z"></path><path d="m158.08 165.49a15 15 0 0 1 -14.23-10.26l-25.71-77.23h-47.44a15 15 0 1 1 0-30h58.3a15 15 0 0 1 14.23 10.26l29.13 87.49a15 15 0 0 1 -14.23 19.74z"></path></svg>
            </button>
        </div>
    </div>`
})

//localStorage.removeItem("carrinho");
const botoesCarrinho = document.querySelectorAll(".botaoprodutos");

botoesCarrinho.forEach( (botao, i) => {
    botao.addEventListener("click", () => {
        let id = listaGiftCard[i].id;
        let nome = listaGiftCard[i].nome;
        let valor = listaGiftCard[i].valor;

        let carrinho = JSON.parse(localStorage.getItem("carrinho"));
        if( carrinho == null) {
            carrinho = [];
        }

        var total = 1;
        var gift = {
            id,
            nome,
            valor,
            quant: total,
        }

        function retorna() {
            let bool = false;
            carrinho.forEach( (item) => {
                if(item.id == id) {
                    item["quant"] += 1;
                    bool = true;
                }
            })
            localStorage.setItem("carrinho", JSON.stringify(carrinho));
            return bool;   
        }

        if(!retorna()) {
            carrinho.push(gift)
            localStorage.setItem("carrinho", JSON.stringify(carrinho));
        }
        mensagem(`${nome} adicionado ao carrinho!`);

    })
})

const nome = document.getElementById("nome");
const valor = document.getElementById("valor");
const enviar = document.getElementById("enviar");
const file = document.getElementById("file");
const formzinho = document.getElementById("formzinho");

formzinho.addEventListener("submit", (e) => {
    e.preventDefault()
listaGiftCard.push(
    {
        id: 9,
        imagem: 'img/mobilelegends.jpg',
        nome: nome.value,
        valor: valor.value
    }
    )
    reescrever()
    console.log(listaGiftCard);
})