<?php
include_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $category_id = $_GET['category_id'];

    $sql = "SELECT * FROM products WHERE category_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$category_id]);
    $products = $stmt->fetchAll();

    echo json_encode($products);
}
?>