<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cad.css">
    <title>Formulário</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="../img/cadImg.svg" alt="Imagem do Cadastro">
        </div>
        <div class="form">
            <form action="#" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="login.php">Entrar</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Primeiro Nome</label>
                        <input id="firstname" type="text" name="name" placeholder="Seu nome aqui" required>
                    </div>

                    <div class="input-box">
                        <label for="lastname">Sobrenome</label>
                        <input id="lastname" type="text" name="lastname" placeholder="Seu sobrenome aqui" required>
                    </div>
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="alguem@gmail.com" required>
                    </div>

                    <div class="input-box">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="pattern" name="cpf" placeholder="XXX-XXX-XXX-XX" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="password" placeholder="Digite aqui" required>
                    </div>

                    <div class="input-box">
                        <label for="confirmPassword">Confirmar Senha</label>
                        <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Repita aqui" required>
                    </div>

                </div>

                <div class="continue-button">
                    <button type="submit" name="continue_button">Confirmar</button>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(isset($_POST['continue_button'])) {
                            include_once '..\php/metodos_principais.php';
                            $metodos_principais = new metodos_principais();

                            $nome = $_POST['name'];
                            $cpf = $_POST['cpf'];
                            $email = $_POST ['email'];
                            $senha = $_POST ['password'];

                            $metodos_principais->setNomeAluno(nome_aluno: $nome);
                            $metodos_principais->setCpfAluno(cpf_aluno: $cpf);
                            $metodos_principais->setEmailAluno(email_aluno: $email);
                            $metodos_principais->setSenhaAluno(senha_aluno: $senha);

                            $result = $metodos_principais->cadastro();

                            if($result == "Registrado") {
                                header(header: "Location: login.php");
                                exit(); 
                            }
                            else {
                                 echo "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Email já existente!'',
                        showConfirmButton: false,
                        timer: 3000
                    });
                </script>";
                    }
                }
            }
                ?>

            </form>
        </div>
    </div>
</body>

</html>