<?php

function saveImage($file, $destination) {
    if (!$file) return false;

    $tmpFile = $file["tmp_name"];
    $fileExtension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    $targetDirectory = __DIR__ . "/storage/$destination/";
    
    if (!is_dir($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }
    
    $targetFile = $targetDirectory . md5(microtime()) . "." . $fileExtension;

    checkFile($file);

    if (move_uploaded_file($tmpFile, $targetFile)) {
        return $targetFile; 
    }

    return false;
}


function checkFile($file) {
    $supportedExtension = ["jpg", "jpeg", "png"];
    $MB1 = 1000000;
    $fileExtension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

    if ($file["error"] == UPLOAD_ERR_INI_SIZE || $file["size"] > 5 * $MB1) {
        echo json_encode([
            "status" => false,
            "message" => "Arquivo excedeu limite de tamanho.",
        ]);
        exit;
    }

    if (!in_array($fileExtension, $supportedExtension)) {
        echo json_encode([
            "status" => false,
            "message" => "Apenas arquivos JPG, JPEG, PNG são permitidos.",
        ]);
        exit;
    }
}