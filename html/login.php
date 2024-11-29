<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/lg.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/all.css">
    <script src="../js/main.js" defer></script>
    <title>Login - High Ecology</title>

</head>
<body>

    <!--COMEÇO DA NAVBAR-->
    <nav class="nav">
        <a href="../index.html" class="logo"><img src="../img/logo-tres.svg" alt="logo"></a>
        <div class="menu-btn">
            <i class="fa fa-bars fa-2x" onclick="menuShow()"></i>
        </div>
        <ul>
            <li><a href="../html/planos.php" class="active"> Matricule-se</a></li>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../html/especializacoes.php">Especializações</a></li>
            <li><a href="../html/login.php">Login</a></li>
        </ul>
    </nav>
    <!--FINAL DA NAVBAR-->

    <div class="container">
        <div class="containerContent">
            <h3><i>Bem-Vindo(a)</i></h3>
            <h1><i>Entrar na conta</i> </h1>

            
            <form action="#" method="POST">
                <label for="email"><i>Email</i></label>
                <div class="inputRow">
                    <input type="email" name="email" maxlength="65" placeholder="Email" required> 
                </div>
                <label for="password"><i>Senha</i></label>
                <div class="inputRow">
                    <input type="password" id="password" name="password" maxlength="16" placeholder="Senha" required> 
                    <span id="password-eye"><i class="ri-eye-off-line"></i> </span>
                </div>
                <button type="submit" name="btn_entrar"><i>Login</i></button>
            </form>
            <p>Ainda não é aluno? <a href="cadastro.php">Matrícule-se!</a></p>
        </div>
        <div class="containerImg">
            <img src="../img/login/terrinha.svg" alt="Terra animação"/> 
        </div>
    </div>
 
    <script src="../js/lg.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['btn_entrar'])) {
            include_once '../php/metodos_principais.php';
            $metodos_principais = new metodos_principais();

            $email = $_POST['email'];
            $senha = $_POST['password'];
            
            $metodos_principais->setEmailAluno($email);
            $metodos_principais->setSenhaAluno($senha);
            $metodos_principais->setEmailProfessor($email);
            $metodos_principais->setSenhaProfessor($senha);

            $_SESSION["user"] = $metodos_principais->login();

            if ($_SESSION["user"] && is_array($_SESSION["user"])) {
                if ($_SESSION["user"]['tabela'] === "aluno") {
                    $_SESSION["dados_user"] = $metodos_principais->getAlunoPorId($_SESSION["user"]['id']);
                    $metodos_principais->passouUmMesDesdeUltimaAssinatura($_SESSION["user"]['id']);
                    
                    if($_SESSION['dados_user']['matriculado'] == true){
                        header("Location: perfil.php");
                        exit();
                    }
                    elseif($_SESSION['dados_user']['matriculado'] == false){
                        header("Location: renovarAssinatura.php");
                        exit();
                    }

                } else if ($_SESSION["user"]['tabela'] === "professor") {
                    $_SESSION['dados_user'] = $metodos_principais->getProfessorPorId($_SESSION['user']['id']);
                    header("Location: gerenciar-cursos.php");
                    exit();
                }
            } else {
                echo "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'E-mail ou senha incorretos. Tente novamente!',
                        showConfirmButton: false,
                        timer: 3000
                    });
                </script>";
            }
        }
    }
?>


    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
</body>
</html>

