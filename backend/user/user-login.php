<?php
include_once '../config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!$email || !$password) {
        echo json_encode([
            'status' => false,
            'message' => 'E-mail e senha são obrigatórios'
        ]);
        exit;
    }

    try {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            echo json_encode([
                'status' => true,
                'message' => 'Login bem-sucedido'
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'E-mail ou senha incorretos'
            ]);
        }
    } catch (PDOException $e) {
        echo json_encode([
            'status' => false,
            'message' => 'Erro no servidor, tente novamente mais tarde'
        ]);
    }
} else {
    echo json_encode([
        'status' => false,
        'message' => 'Método não permitido'
    ]);
}
?>
