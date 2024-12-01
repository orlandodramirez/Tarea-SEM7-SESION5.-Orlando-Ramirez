<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio</title>
    <?php include './inc/link.php'; ?>
</head>

<body id="container-page-index">
    <!-- Navbar -->
    <?php include './inc/navbar.php'; ?>

    <!-- Jumbotron -->
    <div class="jumbotron" id="jumbotron-index">
        <h1>
            <span class="tittles-pages-logo">LP3 Electronics</span>
            <small style="color: #fff;">UTIC CZU</small>
        </h1>
        <p>
            Bienvenido a nuestra tienda en línea, aquí encontrará una gran variedad de artículos para el hogar.
        </p>
    </div>

    <!-- Novedades -->
    <section id="new-prod-index">
        <div class="container">
            <div class="page-header">
                <h1>Novedades <small>productos</small></h1>
            </div>
            <div class="row">
                <?php
                include 'library/configServer.php';
                include 'library/consulSQL.php';

                $consulta = ejecutarSQL::consultar("SELECT * FROM producto WHERE Stock > 0 LIMIT 8");
                $totalproductos = mysqli_num_rows($consulta);

                if ($totalproductos > 0) {
                    $nums = 1;

                    while ($fila = mysqli_fetch_array($consulta)) {
                        echo '
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="thumbnail">
                                <a href="infoProd.php?CodigoProd=' . $fila['CodigoProd'] . '">
                                    <img src="assets/img-products/' . $fila['Imagen'] . '">
                                </a>
                                <div class="caption">
                                    <h3>' . $fila['Marca'] . '</h3>
                                    <p>' . $fila['NombreProd'] . '</p>
                                    <p>₲ ' . number_format($fila['Precio'], 0, ',', '.') . '</p>
                                    <p class="text-center">
                                        <a href="infoProd.php?CodigoProd=' . $fila['CodigoProd'] . '" class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i>&nbsp; Detalles
                                        </a>&nbsp;&nbsp;
                                        <button value="' . $fila['CodigoProd'] . '" class="btn btn-success btn-sm botonCarrito">
                                            <i class="fa fa-shopping-cart"></i>&nbsp; Añadir
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>';

                        if ($nums % 4 == 0) {
                            echo '<div class="clearfix"></div>';
                        }
                        $nums++;
                    }
                } else {
                    echo '<h2>No hay productos registrados en la tienda</h2>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Información de registro -->
    <section id="reg-info-index">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 text-center">
                    <article style="margin-top:20%;">
                        <p><i class="fa fa-users fa-4x"></i></p>
                        <h3>Registrate</h3>
                        <p>
                            Regístrese y hágase cliente de 
                            <span class="tittles-pages-logo">LP3 Electronics</span> 
                            para recibir las mejores ofertas y descuentos especiales de nuestros productos.
                        </p>
                        <p>
                            <a href="registration.php" class="btn btn-info btn-block">Registrarse</a>
                        </p>
                    </article>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <img src="assets/img/Smart-TV-RegInfo.png" alt="Smart-TV" class="img-responsive">
                </div>
            </div>
        </div>
    </section>

    <!-- Distribuidores -->
    <section id="distribuidores-index">
        <div class="container">
            <div class="col-xs-12 col-sm-6"></div>
            <div class="col-xs-12 col-sm-6"></div>
            <div class="col-xs-12">
                <div class="page-header">
                    <h1>Nuestras <small style="color: #333;">Marcas</small></h1>
                </div>
                <br><br>
                <img src="assets/img/logos-marcas.png" alt="logos-marcas" class="img-responsive">
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include './inc/footer.php'; ?>
</body>

</html>
