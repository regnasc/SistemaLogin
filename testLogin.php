<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once('config.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        } else {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: sistema.php');
        }
    } catch (PDOException $e) {
        echo "Erro na consulta: " . $e->getMessage();
    }
} else {
    header('Location: login.php');
}
?>
