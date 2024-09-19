<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $data_base = 'agenda';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$data_base", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Falha em conexão com o banco de dados: " . $e->getMessage();
        die();
    }
?>