const lista = document.getElementById("section-gift-card");

const categoriaNovo = document.getElementById("categoria");
const categoriaEditar = document.getElementById("categoria-editar");
const selectEdit = document.getElementById("select-product-edit");

refresh();

const nomeEditar = document.getElementById("nome-editar");
const valorEditar = document.getElementById("valor-editar");

selectEdit.addEventListener("change", (e) => {
  fetch(URL_API + `product/product-by-id.php?id=${e.target.value}`)
  .then(res => res.json())
  .then(res => {
    nomeEditar.value = res.name;
    valorEditar.value = res.price;
    categoriaEditar.value = res.id_category;
    console.log(res)
  })
});

const formEditar = document.getElementById("formzinho-editar");
formEditar.addEventListener("submit", (e) => {
  e.preventDefault();

  if(e.submitter.id == "alterar") {
    let formData = new FormData();
    formData.append("id", selectEdit.value);
    formData.append("name", nomeEditar.value);
    formData.append("price", valorEditar.value);
    formData.append("category", categoriaEditar.value);
  
    fetch(URL_API + "product/product-update.php", {
      method: "POST",
      body: formData,
    })
      .then((res) => res.json())
      .then((res) => {
        mensagem(res.message)
        if(res.status) {
          e.target.reset()
          refresh()
        }
      });
  }

  if(e.submitter.id == "remover") {
    deletarItem(selectEdit.value)
  }

});

function deletarItem(id) {
  const formData = new FormData();
  formData.append('id', id);
  fetch(URL_API + "product/product-delete.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.json())
  .then(res => {
    mensagem(res.message)
    if(res.status) {
      refresh();
    }
  })
}

////////////////////////
//////////// CRIAR NOVO
////////////////////////

const formNovo = document.getElementById("formzinho");
formNovo.addEventListener("submit", (e) => {
  e.preventDefault();

  const nome = document.getElementById("nome").value;
  const valor = document.getElementById("valor").value;
  const file = document.getElementById("file").files[0];

  const formData = new FormData();
  formData.append("name", nome);
  formData.append("price", valor);
  formData.append("category", categoriaNovo.value);
  formData.append("product-img", file);

  fetch(URL_API + "product/products-insert.php", {
    method: "POST",
    body: formData,
  })
    .then((res) => res.json())
    .then((res) => {
      mensagem(res.message)
      if(res.status) {
        e.target.reset()
        refresh()
      }
    });
});

////////////////////////
//////////// FUNÇÕES ATUALIZA TELA
////////////////////////

function renderCategories(element) {
  fetch(URL_API + "product/categories-list.php")
    .then((res) => res.json())
    .then((res) => {
      element.innerHTML =
        "<option disabled selected>Escolha a categoria</option>";
      res.forEach((item) => {
        element.innerHTML += `<option value="${item.id}">${item.name}</option>`;
      });
    });
}

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

function renderEditSelect() {
  fetch(URL_API + "product/products-list.php")
    .then((res) => res.json())
    .then((res) => {
      selectEdit.innerHTML =
        "<option disabled selected>Escolha o produto</option>";
      res.forEach((item) => {
        selectEdit.innerHTML += `<option value="${item.id}">${item.name}</option>`;
      });
    });
}

function refresh() {
  renderProducts()
  renderCategories(categoriaNovo);
  renderCategories(categoriaEditar);
  renderEditSelect();
}