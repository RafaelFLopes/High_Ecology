<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_hidden = $_POST['txt_nome_do_curso'];
    $_SESSION['nome_do_curso'] = $input_hidden;
    header("Location: modulos2.php");
    exit();
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
    <link rel="stylesheet" href="../css/especializacoes.css">

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
                    <a href = "cursos.php">
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

            <?php
            include('../php/config.php');

            $stmt = $pdo->query('SELECT * FROM cursos');
            $courses = $stmt->fetchAll();
            ?>

            <div class="container">
            <form action="#" method="POST">
               <div class="card__container">
               <?php foreach ($courses as $course): ?>
                  <article class="card__article">
                     <img src="../img/uploads/<?php echo htmlspecialchars($course['image']); ?>" alt="image" class="card__img">

                     <div class="card__data">
                        <span class="card__description"><?php echo htmlspecialchars($course['description']); ?></span>
                        <h2 class="card__title"><?php echo htmlspecialchars($course['title']); ?></h2>
                        <a type="button" class="card__button">Começar</a>
                     </div>
                  </article>
                  <?php endforeach; ?>

                  <input type="hidden" name="txt_nome_do_curso" class="txt_nome_do_curso" value="">
               </div>
            </div>
            </form>
         </div>

         <script>
        // Seleciona todos os botões de módulo
        let btn_modulos = document.querySelectorAll(".card__button");
        let input_hidden_nome_curso = document.querySelector('.txt_nome_do_curso');

        // Itera sobre cada botão e adiciona um evento de clique
        btn_modulos.forEach((btn) => {
            btn.addEventListener('click', () => {
                // Localiza o título do curso no mesmo cartão do botão clicado
                let nome_curso = btn.closest('.card__data').querySelector('.card__title').textContent;
                
                // Define o valor do curso no input oculto
                input_hidden_nome_curso.value = nome_curso;
                
                // Envia o formulário
                btn.closest('form').submit();
            });
        });
    </script>
</body>
</html>