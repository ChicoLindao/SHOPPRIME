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
      products.forEach((item, i) => {
        lista.innerHTML += `
          <div class="produtos">
            <img src="${item.img}" alt="${item.name}" />
            <div class="nomeprodutos">${item.name}</div>
            <hr class="divisordeprodutos">
            <div class="produtospart2">
              <div class="precoprodutos"><span>$</span>${item.price}</div>
                    <button class="botaoprodutos">
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m397.78 316h-205.13a15 15 0 0 1 -14.65-11.67l-34.54-150.48a15 15 0 0 1 14.62-18.36h274.27a15 15 0 0 1 14.65 18.36l-34.6 150.48a15 15 0 0 1 -14.62 11.67zm-193.19-30h181.25l27.67-120.48h-236.6z">
                        </path>
                        <path
                            d="m222 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z">
                        </path>
                        <path
                            d="m368.42 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z">
                        </path>
                        <path
                            d="m158.08 165.49a15 15 0 0 1 -14.23-10.26l-25.71-77.23h-47.44a15 15 0 1 1 0-30h58.3a15 15 0 0 1 14.23 10.26l29.13 87.49a15 15 0 0 1 -14.23 19.74z">
                        </path>
                    </svg>
                </button>
            </div>
          </div>`;
      });

      const botoesCarrinho = document.querySelectorAll(".botaoprodutos");

      botoesCarrinho.forEach((botao, index) => {
        botao.addEventListener("click", () => {
            const product = products[index];
    
            if (!product) {
                console.log("Produto não encontrado.");
                return;
            }
    
            const carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
    
            const existingProduct = carrinho.find(item => item.id === product.id);
    
            if (existingProduct) {
                existingProduct.quant += 1;
            } else {
                const newProduct = {
                    id: product.id,
                    nome: product.name,
                    valor: product.price,
                    quant: 1
                };
                carrinho.push(newProduct);
            }
    
            localStorage.setItem("carrinho", JSON.stringify(carrinho));
    
            mensagem(`Produto "${product.name}" adicionado ao carrinho!`);
        });
    });
    
    });
  }
