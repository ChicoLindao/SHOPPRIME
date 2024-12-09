<?php
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $user = $stmt->fetch();

    if ($user) {
        echo json_encode($user);
    } else {
        echo json_encode(['message' => 'Usuário não encontrado']);
    }
}
?>