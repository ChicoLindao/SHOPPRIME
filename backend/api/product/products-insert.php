<?php
include_once '../../config.php';
include_once '../../utils.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $post = filter_input_array(INPUT_POST);
    foreach($post as $key) {
        if(empty($key)) {
            echo json_encode([
                "status" => false,
                "message" => "Nenhum dos valores pode ser nulo!",
            ]);
            exit;
        }
    }
    
    $name = $post['name'];
    
    $price = $post['price'];
    
    $imgFile = $_FILES['product-img'];

    // $category_id = $post['category_id'];

    $imgDestination = saveImage($imgFile, "products");

    if(!$imgDestination) {
        echo json_encode([
            'status' => false,
            'message' => 'Erro ao salvar a imagem'
        ]);
        exit;
    }

    $sql = "INSERT INTO products (name, price, img) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $price, $imgDestination]);

    echo json_encode([
        'status' => true,
        'message' => 'Produto inserido com sucesso'
    ]);
}
?>