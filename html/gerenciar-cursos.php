<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_hidden = $_POST['txt_nome_do_curso'];
    $_SESSION['nome_do_curso'] = $input_hidden;
    header("Location: gerenciar-modulos.php");
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
    <link rel="stylesheet" href="../css/editar-perfil.css">
    <link rel="stylesheet" href="../css/mensagembemvindo.css">

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

            $stmt = $pdo->query('SELECT * FROM cursos');
            $courses = $stmt->fetchAll();
            ?>
            <div class="mensagemBemvindo">
                <h1>Seja bem-vindo(a) <?php echo $_SESSION['user']['tabela'], " ", $_SESSION['dados_user']['nome'];?></h1>
            </div>
            <header>
                <h1>Gerenciamento de Cursos</h1>
            </header>

            <div class="container my-5">
            <a href="gerenciar-cursos-create.php" class="btn btn-success add-course mb-4">Criar Novo Curso</a>
            <form class="row" action="#" method="POST">
                <?php foreach ($courses as $course): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="../img/uploads/<?php echo htmlspecialchars($course['image']); ?>" class="card-img-top" alt="Imagem do Curso">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($course['title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($course['description']); ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="gerenciar-cursos-edit.php?id=<?php echo $course['id']; ?>" class="btn btn-primary">Editar</a>
                            <!-- Ajuste no botão "Módulos" para submeter o formulário -->
                            <button type="button" class="btn_modulo btn btn-warning">Módulos</button>
                            <a href="../php/delete.php?id=<?php echo $course['id']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar este curso?')">Deletar</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                
                <!-- Campo oculto para armazenar o nome do curso -->
                <input type="hidden" name="txt_nome_do_curso" class="txt_nome_do_curso" value="">
            </form>
            </div>   
        </div>
        
        <script>
        // Seleciona todos os botões de módulo
        let btn_modulos = document.querySelectorAll(".btn_modulo");
        let input_hidden_nome_curso = document.querySelector('.txt_nome_do_curso');

        // Itera sobre cada botão e adiciona um evento de clique
        btn_modulos.forEach((btn) => {
            btn.addEventListener('click', () => {
                // Localiza o título do curso no mesmo cartão do botão clicado
                let nome_curso = btn.closest('.card').querySelector('.card-title').textContent;
                
                // Define o valor do curso no input oculto
                input_hidden_nome_curso.value = nome_curso;
                
                // Envia o formulário
                btn.closest('form').submit();
            });
        });
    </script>
</body>
</html>