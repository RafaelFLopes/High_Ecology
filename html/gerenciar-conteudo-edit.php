<?php
include '../php/config.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM conteudos WHERE id = ?");
$stmt->execute([$id]);
$conteudo = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $interativo = $_POST['interativo'];

    if (!empty($_FILES['imagem']['name'])) {
        $imagem = basename($_FILES['imagem']['name']);
        $target = '../img/uploads/' . $imagem;
        move_uploaded_file($_FILES['imagem']['tmp_name'], $target);
    } else {
        $imagem = $conteudo['imagem'];
    }

    $stmt = $pdo->prepare("UPDATE conteudos SET titulo = ?, texto = ?, imagem = ?, interativo = ? WHERE id = ?");
    $stmt->execute([$titulo, $texto, $imagem, $interativo, $id]);

    header('Location: gerenciar-conteudo.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Conteúdo</title>
</head>
<body>
    <h1>Editar Conteúdo</h1>
    <form action="gerenciar-conteudo-edit.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="<?= htmlspecialchars($conteudo['titulo']) ?>" required><br>

        <label for="texto">Texto:</label>
        <textarea name="texto" required><?= htmlspecialchars($conteudo['texto']) ?></textarea><br>

        <label for="imagem">Imagem:</label>
        <input type="file" name="imagem"><br>
        <?php if ($conteudo['imagem']): ?>
            <img src="../img/uploads/<?= htmlspecialchars($conteudo['imagem']) ?>" alt="Imagem" width="100">
        <?php endif; ?><br>

        <label for="interativo">Interativo:</label>
        <textarea name="interativo"><?= htmlspecialchars($conteudo['interativo']) ?></textarea><br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
