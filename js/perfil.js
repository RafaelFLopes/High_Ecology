let list = document.querySelectorAll(".navegacao li"); // use querySelectorAll

function ativarLink() {
    list.forEach((item) => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovered");
}

list.forEach(item => item.addEventListener("mouseover", ativarLink));

// ====== MENU SANDUICHE ===== //   

let toggle = document.querySelector(".toggle");
let navegacao =  document.querySelector(".navegacao");
let main = document.querySelector(".main-p");

toggle.onclick = function () {
    navegacao.classList.toggle("active");
    main.classList.toggle("active");
};
