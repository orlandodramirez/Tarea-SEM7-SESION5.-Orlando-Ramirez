<?php
include './library/configServer.php';
include './library/consulSQL.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Productos</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-product">
    <?php include './inc/navbar.php'; ?>
    <section id="infoproduct">
        <div class="container">
            <div class="row">
                <div class="page-header">
                    <h1>Tienda <small class="tittles-pages-logo">LP3 Electronics</small></h1>
                </div>
                <?php 
                // Sanitizar entrada para evitar SQL Injection
                $CodigoProducto = mysqli_real_escape_string(ejecutarSQL::conectar(), $_GET['CodigoProd']);

                // Verificar si $CodigoProducto está definido
                if (!empty($CodigoProducto)) {
                    $productoinfo = ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='$CodigoProducto'");

                    // Mostrar la información del producto
                    while ($fila = mysqli_fetch_array($productoinfo)) {
                        echo '
                            <div class="col-xs-12 col-sm-6">
                                <h3 class="text-center">Información de producto</h3>
                                <br><br>
                                <h4><strong>Nombre: </strong>' . htmlspecialchars($fila['NombreProd'], ENT_QUOTES, 'UTF-8') . '</h4><br>
                                <h4><strong>Modelo: </strong>' . htmlspecialchars($fila['Modelo'], ENT_QUOTES, 'UTF-8') . '</h4><br>
                                <h4><strong>Marca: </strong>' . htmlspecialchars($fila['Marca'], ENT_QUOTES, 'UTF-8') . '</h4><br>
                                <h4><strong>Precio: </strong>₲ ' . number_format($fila['Precio'], 0, ',', '.') . '</h4>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <br><br><br>
                                <img class="img-responsive" src="assets/img-products/' . htmlspecialchars($fila['Imagen'], ENT_QUOTES, 'UTF-8') . '">
                            </div>
                            <br><br><br>
                            <div class="col-xs-12 text-center">
                                <a href="product.php" class="btn btn-lg btn-primary"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Regresar a la tienda</a>
                                &nbsp;&nbsp;&nbsp;
                                <button value="' . htmlspecialchars($fila['CodigoProd'], ENT_QUOTES, 'UTF-8') . '" class="btn btn-lg btn-success botonCarrito">
                                    <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp; Añadir al carrito
                                </button>
                            </div>
                        ';
                    }
                } else {
                    echo '<div class="alert alert-danger text-center">Producto no encontrado o código inválido.</div>';
                }
                ?>
            </div>
        </div>
    </section>
    <?php include './inc/footer.php'; ?>
</body>
</html>
