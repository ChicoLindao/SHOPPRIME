<?php
include_once '../../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $name = $_GET['name'];

    $sql = "SELECT * FROM products WHERE name LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['%' . $name . '%']);
    $products = $stmt->fetchAll();

    echo json_encode($products);
}
?>