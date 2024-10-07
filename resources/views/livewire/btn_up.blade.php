<style>
    #button-up {
        position: fixed;
        bottom: 0.5rem;
        right: 0.5rem;
        transition-property: opacity;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 150ms;
        opacity: 0;
    }

    #scroll-to-top {
        display: flex;
        width: 3rem;
        height: 3rem;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        border-radius: 0.5rem;
        border: 2px solid #007bff;
        color: #007bff;
        border-width: 2px;
        opacity: 1;
        background-color: rgb(31 41 55 / var(--tw-bg-opacity))
            /* #1f2937 */
        ;
        transform: scale(1.05);
        /* Escalado al 105% */
        transition: transform 0.3s ease-in-out;
        transform: scale(1.05);

    }

    #scroll-to-top:hover {
        transform: scale(1.05);
    }

    @media (prefers-reduced-motion: no-preference) {
        #scroll-to-top {
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }
    }

    #scroll-to-top-icon {
        height: 1.5rem;
        width: 1.5rem;
        transition: transform 0.3s ease-in-out;
        /* Transición para el icono */
        transform: rotate(-45deg);
        /* Rotación inicial del icono */
    }

    .group {
        display: inline-block;
        /* Necesario para que el hover funcione correctamente */
    }

    .group:hover #scroll-to-top-icon {
        transform: rotate(-90deg);
        /* Aplica la rotación del icono al hacer hover */
    }
</style>


<div id="button-up">
    <button id="scroll-to-top" aria-label="Volver al inicio de la página" class="group">
        <svg id="scroll-to-top-icon" xmlns="http://www.w3.org/2000/svg" width="35" height="35"
            aria-label="Subir al inicio de la página" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
            fill="none" class="-rotate-45 group-hover:-rotate-90 group-hover:text-accent motion-safe:transition">
            <path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linejoin="round" stroke-linecap="round"></path>
        </svg>
    </button>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const button = document.getElementById("scroll-to-top");
        const parent = button.closest("#button-up");

        // Función para comprobar la posición del scroll y ajustar la visibilidad del botón
        const toggleScrollToTop = () => {
            const scrollTop = document.documentElement.scrollTop;
            const show = scrollTop > 10; // Cambia este valor según desees
            parent.style.opacity = show ? "1" : "0"; // Cambia la opacidad
            parent.style.pointerEvents = show ? "auto" : "none"; // Permitir clics solo si es visible
        };

        // Ejecutar la función al cargar la página para ajustar el botón correctamente
        toggleScrollToTop();

        // Añadir el listener de scroll
        window.addEventListener("scroll", () => {
            requestAnimationFrame(toggleScrollToTop);
        });

        // Añadir evento de clic al botón
        button.addEventListener("click", (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    });
</script>
