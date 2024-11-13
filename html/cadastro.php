<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Cadastro - High Ecology</title>
</head>
<body>
    <section class="inputlogin">
        <div class="wrapper">
            <form action="#" method="POST" enctype="multipart/form-data">
                <h1>Cadastro</h1>
                <div class="input-box">
                    <input type="text" id="name" name="name" placeholder="Nome completo" required>
                </div>
                <div class="input-box">
                    <input type="text" id="cpf" name="cpf" placeholder="CPF" required>
                </div>
                <div class="input-box">
                    <input type="email" id="email" name="email" placeholder="E-mail" required>
                </div>
                <div class="input-box">
                    <input type="password" id="password" name="password" placeholder="Senha" required>  
                </div>
                <div>
                    <input type="file" name="image_mod" class="form-control" required>
                </div>
                <button type="submit" class="btnlogin" name="btn_cadastrar">
                    Cadastrar
                </button>
                <div class="linkderegistro">
                    <p>Já possui uma conta?</p>
                    <p><a href="login.php">Entrar</a></p>
                </div>

                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST['btn_cadastrar'])) {  // Verifica se o botão 'btn_cadastrar' foi pressionado (se o formulário foi submetido corretamente)
                            include_once '../php/metodos_principais.php'; // Inclui o arquivo contendo a classe 'metodos_principais', onde estão os métodos de login
                            $metodos_principais = new metodos_principais(); // Cria uma nova instância da classe 'metodos_principais'

                            // Processa o upload da imagem
                            if (isset($_FILES['image_mod']) && $_FILES['image_mod']['error'] == 0) {
                                $nomeImagem = basename($_FILES['image_mod']['name']);
                                $caminhoImagem = '../img/uploads' . $nomeImagem;
                                
                                // Move o arquivo para a pasta 'uploads'
                                if (move_uploaded_file($_FILES['image_mod']['tmp_name'], $caminhoImagem)) {
                                    $metodos_principais->setImagePath($caminhoImagem);
                                } else {
                                    echo "Erro ao fazer o upload da imagem.";
                                }
                            }

                            $nome = $_POST['name'];
                            $cpf = $_POST['cpf'];
                            $email = $_POST['email'];
                            $senha = $_POST['password'];

                            // Passa as variáveis
                            $metodos_principais->setNomeAluno($nome);
                            $metodos_principais->setCpfAluno($cpf);
                            $metodos_principais->setEmailAluno($email);
                            $metodos_principais->setSenhaAluno($senha);

                             // Chama o método 'login' da classe 'metodos_principais' para verificar se o login é válido
                            $result = $metodos_principais->cadastro();

                            if ($result == "registrado") {
                                header("Location:login.php"); // Altere para o caminho desejado
                                exit(); // Importante para parar a execução do script
                            }
                            else {
                                echo "<p style='color: #5a2323; font-size: 15px; text-align: center; transition: all 0.5s;'>Email Já registrado</p>";
                                echo $result;
                            }
                        }
                    }
                ?>
            </form>
        </div>
    </section>
</body>
</html>

