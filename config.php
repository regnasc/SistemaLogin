<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'formulario-cadastro2';

try {
    $conexao = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUsername, $dbPassword);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Se você quiser verificar a conexão bem-sucedida, pode adicionar uma mensagem de sucesso
    // echo "Conexão efetuada com sucesso";
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}

?>
