<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/conteudo-main-logado.css">

    <?php  if($_SESSION["user"]['tabela'] == "professor") {?>
        <link rel="stylesheet" href="../css/leftnavbarprofessor.css">
        <link rel="stylesheet" href="../css/topbarprofessor.css">
    <?php } else if($_SESSION["user"]['tabela'] == "aluno") {?>
        <link rel="stylesheet" href="../css/leftnavbar.css">
        <link rel="stylesheet" href="../css/topbar.css">
    <?php } ?>

    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/mensagembemvindo.css">
    <script src="../js/perfil.js" defer></script>
</head>
<body>

    <div class = "container-p">
        <div class = "navegacao">
            <ul>
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
                    <a href = "#">
                        <span class = "icone">
                            <ion-icon name = "home-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Home</span>
                    </a>
                </li>
                <?php } ?>

                <?php 
                if($_SESSION["user"]['tabela'] == "professor")
                {?>
                    <li>
                    <a href = "gerenciar-cursos.php">
                        <span class = "icone">
                            <ion-icon name="pencil-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Gerenciar Cursos</span>
                    </a>
                    </li>
                <?php } ?>


                <li>
                    <a href = "cursos.php">
                        <span class = "icone">
                            <ion-icon name="library-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Cursos</span>
                    </a>
                </li>
                
                <?php 
                if($_SESSION["user"]['tabela'] == "aluno")
                {?>
                <li>
                    <a href = "#">
                        <span class = "icone">
                            <ion-icon name="trophy-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Certificados</span>
                    </a>
                </li>
                <?php } ?>

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
                    <a href="editar-perfil.php">
                        <img src="<?php if($_SESSION["user"]['tabela'] == "aluno") { echo $_SESSION['dados_user']['img']; } elseif($_SESSION["user"]['tabela'] == "professor") { echo "../img/icon.png";} ?>" alt="foto de perfil">
                    </a>
                </div>
            </div>

            <div>
            </div>





            <div class="mensagemBemvindo">
                <h1>Seja bem-vindo(a) <?php echo $_SESSION['user']['tabela'], " ", $_SESSION['dados_user']['nome'];?></h1>
            </div>





            <div class = "cardGrupo">
            
                <div class = "cards">
                    <div>
                        <div class = "numeros">9</div>
                        <div class = "nomeCard">Badges</div>
                    </div>
                    <div class = "iconeGp">
                        <ion-icon name="trophy-outline"></ion-icon>
                    </div>
                </div>
            
                <div class = "cards">
                    <div>
                        <div class = "numeros">2</div>
                        <div class = "nomeCard">Em Aberto</div>
                    </div>
                    <div class = "iconeGp">
                        <ion-icon name="book-outline"></ion-icon>
                    </div>
                </div>
            

                <?php
                    include('../php/config.php');

                    // Recupera a assinatura do aluno
                    $stmt = $pdo->query('SELECT * FROM assinaturas WHERE Cod_Aluno = ' . $_SESSION['dados_user']['cod_aluno']);
                    $assinatura = $stmt->fetch(); // Pega apenas uma linha

                    if ($assinatura) {
                        // Pega o plano da assinatura
                        $plano = $assinatura['Plano'];

                        // Recupera o valor do plano correspondente
                        $stmt = $pdo->query('SELECT Valor FROM planos WHERE Tipo = "' . $plano . '"');
                        $valorAssinatura = $stmt->fetch(); // Pega apenas uma linha
                    } else {
                        $valorAssinatura = null; // Caso não haja assinatura
                    }
                ?>

                <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="row container d-flex">

                              <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Histórico</h4>
                                  <p class="card-description">
                                    Pagamentos realizados no ano
                                  </p>
                                  <div class="table-responsive">
                                    <table class="table">
                                      <thead>
                                        
                                        <tr>
                                          <th>Data</th>
                                          <th>Plano</th>
                                          <th>Valor</th>
                                          <th>Pagamento</th>
                                        </tr>
                                        
                                      </thead>
                                      <tbody>
                                      <?php foreach ($assinatura as $assinaturas): ?>
                                        <tr>
                                          <td><?php echo htmlspecialchars($assinaturas['Data_Assinatura']);?></td>
                                          <td><?php echo htmlspecialchars($assinaturas['Plano']);?></td>
                                          <td><?php echo htmlspecialchars($valorAssinatura);?></td>
                                          <td><label class="badge badge-warning"><?php echo htmlspecialchars($assinaturas['Forma_Pagamento']);?></label></td>
                                        </tr>
                                      <?php endforeach; ?>
                                        
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
   
                </div>
        </div>



    <script type = "module" src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


    <div vw class = "enabled">
        <div vw-access-button class = "active"></div>
        <div vw-plugin-wrapper>
          <div class = "vw-plugin-top-wrapper"></div>
        </div>
      </div>
      <script src = "https://vlibras.gov.br/app/vlibras-plugin.js"></script>
      <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
      </script>
</body>
</html>


