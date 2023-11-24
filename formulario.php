<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('config.php');

    try {
        $conexao = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUsername, $dbPassword);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conexao->prepare("INSERT INTO usuarios(nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco) 
            VALUES (:nome, :senha, :email, :telefone, :sexo, :data_nasc, :cidade, :estado, :endereco)");

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $data_nasc = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':data_nasc', $data_nasc);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':endereco', $endereco);

        $stmt->execute();

        http_response_code(201);
        echo json_encode(array('success' => true, 'redirect' => 'home.html'));
    } catch (PDOException $e) {
        http_response_code(400); 
        echo json_encode(array('success' => false, 'error' => 'Erro na inserção de dados: ' . $e->getMessage()));
    }
} else {
    http_response_code(405); 
    echo json_encode(array('success' => false, 'error' => 'Método não permitido.'));
}
?>
