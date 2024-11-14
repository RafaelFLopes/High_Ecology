<?php
include '../php/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $interativo = $_POST['interativo'];

    // Upload da imagem
    if (!empty($_FILES['imagem']['name'])) {
        $imagem = basename($_FILES['imagem']['name']);
        $target = '../img/uploads/' . $imagem;
        move_uploaded_file($_FILES['imagem']['tmp_name'], $target);
    } else {
        $imagem = null;
    }

    $stmt = $pdo->prepare("INSERT INTO conteudos (titulo, texto, imagem, interativo) VALUES (?, ?, ?, ?)");
    $stmt->execute([$titulo, $texto, $imagem, $interativo]);

    header('Location: gerenciar-conteudo.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Conteúdo</title>
</head>
<body>
    <h1>Criar Novo Conteúdo</h1>
    <form action="gerenciar-conteudo-create.php" method="post" enctype="multipart/form-data">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required><br>

        <label for="texto">Texto:</label>
        <textarea name="texto" required></textarea><br>

        <label for="imagem">Imagem:</label>
        <input type="file" name="imagem"><br>

        <label for="interativo">Interativo:</label>
        <textarea name="interativo"></textarea><br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
