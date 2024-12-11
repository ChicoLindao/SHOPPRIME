let lista = document.getElementById("section-gift-card");

var listaGiftCard = [
    {
        id: 1,
        imagem: 'img/leagueoflegends.jpg',
        nome: "Lol",
        valor: 100
    },
    {
        id: 2,
        imagem: 'img/valorant.jpg',
        nome: "Valorant",
        valor: 240
    },
    {
        id: 3,
        imagem: 'img/wildrift.jpg',
        nome: "Wild Rift",
        valor: 120
    },
    {
        id: 4,
        imagem: 'img/pubgmobile.jpg',
        nome: "PUBG Mobile",
        valor: 50
    },
    {
        id: 5,
        imagem: 'img/googleplay.jpg',
        nome: "Google Play",
        valor: 30
    },
    {
        id: 6,
        imagem: 'img/apple.jpg',
        nome: "Apple",
        valor: 50
    },
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
    },
]

renderProducts()

function renderProducts() {
    fetch(URL_API + "product/products-list.php")
    .then((res) => res.json())
    .then((products) => {
      console.log(products);
  
      lista.innerHTML = "";
      products.forEach((item) => {
        lista.innerHTML += `
          <div class="produtos">
            <img src="${item.img}" alt="${item.name}" />
            <div class="nomeprodutos">${item.name}</div>
            <hr class="divisordeprodutos">
            <div class="produtospart2">
              <div class="precoprodutos"><span>$</span>${item.price}</div>
            </div>
          </div>`;
      });
    });
  }

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