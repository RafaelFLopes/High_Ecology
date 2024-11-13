<?php
include '../php/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM conteudos WHERE id = ?");
    $stmt->execute([$id]);
    $conteudo = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titulo = $_POST['titulo'];
        $modulo = $_POST['modulo'];
        $descricao = $_POST['descricao'];
        $conteudoText = $_POST['conteudo'];
        $imagemPath = $conteudo['imagem_c'];

        if (isset($_FILES['imagem_C']) && $_FILES['imagem_c']['error'] == UPLOAD_ERR_OK) {
            $nomeImagem = uniqid() . '_' . $_FILES['imagem_c']['name'];
            $destinoImagem = '../img/uploads/' . $nomeImagem;
            if (move_uploaded_file($_FILES['imagem_c']['tmp_name'], $destinoImagem)) {
                $imagemPath = $destinoImagem;
            }
        }

        $stmt = $pdo->prepare("UPDATE conteudos SET titulo = ?, modulo = ?, descricao = ?, imagem_C = ?, conteudo = ? WHERE id = ?");
        $stmt->execute([$titulo, $modulo, $descricao, $imagemPath, $conteudoText, $id]);

        header("Location: gerenciar-conteudo.php");
        exit();
    }
} else {
    header("Location: gerenciar-conteudo.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Conteúdo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Conteúdo</h1>
        <form method="post" action="" enctype="multipart/form-data">
            <label>Título:</label>
            <input type="text" name="titulo" value="<?= $conteudo['titulo'] ?>" class="form-control" required>

            <label>Módulo:</label>
            <input type="text" name="modulo" value="<?= $conteudo['modulo'] ?>" class="form-control" required>

            <label>Descrição:</label>
            <textarea name="descricao" class="form-control" required><?= $conteudo['descricao'] ?></textarea>

            <!-- Drop File para Imagem com Visualização -->
            <label>Imagem Atual:</label><br>
            <img src="<?= $conteudo['imagem_c'] ?>" alt="Imagem Atual" style="max-width: 200px; margin-bottom: 10px;"><br>
            <label>Trocar Imagem:</label>
            <div class="drop-zone" id="drop-zone">
                Arraste e solte uma nova imagem ou clique para escolher
                <input type="file" name="imagem_c" id="imagem_c" accept="image/*" hidden>
            </div>

            <label>Conteúdo:</label>
            <textarea name="conteudo" class="form-control" required><?= $conteudo['conteudo'] ?></textarea>

            <button type="submit" class="btn btn-primary mt-3">Salvar</button>
        </form>
    </div>

    <script>
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('imagem_c');

        dropZone.addEventListener('click', () => fileInput.click());
        dropZone.addEventListener('dragover', (e) => e.preventDefault());
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            fileInput.files = e.dataTransfer.files;
            dropZone.innerText = fileInput.files[0].name;
        });

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length) {
                dropZone.innerText = fileInput.files[0].name;
            }
        });
    </script>
</body>
</html>
