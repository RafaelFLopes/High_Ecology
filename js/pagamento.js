const cardBox = document.querySelector('div.card-content-box');
const btnRotateCard = document.querySelector('#rotate-card');
const btnSubmit = document.querySelector('#input-submit');
const btnViaPix = document.querySelector('#btnPix'); 

const inputNumber = document.querySelector('#input-number');
const inputNumberInfo = document.querySelector('#input-number + .info');
const inputName = document.querySelector('#input-name');
const inputNameInfo = document.querySelector('#input-name + .info');
const inputCvv = document.querySelector('#input-cvv');
const inputCvvInfo = document.querySelector('#input-cvv + .info');
const inputValidate = document.querySelector('#input-validate');
const inputValidateInfo = document.querySelector('#input-validate + .info');

const cardViewName = document.querySelector('#card-user-name');
const cardViewNumber = document.querySelector('#card-user-number');
const cardViewCvv = document.querySelector('#card-user-cvv');
const cardViewDate = document.querySelector('#card-user-date');

// Validação para o número do cartão
inputNumber.onblur = (e) => {
    const value = e.target.value;
    const valueReplace = value.replaceAll(' ', '');

    if (value.length <= 0) {
        const message = "Preenchimento obrigatório!";
        inputNumberInfo.querySelector('.message').innerText = message;
        inputNumberInfo.classList.add('visible');
        btnSubmit.classList.add('disable');
        btnViaPix.classList.add('disable'); 
        return false;
    }

    if (!/^[0-9]{16}$/.test(valueReplace)) {
        const message = "Use apenas números, e verifique se estão completos!";
        inputNumberInfo.querySelector('.message').innerText = message;
        inputNumberInfo.classList.add('visible');
        btnSubmit.classList.add('disable');
        btnViaPix.classList.add('disable');
        return false;
    }

    inputNumberInfo.querySelector('.message').innerText = '';
    inputNumberInfo.classList.remove('visible');

    canSubmit();
}

// Validação para o nome
inputName.onblur = (e) => {
    const value = e.target.value;
    const valueReplace = value.replaceAll(' ', '');

    if (value.length <= 0) {
        const message = "Preenchimento obrigatório!";
        inputNameInfo.querySelector('.message').innerText = message;
        inputNameInfo.classList.add('visible');
        btnSubmit.classList.add('disable');
        btnViaPix.classList.add('disable'); 
        return false;
    }

    if (!/^[a-z]+$/i.test(valueReplace)) {
        const message = "Insira seu nome corretamente!";
        inputNameInfo.querySelector('.message').innerText = message;
        inputNameInfo.classList.add('visible');
        btnSubmit.classList.add('disable');
        btnViaPix.classList.add('disable');
        return false;
    }

    inputNameInfo.querySelector('.message').innerText = '';
    inputNameInfo.classList.remove('visible');
    canSubmit();
}

// Validação para a data de validade
inputValidate.onblur = (e) => {
    const value = e.target.value;
    const valueReplace = value.replaceAll(' ', '');

    if (value.length <= 0) {
        const message = "Preenchimento obrigatório!";
        inputValidateInfo.querySelector('.message').innerText = message;
        inputValidateInfo.classList.add('visible');
        btnSubmit.classList.add('disable');
        btnViaPix.classList.add('disable'); 
        return false;
    }

    if (!/^[0-9]{2}\/[0-9]{4}/i.test(valueReplace)) {
        const message = "Use o padrão mês/ano";
        inputValidateInfo.querySelector('.message').innerText = message;
        inputValidateInfo.classList.add('visible');
        btnSubmit.classList.add('disable');
        btnViaPix.classList.add('disable'); 
        return false;
    }

    inputValidateInfo.querySelector('.message').innerText = '';
    inputValidateInfo.classList.remove('visible');
    canSubmit();
}

// Evento para girar o cartão
btnRotateCard.addEventListener('click', (e) => {
    cardBox.classList.toggle('rotate');
});

// Atualização do nome exibido no cartão
const handleName = (e) => {
    setTimeout(() => {
        const value = e.target.value;
        cardViewName.innerText = value;
    }, 100);
};

// Atualização do número exibido no cartão
const handleNumber = (e) => {
    setTimeout(() => {
        let value = e.target.value.replace(/\D/g, ''); // Remove todos os caracteres que não são números

        if (value.length > 16) {
            value = value.slice(0, 16); // Limita o número a 16 dígitos
        }

        // Formata a cada 4 dígitos
        value = value.replace(/(\d{4})(?=\d)/g, '$1 ');

        e.target.value = value;
        cardViewNumber.innerText = value;
    }, 0);
};

// Atualização do CVV exibido no cartão
const handleCvv = (e) => {
    setTimeout(() => {
        const value = e.target.value;
        cardViewCvv.innerText = value;
    }, 0);
};

// Atualização da data de validade exibida no cartão
const handleValidate = (e) => {
    setTimeout(() => {
        const value = e.target.value;
        cardViewDate.innerText = value;
    }, 0);
};

// Manter o cartão virado ao focar no CVV
inputCvv.onfocus = () => {
    cardBox.classList.remove('rotate');
};

// Girar o cartão ao desfocar do CVV
inputCvv.onblur = () => {
    cardBox.classList.add('rotate');
    canSubmit();
};

// Função para verificar se os campos estão preenchidos
function canSubmit() {
    const inputs = document.querySelectorAll('input');
    let allFilled = true; // Verifica se todos os campos estão preenchidos

    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value.length <= 0) {
            allFilled = false; // Se algum campo não estiver preenchido, define como false
            break;
        }
    }

    // Desabilita o botão "Via Pix" se todos os campos estiverem preenchidos
    btnViaPix.classList.toggle('disable', allFilled); // Habilita/desabilita o botão "Via Pix"
}

// Verifica o preenchimento ao mudar qualquer campo
inputNumber.oninput = inputName.oninput = inputCvv.oninput = inputValidate.oninput = canSubmit;

// Inicializa a verificação
canSubmit();
