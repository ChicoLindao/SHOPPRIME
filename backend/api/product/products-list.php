<?php
include_once '../../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM products";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        $response[] = $row;
    }
    echo json_encode($response);
}
?>