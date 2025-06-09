// Añadir evento al botón para que, al hacer click, se active el scroll hacia arriba
document.getElementById("button-up").addEventListener("click", scrollUp);

// Función que realiza el scroll hacia arriba de forma suave
function scrollUp() {
    // Función interna que se ejecuta en cada frame de animación
    const step = () => {
        // Obtener la posición actual del scroll vertical
        const currentScroll = document.documentElement.scrollTop || document.body.scrollTop;

        // Si todavía no hemos llegado al tope superior
        if (currentScroll > 2) {
            // Calcular la nueva posición del scroll:
            // - Se reduce un 1/50 del valor actual
            // - Pero nunca se baja menos de 10px para evitar quedarse "enganchado" en los últimos píxeles
            const newScroll = Math.floor(currentScroll - Math.max(currentScroll / 50, 10));

            // Mover el scroll a la nueva posición
            window.scrollTo(0, newScroll);

            // Solicitar el siguiente frame de animación para continuar bajando
            window.requestAnimationFrame(step);
        } else {
            // Cuando el scroll está casi arriba (menos de 2px), lo dejamos en 0 exacto para asegurar que llega
            window.scrollTo(0, 0);
        }
    };

    // Iniciar la animación llamando al primer frame
    window.requestAnimationFrame(step);
}

// Obtener el botón de scroll para controlarlo visualmente
const buttonUp = document.getElementById("button-up");

// Escuchar el evento de scroll de la ventana
window.addEventListener("scroll", () => {
    // Obtener la posición actual del scroll vertical
    const scroll = document.documentElement.scrollTop || document.body.scrollTop;

    // Si el scroll es mayor a 500px, mostrar el botón
    if (scroll > 500) {
        buttonUp.classList.add('show');
    } else {
        // Si el scroll está por debajo de 500px, ocultar el botón
        buttonUp.classList.remove('show');
    }
});
