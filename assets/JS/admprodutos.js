let lista = document.getElementById("section-gift-card");

var listaGiftCard = [
  {
    id: 1,
    imagem: "img/leagueoflegends.jpg",
    nome: "Lol",
    valor: 100,
  },
  {
    id: 2,
    imagem: "img/valorant.jpg",
    nome: "Valorant",
    valor: 240,
  },
  {
    id: 3,
    imagem: "img/wildrift.jpg",
    nome: "Wild Rift",
    valor: 120,
  },
  {
    id: 4,
    imagem: "img/pubgmobile.jpg",
    nome: "PUBG Mobile",
    valor: 50,
  },
  {
    id: 5,
    imagem: "img/googleplay.jpg",
    nome: "Google Play",
    valor: 30,
  },
  {
    id: 6,
    imagem: "img/apple.jpg",
    nome: "Apple",
    valor: 50,
  },
  {
    id: 7,
    imagem: "img/xboxlivegold.jpg",
    nome: "Xbox Live Gold",
    valor: 200,
  },
  {
    id: 8,
    imagem: "img/netflix.jpg",
    nome: "Netflix",
    valor: 110,
  },
];
function reescrever(list) {
  lista.innerHTML = "";
  if(!list) list = listaGiftCard; 
  list.forEach((item, index) => {
    lista.innerHTML += `
        <div class="produtos">
           <img src="${item.imagem}">
            <div class="nomeprodutos">${item.nome}</div>
            <hr class="divisordeprodutos">
            <div class="produtospart2">
                <div class="precoprodutos"><span>$</span>${item.valor}</div>
            </div>
            <div>
        </div>
        </div>`;
  });
}
reescrever();
//localStorage.removeItem("carrinho");
const botoesCarrinho = document.querySelectorAll(".botaoprodutos");

botoesCarrinho.forEach((botao, i) => {
  botao.addEventListener("click", () => {
    let id = listaGiftCard[i].id;
    let nome = listaGiftCard[i].nome;
    let valor = listaGiftCard[i].valor;

    let carrinho = JSON.parse(localStorage.getItem("carrinho"));
    if (carrinho == null) {
      carrinho = [];
    }

    var total = 1;
    var gift = {
      id,
      nome,
      valor,
      quant: total,
    };

    function retorna() {
      let bool = false;
      carrinho.forEach((item) => {
        if (item.id == id) {
          item["quant"] += 1;
          bool = true;
        }
      });
      localStorage.setItem("carrinho", JSON.stringify(carrinho));
      return bool;
    }

    if (!retorna()) {
      carrinho.push(gift);
      localStorage.setItem("carrinho", JSON.stringify(carrinho));
    }
    mensagem(`${nome} adicionado ao carrinho!`);
  });
});

const enviar = document.getElementById("enviar");

const nome = document.getElementById("nome");
const valor = document.getElementById("valor");
const categoria = document.getElementById("categoria")

const file = document.getElementById("file");
const formzinho = document.getElementById("formzinho");

formzinho.addEventListener("submit", (e) => {
  e.preventDefault();

  const nome = document.getElementById("nome");
  const valor = document.getElementById("valor");
  const categoria = document.getElementById("categoria")

  let formData = new FormData();
  formData.append("name", nome.value)
  formData.append("price", valor.value)
  formData.append("category", categoria.value)
  formData.append("product-img", file.files[0])

  fetch(URL_API + 'product/products-insert.php', {
    method: "POST",
    body: formData
  })
  .then(res => res.json())
  .then(res => {
    console.log(res)
  })


  // listaGiftCard.push({
  //   id: 9,
  //   imagem: "img/mobilelegends.jpg",
  //   nome: nome.value,
  //   valor: valor.value,
  // });
  // reescrever();
  // console.log(listaGiftCard);
});

function excluirItem(index) {
  listaGiftCard.splice(index, 1);
  reescrever();
  console.log(listaGiftCard);
}



function renderCategories() {
  fetch(URL_API + 'product/categories-list.php')
  .then(res => res.json())
  .then(res => {
    categoria.innerHTML = "<option disabled selected>Selecione uma opção</option>";
    res.forEach(item => {
      categoria.innerHTML += `<option value="${item.id}">${item.name}</option>`
    })
  })
}

renderCategories()