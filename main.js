//COMEÇO DE NAVBAR

var ul = document.querySelector('nav ul');
var menuBtn = document.querySelector('.menu-btn i');

function menuShow(){

    if (ul.classList.contains('open')) {
        ul.classList.remove('open');
    }

    else{
        ul.classList.add('open');
    }
}

//FINAL DE NAVBAR

//COMEÇO DO CARROSSEL

var radio = document.querySelector('.manual-btn')
var cont = 1

document.getElementById('radio1').checked = true

setInterval(() => {
    proximaImg()
}, 11000)

function proximaImg(){

    cont++

    if(cont > 3){
        cont = 1 
    }
    document.getElementById('radio'+cont).checked = true
}

//FINAL DO CARROSSEL
