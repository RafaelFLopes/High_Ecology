<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous"
    referrerpolicy="no-referrer"/> 
    
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">

    <link rel="stylesheet" href="../css/login.css">

    <script src="../js/main.js" defer></script>
    <script src="../js/login.js" defer></script>
    
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
            <li><a href="../html/matricula.html"class="active"> Matricule-se</a></li>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../html/especializacoes.html">Especializações</a></li>
            <li><a href="../html/login.html">Login</a></li>
        </ul>
    </nav>
    <!--FINAL DA NAVBAR-->

    <!--COMEÇO DO LOGIN-->
    <section class="inputlogin">
        <div class="wrapper">
            <form action="#" method="POST">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="email" id="emaillogin" name="email" placeholder="E-mail" required>
                </div>
                <div class="input-box">
                    <input type="password" id="password" name="password" placeholder="Senha" required>  
                </div>
                <div class="LembreDeMim">
                    <a href="#">Esqueceu a senha?</a>
                </div>
                <button type="submit" class="btnlogin" name="btn_entrar">
                    Entrar
                </button>
                <div class="linkderegistro">
                    <p>Não possui uma conta?</p>
                    <p><a href="cadastro.php">Cadastrar</a></p>
                </div>
                
            </form>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST['btn_entrar'])) {  // Verifica se o botão 'btn_entrar' foi pressionado (se o formulário foi submetido corretamente)
                            include_once '../php/metodos_principais.php'; // Inclui o arquivo contendo a classe 'metodos_principais', onde estão os métodos de login
                            $metodos_principais = new metodos_principais(); // Cria uma nova instância da classe 'metodos_principais'

                            // Armazena os valores do email e login em variáveis
                            $email = $_POST['email'];
                            $senha = $_POST['password'];

                            // Passa as variáveis
                            $metodos_principais->setEmailAluno($email);
                            $metodos_principais->setSenhaAluno($senha);
                            $metodos_principais->setEmailProfessor($email);
                            $metodos_principais->setSenhaProfessor($senha);

                             // Chama o método 'login' da classe 'metodos_principais' para verificar se o login é válido
                            $result = $metodos_principais->login();

                            if ($result == "aluno") {
                                header("Location:matricula.html"); // Altere para o caminho desejado
                                exit(); // Importante para parar a execução do script
                            } else if ($result == "professor") {
                                header("Location:pagamento.html"); // Altere para o caminho desejado
                                exit(); // Importante para parar a execução do script
                            } else {
                                echo "<p style='color: #5a2323; font-size: 15px; text-align: center; transition: all 0.5s;'>Email ou Senha inválidos</p>";
                                echo $result;
                            }
                        }
                    }
                ?>
        </div>
    </section>
    
    <!--FINAL DO LOGIN-->

    <!--COMEÇO DO FOOTER-->
    <footer>
        <div id="footer_content">
            <div id="footer_contacts">
                <ul class="footer-list">
                    <li>
                        <h2>Redes sociais</h2>
                    </li>
                    <li>
                        <div id="footer_social_media">
                            <a href="https://instagram.com/high.ecology?igshid=OGQ5ZDc2ODk2ZA==" class="footer-link" id="instagram">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="high.ecology@hotmail.com" class="footer-link" id="email">
                                <i class="fa-regular fa-envelope"></i>
                            </a>
                            <a href="https://github.com/RafaelFLopes/High_Ecology" class="footer-link" id="github">
                                <i class="fa-brands fa-github"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <ul class="footer-list">
                <li>
                    <h2>Links</h2>
                </li>
                <li>
                    <a href="#" class="footer-link">Termos de uso</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Privicidade</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Sobre</a>
                </li>
            </ul>
            <ul class="footer-list">
                <li>
                    <h2>Sobre</h2>
                </li>
                <li id="footer-sobre-texto">
                    Uma rede online de ensino focado em incentivar os nossos estudantes a cuidar melhor do lugar onde eles moram, a Terra.
                    Temos o objetivo de disponibilizar cursos que abrangem as mais diversas matérias dos estudos ecológicos. 
               </li>
                </li>
            </ul>
        </div>
        <div id="footer_copyright">
            &#169
            2023 all rights reserved
        </div>
    </footer>
    <!--FINAL DO FOOTER-->

</body>
</html>