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

    <title>Editar Perfil - High Ecology</title>
</head>
<body>
    <div class = "container-p">
        <div class = "navegacao">
            <ul>
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
                <?php } ?>


                <li>
                    <a href = "cursos.php">
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
                    <a href = "#">
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
            
            <div class="container-editar-perfil">
                <form action="#" method="POST">
                    <div class="Row">
                        <h1>Editar Perfil</h1>
                    </div>
                    <div class="row">
                        <div class="col" id="perfil-imagem">
                            
                            <div class="imagem">
                                <img src="../img/avaliacao/pic-1.png" alt="">
                            </div>

                        </div>

                        <div class="col">
                            <div class="inputBox-editar-perfil">
                                <span>Nome:</span>
                                <input type="text" id="name" name="name" placeholder="Nome" required value="<?php echo $_SESSION['dados_user']['nome'];?>">
                            </div>
                            <div class="inputBox-editar-perfil">
                                <span>Email:</span>
                                <input type="email" id="email" name="email" placeholder="Email" required value="<?php echo $_SESSION['dados_user']['email'];?>">
                            </div>
                            <?php
                            if($_SESSION["user"]['tabela'] == "aluno")
                            {?>
                            <div class="inputBox-editar-perfil">
                                <span>CPF:</span>
                                <input type="text" id="cpf" name="cpf" placeholder="CPF" required value="<?php echo $_SESSION['dados_user']['cpf'];?>">
                            </div>
                            <?php } ?>
                            <div class="flex">
                                <div class="inputBox-editar-perfil">
                                    <span>Senha:</span>
                                    <input type="password" placeholder="Senha">
                                </div>
                                <div class="inputBox-editar-perfil">
                                    <span>Confirmar Senha:</span>
                                    <input type="password" placeholder="Senha">
                                </div>
                            </div>
                        </div>
                    </div>
                    <a type="submit" class="button-editar-perfil" href="Aprovado.html">Confirmar</a>
                </form>
            </div>
        </div>
</body>
</html>