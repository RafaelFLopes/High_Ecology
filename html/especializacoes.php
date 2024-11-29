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
    <link rel="shortcut icon" href="../img/icon.png"> <!--favicon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> <!--imagens para o footer-->

    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">

    <link rel="stylesheet" href="../css/especializacoes.css">

    <script src="../js/main.js" defer></script>

    <title>Especializações - High Ecology</title>
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

    <!--COMEÇO DOS CURSOS-->

    <?php
    include('../php/config.php');

    $stmt = $pdo->query('SELECT * FROM cursos');
    $courses = $stmt->fetchAll();
    ?>

    <!-- HEADER DOS CURSOS -->
    <section class="courses-header">
        <h1>Explore Nossas Especializações</h1>
        <p>Descubra cursos inovadores que irão expandir seu conhecimento sobre ecologia e sustentabilidade. Faça parte
            da mudança!</p>
    </section>

    <!-- LISTA DE CURSOS -->
    <div class="course-section">
        <div class="container">
            <form action="#" method="POST">
                <div class="card__container">
                    <?php foreach ($courses as $course): ?>
                        <article class="card__article">
                            <img src="../img/uploads/<?php echo htmlspecialchars($course['image']); ?>" alt="image"
                                class="card__img">
                            <div class="card__data">
                                <span
                                    class="card__description"><?php echo htmlspecialchars($course['description']); ?></span>
                                <h2 class="card__title"><?php echo htmlspecialchars($course['title']); ?></h2>
                                <a href="cadastro.php" type="button" class="card__button">Começar</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </form>
        </div>
    </div>
    </form>
    </div>

    <!-- BANNER PROMOCIONAL -->
    <div class="promo-banner">
        <h2>Aproveite Nossa Promoção Exclusiva</h2>
        <p>Inscreva-se hoje mesmo e obtenha acesso gratuito a um curso bônus!</p>
        <a href="cadastro.php" class="promo-button">Garanta Sua Vaga</a>
    </div>

    <!-- DEPOIMENTOS -->
    <section class="testimonials">
        <h2>O que nossos alunos dizem</h2>
        <div class="testimonial-container">
            <div class="testimonial">
                <img src="../img/avaliacao/pic-3.png" alt="Estudante 1">
                <p>"Aprender sobre ecologia com a High Ecology mudou minha vida! Agora eu sei como contribuir para um
                    mundo melhor."</p>
                <span>- Maria Silva</span>
            </div>
            <div class="testimonial">
                <img src="../img/avaliacao/pic-1.png" alt="Estudante 2">
                <p>"Os cursos são práticos, informativos e incríveis. Recomendo a todos!"</p>
                <span>- João Pereira</span>
            </div>
            <div class="testimonial">
                <img src="../img/avaliacao/pic-2.png" alt="Estudante 3">
                <p>"Os cursos são exelentes, aprendi muito e desejo continuar aprendendo cada vez mais com eles."</p>
                <span>- Marco Bezerra</span>
            </div>
        </div>
    </section>
    </form>
    </div>

    <!--FINAL DOS CURSOS-->

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
                            <a href="https://instagram.com/high.ecology?igshid=OGQ5ZDc2ODk2ZA==" class="footer-link"
                                id="instagram">
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
                    Uma rede online de ensino focado em incentivar os nossos estudantes a cuidar melhor do lugar onde
                    eles moram, a Terra.
                    Temos o objetivo de disponibilizar cursos que abrangem as mais diversas matérias dos estudos
                    ecológicos.
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