@vite('resources/js/app.js') <!-- Esta línea se encarga de incluir el archivo JS compilado -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(16, 16, 16, 0.8);">
        <div class="container-fluid">
            <!-- Logo a la izquierda -->
            <a class="navbar-brand" href="{{ route('index') }}">
                <!-- Aumentar el tamaño del ícono del logo -->
                <i class="fa-solid fa-gift" style="font-size: 40px; color: #f8f9fa;"></i>
            </a>

            <!-- Menú de navegación con Inicio, Productos, Clientes, Ventas a la derecha -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> <!-- ms-auto para alinear todo a la derecha -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}" style="font-size: 18px; transition: all 0.3s ease;">
                            <i class="fa-solid fa-house"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}" style="font-size: 18px; transition: all 0.3s ease;">
                            <i class="fa-solid fa-candy"></i> Productos
                        </a>
                    </li>

                    <!-- Dropdown Menu para Clientes -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 18px; transition: all 0.3s ease;">
                            <i class="fa-solid fa-users"></i> Clientes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('clients.index') }}">Ver Clientes</a></li>
                            <li><a class="dropdown-item" href="{{ route('addresses.index') }}">Direcciones</a></li> <!-- Enlace a Direcciones -->
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sales.index') }}" style="font-size: 18px; transition: all 0.3s ease;">
                            <i class="fa-solid fa-cart-shopping"></i> Ventas
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<style>
    /* Cambiar el color de fondo del navbar y aumentar el tamaño */
    .navbar {
        background-color: #343a40; /* Gris oscuro */
        padding: 15px 30px;
        border-bottom: 2px solid #f8f9fa; /* Línea de separación */
    }

    /* Asegurarse de que el ícono del logo esté grande */
    .navbar-brand i {
        font-size: 40px; /* Ajustar el tamaño del ícono */
        color: #f8f9fa; /* Color blanco para el ícono */
    }

    /* Efecto hover para los links del menú */
    .navbar-nav .nav-link:hover {
        background-color: #ff9900; /* Fondo anaranjado */
        border-radius: 5px;
        transform: scale(1.1); /* Aumentar el tamaño del enlace */
    }

    /* Cambiar el color de los iconos */
    .nav-link i {
        margin-right: 5px;
        font-size: 20px;
        color: #f8f9fa;
        transition: color 0.3s ease;
    }

    .nav-link:hover i {
        color: #343a40; /* Cambiar color del icono al pasar el ratón */
    }

    /* Estilo para el dropdown */
    .dropdown-menu {
        background-color: #343a40; /* Fondo oscuro */
        border: none; /* Sin bordes */
    }

    .dropdown-item:hover {
        background-color: #ff9900; /* Fondo anaranjado cuando se pasa el ratón */
        color: #343a40; /* Cambiar color del texto */
    }
</style>
