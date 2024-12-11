<?php
include_once '../../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post = filter_input_array(INPUT_POST);

    if(!isset($post['id'])) {
        echo json_encode([
            "status" => false,
            "message" => "ID não enviado."
        ]);
        exit;
    }

    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$post['id']]);

    echo json_encode([
        "status" => true,
        "message" => "Produto deletado com sucesso."
    ]);
}
?>
