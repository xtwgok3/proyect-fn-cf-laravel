<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h5>Acerca de Nosotros</h5>
            <p>Breve descripción de tu empresa o aplicación.</p>
            <p>Información de contacto: correo electrónico, teléfono, redes sociales.</p>
        </div>
        <div class="col-md-4">
            <h5>Enlaces Rápidos</h5>
            <ul class="list-unstyled" style="--bs-link-color-rgb: 126, 179, 251;">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div>
        <div class="col-md-4">
            <h5>Boletín Informativo</h5>
            <form>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" disabled placeholder="Tu correo electrónico"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" disabled type="button"
                        id="button-addon2">Suscribirse</button-->
                </div>
            </form>
            <ul class="list-inline social-icons">
                <!--li class="list-inline-item"><a href="https://facebook.com/" target="_blank"><i
                            class="fab fa-facebook-f"></i></a></li-->
                <li class="list-inline-item"><a href="https://github.com/xtwgok3/" target="_blank" aria-label="Visitar el perfil de GitHub de xtwgok3"><i
                            class="fab fa-github"style="font-size: 3rem!important;"></i></a></li>
                <!--li class="list-inline-item"><a href="https://www.instagram.com/" target="_blank"><i
                            class="fab fa-instagram"></i></a></li-->
                <li class="list-inline-item"><a href="https://www.linkedin.com/in/carlos-alderete-806409274/"
                        target="_blank" aria-label="Visitar el perfil de LinkedIn de Carlos Alderete"><i class="fab fa-linkedin-in"style="font-size: 3rem!important;"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <p>&copy; {{ now()->year }} Tu Empresa. Todos los derechos reservados.</p>
        </div>
    </div>
</div>
@include('livewire.btn_up')
