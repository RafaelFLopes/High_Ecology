//FECHAR O CARROSSEL PARA APARECER O MENU HAMBURGUER

var ul = document.querySelector('nav ul');
var menuBtn = document.querySelector('.menu-btn i');
let section = document.querySelector('.slider');

function menuShow(){

    if (ul.classList.contains('open')) {
        ul.classList.remove('open');
        section.classList.remove('slider_fechado');
    }

    else{
        ul.classList.add('open');
        section.classList.add('slider_fechado');
    }
}

//FECHAR O CARROSSEL PARA APARECER O MENU HAMBURGUER

//COMEÇO DO CARROSSEL

var radio = document.querySelector('.manual-btn')
var cont = 1

document.getElementById('radio1').checked = true

setInterval(() => {
    proximaImg()
}, 14000)

function proximaImg(){

    cont++

    if(cont > 4){
        cont = 1 
    }
    document.getElementById('radio'+cont).checked = true
}

//FINAL DO CARROSSEL
