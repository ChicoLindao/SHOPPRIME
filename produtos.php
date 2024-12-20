<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/produtos.css">
    <link rel="stylesheet" href="assets/CSS/styles.css">
    <script type="text/javascript" src="assets/JS/produtos.js" async></script>
    <title>SHOPPRIME</title>
    <link rel="Website Icon" type="png" href="img/LOGO.png">
</head>

<body>
    <nav>
        <div class="logo">SHOPPRIME</div>


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
            <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] == "ADMIN"): ?>
            <a href="admprodutos.php">
                <button>
                    <span class="buttonalto">
                        Administrador
                    </span>
                </button>
            </a>
            <?php endif; ?>

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
            <?php else: ?>
            <a href="index.html">
                <button>
                    <span class="buttonalto">
                        Login
                    </span>
                </button>
            </a>
            <?php endif; ?>
        </ul>
    </nav>
    <section id="section-gift-card">
        <div class="produtos">
            <img src="img/xcox.png">
            <div class="nomeprodutos">Xcox game pepsi</div>
            <hr class="divisordeprodutos">
            <div class="produtospart2">
                <div class="precoprodutos"><span>$</span>9</div>
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
        </div>
    </section>
    </div>
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