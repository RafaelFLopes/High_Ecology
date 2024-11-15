<?php
    session_start();
            include('../php/config.php');

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $titulo_principal = $_POST['titulo_principal'];
                $descricao = $_POST['descricao'];
                $titulo1 = $_POST['titulo1'];
                $texto1 = $_POST['texto1'];
                $titulo2 = $_POST['titulo2'];
                $texto2 = $_POST['texto2'];
                $titulo3 = $_POST['titulo3'];
                $texto3 = $_POST['texto3'];
                $id_modulo = $_SESSION['id_do_modulo'];

                // Processa a primeira imagem
                $imagem1 = $target_dir = "../img/uploads/" . basename($_FILES['imagem1']['name']);
                if (move_uploaded_file($_FILES['imagem1']['tmp_name'], $imagem1)) {
                    $imagem1 = basename($_FILES['imagem1']['name']);
                } else {
                    $imagem1 = null;
                }


                // Processa a segunda imagem
                $imagem2 = $target_dir = "../img/uploads/" . basename($_FILES['imagem2']['name']);
                if (move_uploaded_file($_FILES['imagem2']['tmp_name'], $imagem2)) {
                    $imagem2 = basename($_FILES['imagem2']['name']);
                } else {
                    $imagem2 = null;
                }


                // Processa a terceira imagem
                $imagem3 = $target_dir = "../img/uploads/" . basename($_FILES['imagem3']['name']);
                if (move_uploaded_file($_FILES['imagem3']['tmp_name'], $imagem3)) {
                    $imagem3 = basename($_FILES['imagem3']['name']);
                } else {
                    $imagem3 = null;
                }

                $stmt = $pdo->prepare('INSERT INTO conteudos (id_modulo, titulo_principal, descricao, titulo1, texto1, imagem1, titulo2, texto2, imagem2, titulo3, texto3, imagem3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                $stmt->execute([$id_modulo, $titulo_principal, $descricao, $titulo1, $texto1, $imagem1, $titulo2, $texto2, $imagem2, $titulo3, $texto3, $imagem3]);

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
    <link rel="stylesheet" href="../css/conteudo-main-logado.css">
    <?php  if($_SESSION["user"]['tabela'] == "professor") {?>
        <link rel="stylesheet" href="../css/leftnavbarprofessor.css">
        <link rel="stylesheet" href="../css/topbarprofessor.css">
    <?php } else if($_SESSION["user"]['tabela'] == "aluno") {?>
        <link rel="stylesheet" href="../css/leftnavbar.css">
        <link rel="stylesheet" href="../css/topbar.css">
    <?php } ?>
    <link rel="stylesheet" href="../css/editar-perfil.css">

    <script src="../js/perfil.js" defer></script>
    <script type = "module" src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/gerenciar-cursos.css">

    <title>Editar Perfil - High Ecology</title>
</head>
<body>
    <div class = "container-p">
        <div class = "navegacao">
            <ul style="padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;">
                <li>
                    <a href = "#">
                        <span class = "icone">
                            <img src="" alt="">
                        </span>
                        <span class = "titulo">HIGH ECOLOGY</span>
                    </a>
                </li>

                <?php 
                if($_SESSION["user"]['tabela'] == "aluno")
                {?>
                    <li>
                        <a href = "perfil.php">
                            <span class = "icone">
                                <ion-icon name = "home-outline"></ion-icon>
                            </span>
                            <span class = "titulo">Home</span>
                        </a>
                    </li>
                <?php }?>
                 
                <?php if($_SESSION["user"]['tabela'] == "professor"){?>
                    <li>
                    <a href = "gerenciar-cursos.php">
                        <span class = "icone">
                            <ion-icon name="pencil-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Gerenciar Cursos</span>
                    </a>
                    </li>
                <?php }?>


                <li>
                    <a href = "#">
                        <span class = "icone">
                            <ion-icon name="library-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Cursos</span>
                    </a>
                </li>

                <?php 
                if($_SESSION["user"]['tabela'] == "aluno")
                {?>
                <li>
                    <a href = "#">
                        <span class = "icone">
                            <ion-icon name="trophy-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Certificados</span>
                    </a>
                </li>
                <?php } ?>

                <li>
                    <a href = "editar-perfil.php">
                        <span class = "icone">
                            <ion-icon name = "settings-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Editar Perfil</span>
                    </a>
                </li>

                <li>
                    <a href = "../php/logout.php">
                        <span class = "icone">
                            <ion-icon name = "log-out-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Sair</span>
                    </a>
                </li>

            </ul>
        </div>
        
        <div class = "main-p">
            <div class = "topbar">
                <div class = "toggle">
                    <ion-icon name = "menu-outline"></ion-icon>
                </div>
                <div class = "user">  
                    <a href="editar-perfil.php">
                        <img src="<?php if($_SESSION["user"]['tabela'] == "aluno") { echo $_SESSION['dados_user']['img']; } elseif($_SESSION["user"]['tabela'] == "professor") { echo "../img/icon.png";} ?>" alt="foto de perfil">
                    </a>
                </div>
            </div>
            
            
                <!--ADICIONAAAAAAAAAAAAR AQUII VINICIUUUSSSSSSSSS-->
            <header>
                <h1>Criar Novo Conteúdo</h1>
            </header>

            <div class="container my-5">
                <form action="" method="POST" enctype="multipart/form-data" class="form">
                    <div class="mb-3">
                        <label for="titulo_principal" class="form-label">Título do conteúdo</label>
                        <input type="text" name="titulo_principal" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição do conteúdo</label>
                        <textarea name="descricao" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="imagem1" class="form-label">Imagem do conteúdo</label>
                        <input type="file" name="imagem1" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="titulo1" class="form-label">Primeiro título</label>
                        <input type="text" name="titulo1" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="texto1" class="form-label">Primeiro bloco de texto</label>
                        <textarea name="texto1" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="imagem1" class="form-label">Imagem do primeiro bloco de texto</label>
                        <input type="file" name="imagem1" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="titulo2" class="form-label">Segundo título</label>
                        <input type="text" name="titulo2" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="texto2" class="form-label">Segundo bloco de texto</label>
                        <textarea name="texto2" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="imagem2" class="form-label">Imagem do segundo bloco de texto</label>
                        <input type="file" name="imagem2" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="titulo3" class="form-label">Terceiro título</label>
                        <input type="text" name="titulo3" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="texto3" class="form-label">STerceiro bloco de texto</label>
                        <textarea name="texto3" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="imagem3" class="form-label">Imagem do Terceiro bloco de texto</label>
                        <input type="file" name="imagem3" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Criar Conteúdo</button>
                </form>
            </div>
                <!--ADICIONAAAAAAAAAAAAR AQUII VINICIUUUSSSSSSSSS-->

        </div>
</body>
</html>