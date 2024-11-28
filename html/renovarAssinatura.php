<?php
session_start();

                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(isset($_POST['btn_renovar_assinatura'])) {
                            include_once '../php/metodos_principais.php';
                            $metodos_principais = new metodos_principais();

                            $plano = $_POST ['planos'];
                            $forma_pagamento = $_POST ['pagamento'];

                            $metodos_principais->setPlanoAluno($plano);
                            $metodos_principais->setformaPagamentoAluno($forma_pagamento);



                            $result = $metodos_principais->renovarAssinatura($_SESSION['user']['id']);
                            

                            if($result == true) {
                                header("Location: ../php/logout.php");
                            }


                            else {
                                 echo "<script>
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'error',
                                            title: 'Email jรก existente!'',
                                            showConfirmButton: false,
                                            timer: 3000
                                        });
                                    </script>";
                            }
                        }
                    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/conteudo-main-logado.css">

    <?php  if($_SESSION["user"]['tabela'] == "professor") {?>
        <link rel="stylesheet" href="../css/leftnavbarprofessor.css">
        <link rel="stylesheet" href="../css/topbarprofessor.css">
    <?php } else if($_SESSION["user"]['tabela'] == "aluno") {?>
        <link rel="stylesheet" href="../css/leftnavbar.css">
        <link rel="stylesheet" href="../css/topbar.css">
    <?php } ?>

    <link rel="stylesheet" href="../css/perfil.css">

    <link rel="stylesheet" href="../css/cadastro.css">
    <script src="../js/perfil.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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
            <div class="container-editar-perfil">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="Row">
                    <div class="form-header">
                    <div class="title">
                        <h1>Renovar Assinatura</h1>
                    </div>
                </div>
                    </div>
                    <div class="row">

        

                        <div class="col">  
                        <div class="titulo-col">
                            <h1>Planos</h1>
                        </div>
                            <div class="inputBox-radio">
                                <input type="radio" id="seed" name="planos" value="seed" required >
                                <span>Seed - R$69,99</span>
                            </div>
                            <div class="inputBox-radio">
                                <input type="radio" id="growth" name="planos" value="growth" required >
                                <span>Growth - R$99,99</span>
                            </div>

                        </div>

                        <div class="col">
                        <div class="titulo-col">
                            <h1>Pagamento</h1>
                        </div>
                            <div class="inputBox-editar-perfil">
                                <span>Forma de pagamento:</span>
                                <input type="text" id="pagamento" name="pagamento" placeholder="Forma de pagamento" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="button-editar-perfil" name="btn_renovar_assinatura">Renovar Assinatura</button>
                    
                </form>
            </div>

        </div>
    </div>
</body>
</html>

