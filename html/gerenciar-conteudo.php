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
    <link rel="stylesheet" href="../css/conteudo.css">

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

                <li>
                    <a href="perfil.php">
                        <span class="icone">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="titulo">Home</span>
                    </a>
                </li>

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

                <li>
                    <a href="#">
                        <span class="icone">
                            <ion-icon name="trophy-outline"></ion-icon>
                        </span>
                        <span class="titulo">Certificados</span>
                    </a>
                </li>

                <li>
                    <a href="editar-perfil.php">
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

                    <img src="../img/avaliacao/pic-1.png" alt="Foto do Usuário">
                </div>
            </div>


            <!--ADICIONAAAAAAAAAAAAR AQUII VINICIUUUSSSSSSSSS-->
            <?php
            include('../php/config.php');

            $stmt = $pdo->query('SELECT * FROM conteudos');
            $modulos = $stmt->fetchAll();
            ?>
            <!-- Botão para criar novo conteúdo -->
            <?php
            include('../php/config.php');
             
            // Pegando o id do modulo
            $stmt = $pdo->query('SELECT * FROM modulos WHERE titulo_mod LIKE "' . $_SESSION['nome_do_modulo'] . '"');
            $id_do_modulo = $stmt->fetch(PDO::FETCH_ASSOC); // Usando fetch() para obter uma única linha e colocando na variavel $id_do_modulo
            
            $_SESSION['id_do_modulo'] = $id_do_modulo['id_mod']; // Criei um varaivel de s

            // Armazene o ID do curso na variável de sessão
            $stmt = $pdo->query('SELECT * FROM conteudos WHERE id_modulo = ' . $_SESSION['id_do_modulo']);
            $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
                <div class="novo-conteudo">
                    <a href="gerenciar-conteudo-create.php">Criar Novo Conteúdo</a>
                </div>
                

            <header>
                <h1>Gerenciamento de Conteúdo</h1>
            </header>
            <div class="container">
              


            <?php
               
                if ($result->num_rows > 0) {
                    // Exibir cada conteúdo
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="conteudo-item">';
                        echo '<h2>' . htmlspecialchars($row['titulo']) . '</h2>';
                        echo '<p>' . htmlspecialchars($row['texto']) . '</p>';

                        if ($row['imagem']) {
                            echo '<img src="../img/uploads/' . htmlspecialchars($row['imagem']) . '" alt="Imagem do Conteúdo">';
                        }

                        echo '<p>Interativo: ' . htmlspecialchars($row['interativo']) . '</p>';
                        echo '<div class="acoes">';
                        echo '<a href="gerenciar-conteudo-edit.php?id=' . $row['id'] . '">Editar</a>';
                        echo '<a href="../php/delete-conteudo.php?id=' . $row['id'] . '">Excluir</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>Nenhum conteúdo encontrado.</p>";
                }

                $conn->close();
                ?>
        </div>

        

        <!--ADICIONAAAAAAAAAAAAR AQUII VINICIUUUSSSSSSSSS-->


   