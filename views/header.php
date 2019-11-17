<!DOCTYPE html>
<html lang="en">
<head>
    <title>CheckPoint Game</title>
    <meta charset="UTF-8">
    <!-- El tamaño de m i pantalla se hará responsiva con independencia del dispositivo-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        body { background-color:#fafafa; font-family:'Open Sans';}
        .container { margin:150px auto;}
        .treegrid-indent {
            width: 0px;
            height: 16px;
            display: inline-block;
            position: relative;
        }

        .treegrid-expander {
            width: 0px;
            height: 16px;
            display: inline-block;
            position: relative;
            left:-17px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<!-- CABECERA -->
<header>
    <!-- HEADER - cabecera superior de la web -->
    <section>
        <nav class="mb-1 navbar navbar-expand-lg navbar-dark secondary-color lighten-1">
            <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
                <div class="col-lg-4">
            <a class="navbar-brand" href="index.php">
                <img src="images/icons/logo_completo.png"  height="30" alt="logo_completo">
            </a>
                </div>
                <div class="col-lg-4">
                <form class="form-inline ml-auto">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-secondary btn-md my-8 my-sm-0 ml-3" type="submit">Search</button>
                </form>
                </div>
                <div class="col-lg-4 ">
                     <ul class="navbar-nav ml-auto nav-flex-icons">
                        <li class="nav-item">
                            <!-- Icono CARRO -->
                            <a>
                                <img src="images/icons/icon_cart.png" class="rounded z-depth-0" alt="avatar image" height="30">
                            </a>
                            </li>
                         <li class="nav-item">
                        <?php
                            echo '
                            <a class="nav-link waves-effect waves-light">Uds: '.$_SESSION["udsTotal"].'  Euros: '.$_SESSION["eurosTotal"].'</a>                    
                            ';?>
                    </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="index.php?cartDetail=cartDetail" class="txtDetails">Detalles</a>
                </li>
            </ul>
                </div>
            </div>
        </nav>
</section>
</header>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>



