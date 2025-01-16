// Escuchar el evento click para hacer scroll hacia arriba
document.getElementById("button-up").addEventListener("click", scrollUp);

function scrollUp() {
    var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;

    if (currentScroll > 0) {
        window.requestAnimationFrame(scrollUp);
        window.scrollTo(0, currentScroll - (currentScroll / 25));  // Desplazamiento suave
    }
}

// Controlar la visibilidad del botón según el desplazamiento
const buttonUp = document.getElementById("button-up");

window.onscroll = function() {
    var scroll = document.documentElement.scrollTop || document.body.scrollTop;

    // Mostrar el botón si el desplazamiento es mayor a 500px
    if (scroll > 500) {
        buttonUp.classList.add('show');
    } else {
        buttonUp.classList.remove('show');
    }
};
