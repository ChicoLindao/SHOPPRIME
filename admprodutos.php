<?php
session_start(); 
if(!isset($_SESSION["user"])) {
    header("Location: ./index.html");
}
if ($_SESSION["user"]["role"] != "ADMIN") {
    header("Location: ./produtos.php");
}
?>
<!DOCTYPE html>
<!--
  ,ad8888ba,    ad88888ba  |         88  88888888ba 
 d8"'    `"8b  d8"     "8b |         88  88      "8b
d8'            Y8,         |         88  88      ,8P 
88             `Y8aaaaa,   |         88  88aaaaaa8P'
88               `"""""8b, |         88  88""""""'
Y8,                    `8b |         88  88
 Y8a.    .a8P  Y8a     a8P | 88,   ,d88  88
  `"Y8888Y"'    "Y88888P"  |  "Y8888P"   88
                                            
Copyright © 2024 SHOPPRIME. All rights reserved.
-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/admprodutos.css">
    <link rel="stylesheet" href="assets/CSS/styles.css">
    <script type="text/javascript" src="assets/JS/admprodutos.js" async></script>
    <title>SHOPPRIME</title>
    <link rel="Website Icon" type="png" href="img/LOGO.png">
</head>

<body>
    <nav>
        <div class="logo">SHOPPRIME / ADM</div>


        <div class="container">
            <div class="abas">
                <input type="radio" id="radio-1" name="abas">
                <label class="aba" for="radio-1"><a href="celular.php">Celular</a></label>
                <input type="radio" id="radio-2" name="abas">
                <label class="aba" for="radio-2"><a href="jogoscelular.php">Jogos para celular</a></label>
                <input type="radio" id="radio-3" name="abas">
                <label class="aba" for="radio-3"><a href="assinaturas.php">Assinaturas</a></label>
                <input type="radio" id="radio-4" name="abas">
                <label class="aba" for="radio-4"><a href="jogoscomputador.php">Jogos para computadores</a></label>
                <span class="voador"></span>
            </div>
        </div>

        <ul>
            <a href="carrinho.php">
                <button>
                    <span class="buttonalto">
                        Carrinho
                    </span>
                </button>
            </a>
            <?php if (isset($_SESSION["user"])): ?>
                <button id="logout">
                <span class="buttonalto">
                    Sair
                </span>
            </button>
            <?php endif; ?>
        </ul>
    </nav>
    <section id="section-gift-card">
    </section>
    </div>
    <div class="admcadastrar">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="containerChavao">
            <form id="formzinho" class="formulario">
                <p class="titulo">Registrar produto </p>
                <p class="message">Adicione as informações do produto </p>
                <div class="flex">
                </div>
                <label for="file" class="enviarimagem">
                    <div class="icon">
                        <svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z"
                                    fill=""></path>
                            </g>
                        </svg>
                    </div>
                    <div class="text">
                        <span>Clique para adicionar imagem</span>
                    </div>
                    <input id="file" type="file">
                </label>
                <label>
                    <input id="nome" type="text" class="input">
                    <span>Nome</span>
                </label>

                <label>
                    <input id="valor" type="number" class="input">
                    <span>Preço</span>
                </label>
                <label>
                    <select id="categoria" type="text" class="input">
                        <option id="1">Escolha a categoria</option>
                        <option id="2">Celular</option>
                        <option id="3">Assinaturas</option>
                        <option id="4">Jogos para celulares</option>
                        <option id="5">Jogos para computadores</option>
                    </select>
                    <span>Selecionar categoria</span>
                </label>
                <input type="submit" id='enviar' class="enviar" value="Adicionar">
            </form>
        </div>

        <form id="formzinho-editar" class="formulario">
            <p class="titulo2">Alterar Produto </p>
            <p class="message">Altere as informações do produto </p>
            <div class="flex">
            </div>
            <label>
                <select id="select-product-edit" type="text" class="input2">
                    <option id="1">Escolha o produto</option>
                    <option id="2">Criar novo</option>
                    <option id="3">Lol</option>
                    <option id="4">Valorant</option>
                    <option id="5">Wild Rift</option>
                    <option id="5">PUBG Mobile</option>
                    <option id="5">Google Play</option>
                    <option id="5">Apple</option>
                    <option id="5">Xbox Live Gold</option>
                    <option id="5">Netflix</option>
                </select>
                <span>Selecionar produto</span>
            </label>
            <!-- <label for="file" class="enviarimagem2">
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z"
                            fill=""></path>
                    </g>
                </svg>
            </div>
            <div class="text">
                <span>Clique para adicionar imagem</span>
            </div>
            <input id="file" type="file">
        </label> -->
            <label>
                <input id="nome-editar" type="text" class="input2">
                <span>Nome</span>
            </label>

            <label>
                <input id="valor-editar" type="number" class="input2">
                <span>Preço</span>
            </label>
            <label>
                <select id="categoria-editar" type="text" class="input2">

                </select>
                <span>Selecionar categoria</span>
            </label>
            <input type="submit" id='alterar' class="enviar" value="Alterar">
            <input type="submit" id='remover' class="enviar2" value="Remover">
        </form>
    </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <footer class="footer">
        <p>&copy; 2024 SHOPPRIME | Todos os direitos reservados.</p>
        <p>Desenvolvido por Chico</p>
    </footer>
    <script type="text/javascript" src="assets/JS/scripts.js"></script>
</body>
</html>