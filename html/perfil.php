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

    <link rel="stylesheet" href="../css/menulateral.css">
    <link rel="stylesheet" href="../css/topbar.css">

    <link rel="stylesheet" href="../css/perfil.css">
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

                <li>
                    <a href = "#">
                        <span class = "icone">
                            <ion-icon name = "home-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Home</span>
                    </a>
                </li>

                <?php 
                if($_SESSION["user"]['tabela'] == "professor") // ALGUM ERRO NA VARIAVEL , VERIFICAAAAAAAAAAAAAAAR
                {?>
                    <li>
                    <a href = "#">
                        <span class = "icone">
                            <ion-icon name="pencil-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Gerenciar Cursos</span>
                    </a>
                    </li>
                <?php } ?>


                <li>
                    <a href = "#">
                        <span class = "icone">
                            <ion-icon name="library-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Cursos</span>
                    </a>
                    </li>

                <li>
                    <a href = "#">
                        <span class = "icone">
                            <ion-icon name="trophy-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Certificados</span>
                    </a>
                </li>

                <li>
                    <a href = "#">
                        <span class = "icone">
                            <ion-icon name = "help-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Ajuda</span>
                    </a>
                </li>

                <li>
                    <a href = "#">
                        <span class = "icone">
                            <ion-icon name = "settings-outline"></ion-icon>
                        </span>
                        <span class = "titulo">Editar Perfil</span>
                    </a>
                </li>

                <li>
                    <a href = "#">
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
                    
                    <img src = "../img/avaliacao/pic-1.png" alt = "Foto do Usuário">
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
                        <div class = "numeros">12 Dias</div>
                        <div class = "nomeCard">Estudos Consecutivos</div>
                    </div>
                    <div class = "iconeGp">
                        <ion-icon name="barbell-outline"></ion-icon>
                    </div>
                </div>
            
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
            

                <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="row container d-flex justify-content-center">

                            <div class="col-lg-8 grid-margin stretch-card">
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
                                          <th>Valor</th>
                                          <th>Vencimento</th>
                                          <th>Status</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>25/10</td>
                                          <td>R$ 59,99</td>
                                          <td>18 Jun 2024</td>
                                          <td><label class="badge badge-warning">Pendente</label></td>
                                        </tr>
                                        <tr>
                                           <td>17/09</td>
                                           <td>R$ 49,99</td>
                                           <td>18 Jun 2024</td>
                                          <td><label class="badge badge-danger">Cancelado</label></td>
                                        </tr>
                                        <tr>
                                            <td>02/08</td>
                                            <td>R$ 49,99</td>
                                            <td>18 Jun 2024</td>
                                          <td><label class="badge badge-success">Pago</label></td>
                                        </tr>
                                        <tr>
                                            <td>07/07</td>
                                            <td>R$ 49,99</td>
                                            <td>18 Jun 2024</td>
                                          <td><label class="badge badge-success">Pago</label></td>
                                        </tr>
                                        <tr>
                                            <td>04/06</td>
                                            <td>R$ 49,99</td>
                                          <td>18 Jun 2024</td>
                                          <td><label class="badge badge-success">Pago</label></td>
                                        </tr>
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


