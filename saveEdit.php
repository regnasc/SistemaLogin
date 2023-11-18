<?php
include_once('config.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    try {
        $sqlUpdate = "UPDATE usuarios 
            SET nome=:nome, senha=:senha, email=:email, telefone=:telefone, sexo=:sexo, data_nasc=:data_nasc, cidade=:cidade, estado=:estado, endereco=:endereco
            WHERE id=:id";

        $stmtUpdate = $conexao->prepare($sqlUpdate);
        $stmtUpdate->bindParam(':id', $id);
        $stmtUpdate->bindParam(':nome', $nome);
        $stmtUpdate->bindParam(':senha', $senha);
        $stmtUpdate->bindParam(':email', $email);
        $stmtUpdate->bindParam(':telefone', $telefone);
        $stmtUpdate->bindParam(':sexo', $sexo);
        $stmtUpdate->bindParam(':data_nasc', $data_nasc);
        $stmtUpdate->bindParam(':cidade', $cidade);
        $stmtUpdate->bindParam(':estado', $estado);
        $stmtUpdate->bindParam(':endereco', $endereco);

        $stmtUpdate->execute();
    } catch (PDOException $e) {
        echo "Erro na atualização: " . $e->getMessage();
    }
}

header('Location: sistema.php');
?>
