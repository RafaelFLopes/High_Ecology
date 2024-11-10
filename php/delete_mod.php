<?php
include('../php/config.php'); // Inclui a configuração do banco de dados

// Obtém o ID do curso a ser deletado
$id_mod = $_GET['id_mod'];

// Prepara e executa a query de exclusão
$stmt = $pdo->prepare('DELETE FROM modulos WHERE id_mod = ?');
$stmt->execute([$id_mod]);

// Redireciona para a lista de cursos após a exclusão
header('Location: ../html/gerenciar-modulos.php');
?>