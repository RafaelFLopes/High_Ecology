<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/lg.css">
    <title>High Ecology</title>
</head>
<body>
    <div class="container">
        <div class="containerContent">
            <h3><i>Bem-Vindo(a)</i></h3>
            <h1><i>Pode Entrar</i> </h1>

            
            <form action="#" method="POST">
                <label for="email"><i>E-mail</i></label>
                <div class="inputRow">
                    <input type="email" name="email" maxlength="65" placeholder="alguem@gmail.com" required> 
                </div>
                <label for="password"><i>Senha</i></label>
                <div class="inputRow">
                    <input type="password" id="password" name="password" maxlength="16" placeholder="Sua senha aqui" required> 
                    <span id="password-eye"><i class="ri-eye-off-line"></i> </span>
                </div>
                <div class="inputES" id="password-recovery">
                    <a href="#"> <i> Esqueci Minha Senha</i></a>
                </div>
                <button type="submit" name="btn_entrar"><i>LOGIN</i></button>
            </form>
            <h6>Fazer login com</h6>
            <div class="logins">
                <a href="#"> <img src="../img/login/google.png" alt="Google"></a>
                <a href="#"> <img src="../img/login/github.png" alt="Github"></a>
                <a href="#"> <img src="../img/login/facebook.png" alt="Facebook"></a>
            </div>
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
            include_once '..\php/metodos_principais.php';
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
                    header("Location: perfil.php");
                    exit();
                } else if ($_SESSION["user"]['tabela'] === "professor") {
                    $_SESSION['dados_user'] = $metodos_principais->getProfessorPorId($_SESSION['user']['id']);
                    header("Location: perfil.php");
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

