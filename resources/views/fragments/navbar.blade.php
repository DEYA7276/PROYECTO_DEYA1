@vite('resources/js/app.js')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(16, 16, 16, 0.8);">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="{{ route('index') }}">
             
                <i class="fa-solid fa-gift" style="font-size: 40px; color: #f8f9fa;"></i>
            </a>

           
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> 
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
    
    .navbar {
        background-color: #343a40; 
        padding: 15px 30px;
        border-bottom: 2px solid #f8f9fa; 
    }

    
    .navbar-brand i {
        font-size: 40px; 
        color: #f8f9fa; 
    }

   
    .navbar-nav .nav-link:hover {
        background-color: #ff9900; 
        border-radius: 5px;
        transform: scale(1.1); 
    }

   
    .nav-link i {
        margin-right: 5px;
        font-size: 20px;
        color: #f8f9fa;
        transition: color 0.3s ease;
    }

    .nav-link:hover i {
        color: #343a40; 
    }

   
    .dropdown-menu {
        background-color: #343a40; 
        border: none;
    }

    .dropdown-item:hover {
        background-color: #ff9900;
        color: #343a40; 
    }
</style>
