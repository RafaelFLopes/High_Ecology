<?php
include('../php/config.php'); // Inclui a configuração do banco de dados

// Obtém o ID do curso a ser deletado
$id = $_GET['id'];

// Prepara e executa a query de exclusão
$stmt = $pdo->prepare('DELETE FROM cursos WHERE id = ?');
$stmt->execute([$id]);

// Redireciona para a lista de cursos após a exclusão
header('Location: ../html/gerenciar-cursos.php');
?>