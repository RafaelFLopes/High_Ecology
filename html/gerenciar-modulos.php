<?php
session_start();
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
    <link rel="stylesheet" href="../css/leftnavbar.css">
    <link rel="stylesheet" href="../css/topbar.css">
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

                <li>
                    <a href = "perfil.php">
                        <span class = "icone">
                            <ion-icon name = "home-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Home</span>
                    </a>
                </li>

                <?php 
                if($_SESSION["user"]['tabela'] == "professor") // ALGUM ERRO NA VARIAVEL , VERIFICAAAAAAAAAAAAAAAR
                {?>
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

                <li>
                    <a href = "#">
                        <span class = "icone">
                            <ion-icon name="trophy-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Certificados</span>
                    </a>
                </li>

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
                    
                    <img src = "../img/avaliacao/pic-1.png" alt = "Foto do Usuário">
                </div>
            </div>
            
            
                <!--ADICIONAAAAAAAAAAAAR AQUII VINICIUUUSSSSSSSSS-->

            <?php
            include('../php/config.php');

            // Pegando o id do curso
            $stmt = $pdo->query('SELECT * FROM cursos WHERE title LIKE "' . $_SESSION['nome_do_curso'] . '"');
            $id_do_curso = $stmt->fetch(PDO::FETCH_ASSOC); // Usando fetch() para obter uma única linha e colocando na variavel $id_do_curso
            
            $_SESSION['id_do_curso'] = $id_do_curso['id']; // Criei um varaivel de s

            // Armazene o ID do curso na variável de sessão
            $stmt = $pdo->query('SELECT * FROM modulos WHERE id_curso = ' . $_SESSION['id_do_curso']);
            $modulos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <header>
                <h1>Gerenciamento de Módulos</h1>
            </header>

            <div class="container my-5">
                <a href="gerenciar-modulos-create.php" class="btn btn-success add-course mb-4">Criar Novo Módulo</a>

                <div class="row">
                    <?php foreach ($modulos as $modulo): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="../img/uploads/<?php echo htmlspecialchars($modulo['image_mod']); ?>" class="card-img-top" alt="Imagem do Módulo">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($modulo['titulo_mod']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($modulo['descricao_mod']); ?></p>
                            </div>
                            <div class="card-footer">
                                <a href="gerenciar-cursos-edit.php?id=<?php echo $modulo['id_mod']; ?>" class="btn btn-primary">Editar</a>
                                <a href="gerenciar-modulos.php?id=<?php echo $modulo['id_mod']; ?>" class="btn btn-warning">Conteúdo</a>
                                <a href="../php/delete_mod.php?id_mod=<?php echo $modulo['id_mod']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar este módulo?')">Deletar</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

                <!--ADICIONAAAAAAAAAAAAR AQUII VINICIUUUSSSSSSSSS-->


        </div>
</body>
</html>