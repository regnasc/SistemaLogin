<?php
include_once('config.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sqlSelect = "SELECT * FROM usuarios WHERE id=:id";
        $stmtSelect = $conexao->prepare($sqlSelect);
        $stmtSelect->bindParam(':id', $id);
        $stmtSelect->execute();

        if ($stmtSelect->rowCount() > 0) {
            $sqlDelete = "DELETE FROM usuarios WHERE id=:id";
            $stmtDelete = $conexao->prepare($sqlDelete);
            $stmtDelete->bindParam(':id', $id);
            $stmtDelete->execute();
        }
    } catch (PDOException $e) {
        echo "Erro na exclusão: " . $e->getMessage();
    }
}

header('Location: sistema.php');
?>
