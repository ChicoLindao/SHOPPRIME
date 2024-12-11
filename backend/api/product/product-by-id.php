<?php
include_once '../../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    if(!isset($id)) {
        echo json_encode([
            "status" => false,
            "message" => "ID não enviado."
        ]);
    }

    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_OBJ);

    if ($product) {
        echo json_encode($product);
    } else {
        echo json_encode(['message' => 'Produto não encontrado']);
    }
}
?>