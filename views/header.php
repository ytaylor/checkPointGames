<!DOCTYPE html>
<html lang="en">
<head>
    <title>CheckPoint Game</title>
    <meta charset="UTF-8">
    <!-- El tamaño de m i pantalla se hará responsiva con independencia del dispositivo-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

    <!-- CCS originales -->
    <link rel="stylesheet" type="text/css" href="../css/estilosHome.css">
    <link rel="stylesheet" type="text/css" href="../css/fontello.css">
    <link rel="stylesheet" type="text/css" href="../css/simple-sidebar.css">

    <!-- CSS y los JS para el uso de Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../boostrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- incluir mi archivo java Script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</head>
<body>
<!-- CABECERA -->
<header>
    <!-- HEADER - cabecera superior de la web -->
    <section>
        <nav class="mb-1 navbar navbar-expand-lg navbar-dark secondary-color lighten-1">
            <div class="collapse navbar-collapse" id="navbarSupportedContent-555">

            <a class="navbar-brand" href="../index.php">
                <img src="../images/icons/logo_completo.png"  height="30" alt="">
            </a>

            <form class="form-inline  ml-auto">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-secondary btn-md my-4 my-sm-0 ml-3" type="submit">Search</button>
            </form>

            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li>
                    <!-- Icono CARRO -->
                    <a>
                        <img src="../images/icons/icon_cart.png" class="rounded z-depth-0" alt="avatar image" height="30">
                    </a>
                <!-- Desplegable de icono carro
                <li class="nav-item avatar dropdown">
                    
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" href="">
                        <img src="../checkPointGames/images/icons/icon_cart.png" class="rounded z-depth-0" alt="avatar image" height="30">
                    </a>

                    <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
                         aria-labelledby="navbarDropdownMenuLink-55">

                        <a class="dropdown-item">Unidades  </a>
                        <a class="dropdown-item">Euros</a>
                        <br>
                    </div>
                -->
                <li class="nav-item">
                    <?php

                    echo '
                        <a class="nav-link waves-effect waves-light">Uds: '.$_SESSION["udsTotal"].'  Euros: '.$_SESSION["eurosTotal"].'</a>                    
                    ';?>
                </li>
                <li class="nav-item">
                        <a href="index.php?cartDetail=cartDetail" class="txtDetails">Detalles</a>
                </li>
                </li>
            </ul>
            </div>
        </nav>
</section>
</header>



