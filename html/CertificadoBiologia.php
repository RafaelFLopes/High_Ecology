<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sevillana&display=swap" rel="stylesheet">

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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/certificados2.css">

    <title>Certificado - Biologia</title>
</head>

<body>
    <form class="column" action="">
        <div class="container">

            <div class="titulo">CERTIFICADO</div>

            <div class="descricao">
                <p>
                    Certificado concedido a:
                </p>
            </div>

            <div class="NomeUsuario">
                <?php
                include('../php/config.php');

                $stmt = $pdo->query('SELECT nome FROM aluno');
                ?>



                <h5 class="nome"><?php echo $_SESSION['dados_user']['nome']; ?></h5>
            </div>

            <div class="descricaobaixo">
            que concluiu com êxito todos os módulos presentes no curso de "Biologia".
            </div>

            <div class="img">
                <img src="../img/certificadoimg.png" alt="">
            </div>

            <div class="instituicao">
                <h4>High Ecology</h4>
            </div>

            <div class="data">
                <h4>Data de Conclusão</h4>
            </div>
        </div>
    </form>
</body>
</html>