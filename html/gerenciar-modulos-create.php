<?php
    session_start();
            include('../php/config.php');

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $titulo_mod = $_POST['titulo_mod'];
                $descricao_mod = $_POST['descricao_mod'];
                $image_mod = $_FILES['image_mod']['name'];
                $id_curso = $_SESSION['id_do_curso']; // Passei a variavel de sessão "id_do_curso" criado no arquivo gerenciar módulos para o id do curso

                $target_dir = "../img/uploads/";
                $target_file = $target_dir . basename($_FILES['image_mod']['name']);
                move_uploaded_file($_FILES['image_mod']['tmp_name'], $target_file);

                $stmt = $pdo->prepare('INSERT INTO modulos (id_curso, titulo_mod, descricao_mod, image_mod) VALUES (?, ?, ?, ?)');
                $stmt->execute([$id_curso, $titulo_mod, $descricao_mod, $image_mod]);

                header('Location: gerenciar-modulos.php');
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
                if($_SESSION["user"]['tabela'] == "aluno"){
                    if($_SESSION['dados_user']['matriculado'] == false)
                    {?>
                    <li>
                        <a href = "renovarAssinatura.php">
                            <span class = "icone">
                                <ion-icon name="repeat-outline"></ion-icon>
                            </span>
                            <span class = "titulo">Renovar Assinatura</span>
                        </a>
                    </li>
                <?php } }?>

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
                <?php } ?>

                <?php 
                if($_SESSION["user"]['tabela'] == "professor")
                {?>
                    <li>
                    <a href = "gerenciar-cursos.php">
                        <span class = "icone">
                            <ion-icon name="pencil-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Gerenciar Cursos</span>
                    </a>
                    </li>
                <?php } ?>

                <?php
                if($_SESSION["user"]['tabela'] == "aluno"){
                    if($_SESSION['dados_user']['matriculado'] == true)
                    {?>
                    <li>
                        <a href = "cursos.php">
                            <span class = "icone">
                                <ion-icon name="library-outline"></ion-icon>
                            </span>
                            <span class = "titulo">Cursos</span>
                        </a>
                    </li>
                <?php }}
                elseif($_SESSION["user"]['tabela'] == "professor")
                {?>
                <li>
                    <a href = "cursos.php">
                        <span class = "icone">
                            <ion-icon name="library-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Cursos</span>
                    </a>
                </li>
                <?php } ?>

                <?php 
                if($_SESSION["user"]['tabela'] == "aluno")
                {?>
                <li>
                    <a href = "certificados.php">
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
                <h1>Criar Novo Módulo</h1>
            </header>

            <div class="container my-5">
                <form action="" method="POST" enctype="multipart/form-data" class="form">
                    <div class="mb-3">
                        <label for="titulo_mod" class="form-label">Título</label>
                        <input type="text" name="titulo_mod" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="descricao_mod" class="form-label">Descrição</label>
                        <textarea name="descricao_mod" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image_mod" class="form-label">Imagem</label>
                        <input type="file" name="image_mod" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Criar Módulo</button>
                </form>
            </div>
                <!--ADICIONAAAAAAAAAAAAR AQUII VINICIUUUSSSSSSSSS-->


        </div>
</body>
</html>