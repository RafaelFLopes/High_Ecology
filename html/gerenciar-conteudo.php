<?php
include '../php/config.php'; // Inclui o arquivo de conexão com o banco de dados
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Gerenciar Conteúdo</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Gerenciar Conteúdo</h1>
        <div class="mt-4">
            <a href="gerenciar-conteudo-create.php" class="btn btn-primary">Criar Conteúdo</a>
            <a href="gerenciar-conteudo-edit.php" class="btn btn-warning">Editar Conteúdo</a>
            <a href="../php/delete_conteudo" class="btn btn-danger">Deletar Conteúdo</a>
        </div>
        <hr>
        <!-- Listagem de conteúdos -->
        <h2>Conteúdos Cadastrados</h2>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Módulo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT id, titulo, modulo FROM conteudos");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['titulo'] . "</td>";
                    echo "<td>" . $row['modulo'] . "</td>";
                    echo "<td>";
                    echo "<a href='editar.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Editar</a> ";
                    echo "<a href='deletar.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Deletar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
