<?php

const CONF_HOST = 'localhost';
const CONF_DB_NAME = 'shopprime';
const CONF_USERNAME = 'root';
const CONF_PASSWORD = '';

$SQL_FILES = ["shopprime.sql"];

function message($message)
{
    return "<p style='
    display: block;
    width: 100%;
    text-align: center;
    padding: 10px; 
    border: 1px solid dodgerblue; 
    border-radius: 10px; 
    background-color: deepskyblue;
    '>$message</p>";
}

function dbExist($pdo) : bool {
    try {
        $pdo->exec("USE shopprime;");

        if($pdo->exec("SELECT * FROM users;") == 0) {
            return true;
        }

        return false;
    } catch (Exception|Error $e){
        return false;
    }
}

function initializeTestDB(array $sqlFiles): void
{
    $pdo = new PDO("mysql:host=". CONF_HOST, CONF_USERNAME, CONF_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(dbExist($pdo)) {
        echo message("Banco de dados ja existe!");
    }

    try {
        foreach ($sqlFiles as $file) {
            $sql = file_get_contents($file);
            if(!$sql) {
                echo message("Algo deu errado... SQL de $file não foi retornado.");
                exit();
            }

            $pdo->exec($sql);
            echo message("Arquivo $file executado com sucesso!");
            echo "<br>";
        }
    } catch (PDOException $e) {
        echo message("Erro na conexão ou na execução do arquivo SQL: " . $e->getMessage());
    } catch (Error $e) {
        $instance = "$"."instance";

        echo message("Erro: $e");
    }
}

echo "<div style='display: flex; width: 100%; height: 100%; align-items: center; justify-content: center; flex-direction: column;'>";

initializeTestDB($SQL_FILES);

echo "</div>";