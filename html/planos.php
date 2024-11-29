<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/icon.png"> <!--favicon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- font externa-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="crossorigin="anonymous" referrerpolicy="no-referrer" /> <!--imagens para o footer-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> <!--icons do matricule-se-->
    
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">

    <link rel="stylesheet" href="../css/matricula.css">

    <script src="../js/main.js" defer></script>
    
    <title>Matricula - High Ecology</title>
</head>
<body>

    <!--COMEÇO DA NAVBAR-->
    <nav class="nav">
        <a href="../index.html" class="logo"><img src="../img/logo-tres.svg" alt="logo"></a>
        <div class="menu-btn">
            <i class="fa fa-bars fa-2x" onclick="menuShow()"></i>
        </div>
        <ul>
            <li><a href="../html/planos.php" class="active">Matricule-se</a></li>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../html/especializacoes.php">Especializações</a></li>
            <li><a href="../html/login.php">Login</a></li>
        </ul>
    </nav>
    <!--FINAL DA NAVBAR-->

    <!--COMEÇO DE PLANOS-->

    <?php
            include('../php/config.php');

            $stmt = $pdo->query('SELECT * FROM planos');
            $planos = $stmt->fetchAll();
    ?>


    <section class="conteiner card grid">
        <div class="card-conteiner grid">
        <?php foreach ($planos as $plano): ?>
            <div class="card-content grid">
                <h3 class="card-title"><?php echo htmlspecialchars($plano['Tipo']); ?></h3>
                <h1 class="card-price">R$<?php echo htmlspecialchars($plano['Valor']); ?></h1>

                <ul class="card-list grid">
                    <li class="list-item">
                        <span><?php echo htmlspecialchars($plano['Descricao']); ?></span>
                    </li>
                    <li class="list-item">
                        <span class="icon"><i class="bi bi-check-lg"></i></span>
                        <span><?php echo htmlspecialchars($plano['Vantagem1']); ?></span>
                    </li>
                    <li class="list-item">
                        <span class="icon"><i class="bi bi-check-lg"></i></span>
                        <span><?php echo htmlspecialchars($plano['Vantagem2']); ?></span>
                    </li>
                    <li class="list-item">
                        <span class="icon"><i class="bi bi-check-lg"></i></span>
                        <span><?php echo htmlspecialchars($plano['Vantagem3']); ?></span>
                    </li>   
                </ul>
                <a class="card-button" href="cadastro.php">Matricule-se</a>
            </div>
        <?php endforeach; ?>
        </div>
    </section>
    <!--FINAL DE PLANOS-->

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
                            <a href="high.ecology@hotmail.com" class="footer-link" id="emailfooter">
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