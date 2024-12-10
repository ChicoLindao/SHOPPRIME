<?php
include_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    $sql = "UPDATE products SET name = ?, description = ?, price = ?, category_id = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $description, $price, $category_id, $id]);

    echo json_encode(['message' => 'Produto atualizado com sucesso']);
}
?>