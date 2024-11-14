<?php
include 'config.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM conteudos WHERE id = ?");
$stmt->execute([$id]);

header('Location: ../html/gerenciar-conteudo.php');
?>
