<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM conteudos WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: ../html/gerenciar-conteudo.php");
    exit();
} else {
    header("Location: ../html/gerenciar-conteudo.php");
    exit();
}
?>
