<?php
include '../php/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $modulo = $_POST['modulo'];
    $descricao = $_POST['descricao'];
    $conteudo = $_POST['conteudo'];

    // Verifica se a imagem foi enviada sem erros
    if (isset($_FILES['imagem_c']) && $_FILES['imagem_c']['error'] === UPLOAD_ERR_OK) {
        $nomeImagem = uniqid() . '_' . basename($_FILES['imagem_c']['name']);
        $destinoImagem = __DIR__ . '../img/uploads/' . $nomeImagem;

        // Move o arquivo de upload para o diretório de destino
        if (move_uploaded_file($_FILES['imagem_c']['tmp_name'], $destinoImagem)) {
            // Caminho relativo para salvar no banco de dados
            $caminhoImagemBD = '../img/uploads/' . $nomeImagem;

            // Insere no banco de dados com o caminho da imagem
            $stmt = $pdo->prepare("INSERT INTO conteudos (titulo, modulo, descricao, imagem_c, conteudo) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$titulo, $modulo, $descricao, $caminhoImagemBD, $conteudo]);

            header("Location: gerenciar-conteudo.php");
            exit();
        } else {
            $erro = "Falha ao mover a imagem para o diretório de uploads.";
        }
    } else {
        $erro = "Imagem não enviada corretamente ou nenhum arquivo foi selecionado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Conteúdo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .drop-zone {
            border: 2px dashed #007bff;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            color: #6c757d;
        }
        .drop-zone.dragover {
            border-color: #0056b3;
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Criar Conteúdo</h1>
        <?php if (isset($erro)) echo "<p class='text-danger'>$erro</p>"; ?>
        <form method="post" action="" enctype="multipart/form-data">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>

            <label for="modulo">Módulo:</label>
            <input type="text" name="modulo" id="modulo" class="form-control" required>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control" required></textarea>

            <!-- Drop File para Imagem -->
            <label>Imagem:</label>
            <div class="drop-zone" id="drop-zone">
                Arraste e solte a imagem aqui ou clique para selecionar
                <input type="file" name="imagem_c" id="imagem_c" accept="image/*" hidden>
            </div>

            <label for="conteudo">Conteúdo:</label>
            <textarea name="conteudo" id="conteudo" class="form-control" required></textarea>

            <button type="submit" class="btn btn-primary mt-3">Salvar</button>
        </form>
    </div>

    <script>
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('imagem_c');

        dropZone.addEventListener('click', () => fileInput.click());

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('dragover');
        });

        dropZone.addEventListener('dragleave', () => dropZone.classList.remove('dragover'));

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('dragover');
            if (e.dataTransfer.files.length) {
                fileInput.files = e.dataTransfer.files;
            }
        });

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length) {
                dropZone.innerText = fileInput.files[0].name;
            }
        });
    </script>
</body>
</html>
