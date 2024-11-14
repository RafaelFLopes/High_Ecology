<!DOCTYPE html>
<html lang="pt-ago">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> <!--BIBLIOTECA DE ANIMAÇÕES-->
	<link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet">
    <title>Pagamento Cartão</title>
    <link rel="stylesheet" href="../css\pagamento1.css" />
    <link rel="stylesheet" href="../css\pagamento2.css" />
</head>
<body>

<a href="#" class="return-link">
	<img src="../img/pagamento\arrow.svg" width="20px" alt="">
</a>

<a href="#" class="gradient-button"><span class ="plan">Growth</span></a>

<div class="wrapper">
    <form action="" class="form-container">
        <div class="box-form">
            <div class="input-content">
                <div class="box-input">
                    <label>Número do cartão</label>
                    <input autocomplete="off" id="input-number" type="text" maxlength="19" placeholder="Número do cartão" style="word-spacing: 8px;" onkeydown="handleNumber(event)">
                    <div class="info">
                        <span class="icon">
                            <img src="../img/pagamento\warning.svg" />
                        </span>
                        <span class="message"></span>
                    </div>
                </div>
                
                <div class="box-input">
                    <label>Nome do titular</label>
                    <input autocomplete="off" id="input-name" type="text" maxlength="23" placeholder="Nome como está no cartão" onkeydown="handleName(event)">
                    <div class="info">
                        <span class="icon">
                            <img src="../img/pagamento\warning.svg" />
                        </span>
                        <span class="message"></span>
                    </div>
                </div>
                
                <div class="box-input-more">
                    <div class="box-one">
                        <label>Validade</label>
                        <input autocomplete="off" id="input-validate" maxlength="7" type="text" placeholder="mm/aa" onkeydown="handleValidate(event)">
                        <div class="info">
                            <span class="icon">
                                <img src="../img/pagamento\warning.svg" />
                            </span>
                            <span class="message"></span>
                        </div>
                    </div>
                    
                    <div class="box-two">
                        <label>
                            CVV
                            <span class="icon" title="Ajuda">
                                <img src="../img/pagamento\help.svg" />
                            </span>
                        </label>
                        <input autocomplete="off" id="input-cvv" type="password" maxlength="3" placeholder="cvv" onkeydown="handleCvv(event)">
                        <div class="info">
                            <span class="icon">
                                <img src="../img/pagamento\warning.svg" />
                            </span>
                            <span class="message"></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card-content animate__animated animate__backInUp">
                <div class="card-content-box rotate">
                    <div class="box-card">
                        <div class="content">
                            <div class="card-header">
                                <span class="icon"><img src="../img/pagamento\visa-logo.svg" /></span>
                                <span class="icon"><img src="../img/pagamento\contact-less-payment.svg" /></span>
                            </div>
                            
                            <div class="card-body">
                                <div id="card-user-number" class="number-card">•••• •••• •••• ••••</div>
                                 
                                <div class="name-and-date">
                                    <div id="card-user-name" class="name">(Seu nome)</div>
                                    <div id="card-user-date" class="date">• • / • • • •</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="box-card">
                        <div class="content card-2">
                            <div class="bar"></div>
                            <div class="cvv">
                                <div id="card-user-cvv" class="cvv-number"></div>
                                <div class="cvv-text">CVV</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="rotate-card" class="rotate-card" title="Ver a outra parte do cartão">
                    <img src="../img/pagamento\rotate.svg" width="20px">
                </div>
                
                <div class="status-security">
                    <span class="icon"><img src="../img/pagamento\shield.svg" /></span>
                    <span>Seus dados estão seguros</span>
                </div>
            </div>
        </div>

        <div class="button-group">
            <a href="" class="button-action">Pagar Com Cartão</a>
            <span class="button-separator"><i>OU</i></span>
            <a id="btnPix" href="pix.php" class="button-action">Via PIX</a>
        </div>
        
    </form>
</div>

<script src="../js\pagamento.js"></script>

</body>
</html>
