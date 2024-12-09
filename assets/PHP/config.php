<?php
$host = ''; // Endereço do banco de dados
$dbname = ''; // Nome do banco de dados
$username = ''; // Usuário do banco de dados
$password = ''; // Senha do banco de dados

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Conexão falhou: ' . $e->getMessage();
}
?>