<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="stylesheet" href="../css/all.css">
    <title>Formulário</title>
</head>

<body>
<div class="container-editar-perfil">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="Row">
                    <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <div class="login-button">
                        <a href="login.php">Entrar</a>
                    </div>
                </div>
                    </div>
                    <div class="row">

                    <div class="col"> 
                        <div class="titulo-col">
                            <h1>Informações</h1>
                        </div>
                        <div class="inputBox-editar-perfil">
                                <span>Alterar Nome:</span>
                                <input type="text" id="name" name="name" placeholder="Nome" required>
                            </div>
                            <div class="inputBox-editar-perfil">
                                <span>
                                    Email:
                                </span>
                                <input type="email" id="email" name="email" placeholder="Email" required >
                            </div>

                            <div class="inputBox-editar-perfil">
                                <span>Alterar CPF:</span>
                                <input type="text" id="cpf" name="cpf" placeholder="CPF" required >
                            </div>

                            <div class="inputBox-editar-perfil">
                                <span>Alterar senha:</span>
                                <input type="password" name="password"placeholder="Senha" required >
                            </div>
                            <div class="inputBox-editar-perfil">
                                <span for="file">Foto de perfil</span>
                                <input type="file" name="image_mod" class="form-control" required>
                            </div>
                        </div>

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
                    <button type="submit" class="button-editar-perfil" name="btn_cadastrar">Cadastrar</button>
                    <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(isset($_POST['btn_cadastrar'])) {
                            include_once '../php/metodos_principais.php';
                            $metodos_principais = new metodos_principais();

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
                            $email = $_POST ['email'];
                            $senha = $_POST ['password'];
                            $plano = $_POST ['planos'];
                            $forma_pagamento = $_POST ['pagamento'];

                            $metodos_principais->setNomeAluno($nome);
                            $metodos_principais->setCpfAluno($cpf);
                            $metodos_principais->setEmailAluno($email);
                            $metodos_principais->setSenhaAluno($senha);
                            $metodos_principais->setPlanoAluno($plano);
                            $metodos_principais->setformaPagamentoAluno($forma_pagamento);

                            $result = $metodos_principais->cadastro();

                            if($result == "registrado") {
                                header("Location: login.php");
                                exit(); 
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
                </form>
            </div>


</body>

</html>