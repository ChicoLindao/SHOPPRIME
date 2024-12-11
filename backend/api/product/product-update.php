<?php
include_once '../../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category'];

    $sql = "UPDATE products SET name = ?, price = ?, id_category = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $price, $category_id, $id]);

    echo json_encode([
        'status' => true,
        'message' => 'Produto atualizado com sucesso'
    ]);
}
?>