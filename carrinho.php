<?php
session_start(); 
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
<html>

<head>
    <title>Carrinho</title>
    <link rel="stylesheet" href="assets/CSS/carrinho.css">
    <link rel="stylesheet" href="assets/CSS/styles.css">
    <script type="text/javascript" src="assets/JS/carrinho.js" async></script>
    <link rel="Website Icon" type="png" href="img/LOGO.png">
</head>

<body>
    <nav>
        <a href="produtos.php">
            <div class="logo">SHOPPRIME</div>
        </a>

        <ul>
            <?php if (isset($_SESSION["user"])): ?>
            <button id="logout" class="usandoagorahoje">
                <span class="buttonalto">
                    Sair
                </span>
            </button>
            <?php else: ?>
            <a href="index.html">
                <button class="usandoagorahoje">
                    <span class="buttonalto">
                        Login
                    </span>
                </button>
            </a>
            <?php endif; ?>
        </ul>
    </nav>
    <main>
        <div class="titulodapagina">Seu Carrinho</div>
        <div class="conteudo">
            <section>
                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Total</th>
                            <th>Remover</th>
                        </tr>
                    </thead>
                    <tbody id="lista-carrinho">
                    </tbody>
                </table>
            </section>
            <aside>
                <div class="testeserio">
                    <header>Valor da compra</header>
                    <footer>
                        <span>Total</span>
                        <span id="total"></span>
                    </footer>
                </div>
                <button id="submit-compra">Finalizar Compra</button>
            </aside>
        </div>
    </main>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <footer class="footer">
        <p>&copy; 2024 SHOPPRIME | Todos os direitos reservados.</p>
        <p>Desenvolvido por Chico</p>
    </footer>
    <script type="text/javascript" src="assets/JS/scripts.js"></script>
</body>
</html>