<?php
include_once '../../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $category_id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id_category = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$category_id]);
    $products = $stmt->fetchAll(PDO::FETCH_OBJ);

    echo json_encode($products);
}
?>