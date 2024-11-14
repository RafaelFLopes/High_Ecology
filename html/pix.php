<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Pagamento com PIX</title>
</head>
<body>

    <!--CSS INTEGRADO-->
    
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

html {
  font-size: 62.5%;
  height: 100vh;
  width: 100vw;
  background: linear-gradient(to bottom right, #F2F2F2, #F2F2F2 47.5%, #4CAF50 47%, #4c6e48);
}

body {
  height: 100%;
  display: grid;
  place-items: center;
}

a {
  text-decoration: none;
}

.wrapper {
  background-color: #E9E9E9;
  padding-right: 50px;
  height: 300px;
  width: 600px;
  border-radius: 5px;
  border-top-left-radius: 40px;
  border-bottom-right-radius: 40px;
  box-shadow: 0 0.8rem 2.5rem rgba(2, 96, 20, 10);
  display: flex;
  justify-content: center;
  align-items: center;
}

.wrapper.active {
  height: 300px;
}

.wrapper.active .header h1 {
  font-size: 2.5rem;
}

.header-form {
  padding-left: 50px;
  margin-right: 10px;
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-decoration: none;
}

.wrapper .header h1 {
  padding-bottom: 11px;
  font-size: 3.5rem;
  text-align: center;
  color: #4c6e48;
  text-shadow: #000 1px 1px 1px;
}

.wrapper .header p {
  font-size: 1.6rem;
  margin-bottom: 5px;
  text-align: center;
  font-weight: bolder;
  color: #5a2323bb;
}

.wrapper .form {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.wrapper .form input {
  background-color: transparent;
  width: 100%;
  outline: none;
  height: 50px;
  margin-bottom: 2rem;
  border: none;
  border-bottom: 0.1rem solid #5A2323;
  text-align: center;
  color: #8ca36e;
  font-weight: bold;
}

.wrapper .form button {
  width: 100%;
  height: 40px;
  background-color: #4c6e48e8;
  outline: none;
  border: none;
  font-weight: 560;
  color: #eee;
  cursor: pointer;
  transition: all 0.3s;
}

.wrapper .form button:hover {
  border: 2px solid #4CAF50;
  transform: scale(1.05);
}

#btnPagar {
  padding: 0px 110.6px; 
  display: none; 
}

#btnRetornar {
  margin-top: 10px;
  width: 255px;
  display: none; 
}

.wrapper .qr-code {
  display: none;
  padding: 10px;
  margin-top: 20px;
  margin-left: 20px;
  margin-right: 10px;
  border-radius: 5px;
  pointer-events: none;
  border: 1px solid #ccc;
}

.wrapper .qr-code img {
  width: 170px;
}

.wrapper.active .qr-code {
  display: block;
  transition: all 0.5s ease;
}

@media (max-width: 608px) {
  .wrapper {
    width: 100%;
    padding: 0;
  }

  .wrapper.active {
    height: auto;
  }

  .wrapper.active .header h1 {
    font-size: 2.5rem;
  }

  .wrapper .header h1 {
    font-size: 2.5rem;
  }

  .wrapper .header p {
    font-size: 1.6rem;
  }

  .wrapper .form input {
    width: 100%;
  }

  .wrapper .form button {
    width: 100%;
  }

  .wrapper .qr-code {
    margin: 10px 0;
  }
}

@media (max-width: 608px) {
  .wrapper {
    width: 80%;
    display: flex;
    flex-direction: column-reverse;
  }

  .wrapper .header-form {
    padding: 20px;
    text-align: center;
  }

  .wrapper .form {
    padding: 0 20px;
  }
}

@media (max-width: 400px) {
  .wrapper .qr-code {
    margin-top: 20px;
  }

  .wrapper .form button {
    margin-top: 10px;
  }
}
    </style>        <!--FIM DO CSS-->


                    <!--HTML DA PÁGINA-->

    <div class="wrapper">
        <div class="header-form">
            <div class="header">
                <h1>Gerador de QRCode</h1>
                <p>Pagamento Simples e Rápido</p>
            </div>
            <div class="form">
                <input type="text" name="" id="inputValue">
                <button id="btnValue">Gerar QRcode</button>
                <form action="" id="payment-form">
                    <button type="submit" id="btnPagar">Pago</button>
                </form>
                <a href="pg.html">
                    <button id="btnRetornar">
                        <i class="fa fa-arrow-left"></i> Retornar
                    </button>
                </a>
            </div>
        </div>
        <div class="qr-code">
            <img src="" id="imgQrCode" alt="">
        </div>
    </div>

    <!--FIM DA PARTE HTML-->

                                    <!--SCRIPTS DA API GERADORA DE PIX-->

    <script>
        const inputValue = document.querySelector('#inputValue');
        const btnValue = document.querySelector('#btnValue');
        const imgQrCode = document.querySelector('#imgQrCode');
        const wrapper = document.querySelector('.wrapper');
        const btnPagar = document.querySelector('#btnPagar');
        const btnRetornar = document.querySelector('#btnRetornar');
        let valueDefault;

        btnValue.addEventListener('click', () => {
            let qrcodeValue = inputValue.value.trim();
            if (!qrcodeValue || qrcodeValue === valueDefault) return;
            valueDefault = qrcodeValue;
            btnValue.innerText = 'Gerando QR Code...'
            imgQrCode.src = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${valueDefault}`
            imgQrCode.addEventListener('load', () => {
                wrapper.classList.add('active');
                btnValue.innerText = 'Gerar QRCode';
                btnValue.style.display = 'none'; 
                btnPagar.style.display = 'block';
                btnRetornar.style.display = 'block'; 
            });
        });

    </script>

</body>
</html>