<?php
session_start();
include('../php/config.php');

// Verifica se o ID do módulo foi fornecido
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    die('ID do conteúdo não fornecido.');
}

// Busca o conteúdo existente no banco
$stmt = $pdo->prepare('SELECT * FROM conteudos WHERE id = ?');
$stmt->execute([$id]);
$conteudo = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo_principal = $_POST['titulo_principal'];
    $descricao = $_POST['descricao'];
    $titulo1 = $_POST['titulo1'];
    $texto1 = $_POST['texto1'];
    $imagem1 = $conteudo['imagem1'];
    $titulo2 = $_POST['titulo2'];
    $texto2 = $_POST['texto2'];
    $imagem2 = $conteudo['imagem2'];
    $titulo3 = $_POST['titulo3'];
    $texto3 = $_POST['texto3'];
    $imagem3 = $conteudo['imagem3'];
    $id_modulo = $_SESSION['id_do_modulo'] ?? 0; // Verifica se a variável está definida

    // Upload de imagem 1
    if (!empty($_FILES['imagem1']['name'])) {
        $imagem1 = basename($_FILES['imagem1']['name']);
        $target_dir = "../img/uploads/";
        $target_file = $target_dir . $imagem1;

        if (move_uploaded_file($_FILES['imagem1']['tmp_name'], $target_file)) {
            echo "Imagem 1 atualizada com sucesso!";
        } else {
            echo "Erro ao enviar a imagem 1!";
        }
    }

    // Upload de imagem 2
    if (!empty($_FILES['imagem2']['name'])) {
        $imagem2 = basename($_FILES['imagem2']['name']);
        $target_dir = "../img/uploads/";
        $target_file = $target_dir . $imagem2;

        if (move_uploaded_file($_FILES['imagem2']['tmp_name'], $target_file)) {
            echo "Imagem 2 atualizada com sucesso!";
        } else {
            echo "Erro ao enviar a imagem 2!";
        }
    }

    // Upload de imagem 3
    if (!empty($_FILES['imagem3']['name'])) {
        $imagem3 = basename($_FILES['imagem3']['name']);
        $target_dir = "../img/uploads/";
        $target_file = $target_dir . $imagem3;

        if (move_uploaded_file($_FILES['imagem3']['tmp_name'], $target_file)) {
            echo "Imagem 3 atualizada com sucesso!";
        } else {
            echo "Erro ao enviar a imagem 3!";
        }
    }

    // Atualiza o banco de dados
    $stmt = $pdo->prepare('UPDATE conteudos SET id_modulo = ?, titulo_principal = ?, descricao = ?, titulo1 = ?, texto1 = ?, imagem1 = ?, titulo2 = ?, texto2 = ?, imagem2 = ?, titulo3 = ?, texto3 = ?, imagem3 = ? WHERE id = ?');
    $stmt->execute([$id_modulo, $titulo_principal, $descricao, $titulo1, $texto1, $imagem1, $titulo2, $texto2, $imagem2, $titulo3, $texto3, $imagem3, $id]);

    // Redireciona para a página de gerenciamento
    header('Location: gerenciar-conteudo.php');
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="../css/all.css">

    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/forms.css">

    <link rel="stylesheet" href="../css/conteudo-main-logado.css">
    <?php if ($_SESSION["user"]['tabela'] == "professor") { ?>
        <link rel="stylesheet" href="../css/leftnavbarprofessor.css">
        <link rel="stylesheet" href="../css/topbarprofessor.css">
    <?php } else if ($_SESSION["user"]['tabela'] == "aluno") { ?>
            <link rel="stylesheet" href="../css/leftnavbar.css">
            <link rel="stylesheet" href="../css/topbar.css">
    <?php } ?>
    <link rel="stylesheet" href="../css/editar-perfil.css">

    <script src="../js/perfil.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/gerenciar-cursos.css">

    <title>Editar Perfil - High Ecology</title>
</head>

<body>
    <div class="container-p">
        <div class="navegacao">
            <ul style="padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;">
                <li>
                    <a href="#">
                        <span class="icone">
                            <img src="" alt="">
                        </span>
                        <span class="titulo">HIGH ECOLOGY</span>
                    </a>
                </li>

                <?php
                if ($_SESSION["user"]['tabela'] == "aluno") { ?>
                    <li>
                        <a href="perfil.php">
                            <span class="icone">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="titulo">Home</span>
                        </a>
                    </li>
                <?php } ?>

                <?php
                if ($_SESSION["user"]['tabela'] == "professor") // ALGUM ERRO NA VARIAVEL , VERIFICAAAAAAAAAAAAAAAR
                { ?>
                    <li>
                        <a href="gerenciar-cursos.php">
                            <span class="icone">
                                <ion-icon name="pencil-outline"></ion-icon>
                            </span>
                            <span class="titulo">Gerenciar Cursos</span>
                        </a>
                    </li>
                <?php } ?>


                <li>
                    <a href="#">
                        <span class="icone">
                            <ion-icon name="library-outline"></ion-icon>
                        </span>
                        <span class="titulo">Cursos</span>
                    </a>
                </li>

                <?php
                if ($_SESSION["user"]['tabela'] == "aluno") { ?>
                    <li>
                        <a href="#">
                            <span class="icone">
                                <ion-icon name="trophy-outline"></ion-icon>
                            </span>
                            <span class="titulo">Certificados</span>
                        </a>
                    </li>
                <?php } ?>

                <li>
                    <a href="editar-perfil">
                        <span class="icone">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="titulo">Editar Perfil</span>
                    </a>
                </li>

                <li>
                    <a href="../php/logout.php">
                        <span class="icone">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="titulo">Sair</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="main-p">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="user">
                    <a href="editar-perfil.php">
                        <img src="<?php if ($_SESSION["user"]['tabela'] == "aluno") {
                            echo $_SESSION['dados_user']['img'];
                        } elseif ($_SESSION["user"]['tabela'] == "professor") {
                            echo "../img/icon.png";
                        } ?>" alt="foto de perfil">
                    </a>
                </div>
            </div>


            <!--ADICIONAAAAAAAAAAAAR AQUII VINICIUUUSSSSSSSSS-->

            <header>
                <h1>Editar Conteúdos</h1>
            </header>

            <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="titulo_principal" class="form-label">Título_principal</label>
                        <input type="text" name="titulo_principal"
                            value="<?php echo htmlspecialchars($conteudo['titulo_principal']); ?>" class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea name="descricao" class="form-control" rows="4"
                            required><?php echo htmlspecialchars($conteudo['descricao']); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="titulo1" class="form-label">Primeiro título</label>
                        <input type="text" name="titulo1" value="<?php echo htmlspecialchars($conteudo['titulo1']); ?>"
                            class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="texto1" class="form-label">Primeiro texto</label>
                        <textarea name="texto1" class="form-control" rows="4"
                            required><?php echo htmlspecialchars($conteudo['texto1']); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="imagem1" class="form-label">Trocar Imagem 1</label>
                        <input type="file" name="imagem1" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="titulo2" class="form-label">Segundo título</label>
                        <input type="text" name="titulo2" value="<?php echo htmlspecialchars($conteudo['titulo2']); ?>"
                            class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="texto2" class="form-label">Segundo texto</label>
                        <textarea name="texto2" class="form-control" rows="4"
                            required><?php echo htmlspecialchars($conteudo['texto2']); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="imagem2" class="form-label">Trocar Imagem 2</label>
                        <input type="file" name="imagem2" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="titulo3" class="form-label">Terceiro título</label>
                        <input type="text" name="titulo3" value="<?php echo htmlspecialchars($conteudo['titulo3']); ?>"
                            class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="texto3" class="form-label">Terceiro texto</label>
                        <textarea name="texto3" class="form-control" rows="4"
                            required><?php echo htmlspecialchars($conteudo['texto3']); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="imagem3" class="form-label">Trocar Imagem 3</label>
                        <input type="file" name="imagem3" class="form-control">
                    </div>

                    <button type="submit" class="bnt bnt-sucess">Enviar</button>

                </form>

                <!--ADICIONAAAAAAAAAAAAR AQUII VINICIUUUSSSSSSSSS-->


            </div>
</body>

</html>