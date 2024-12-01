<!DOCTYPE html>
<html lang="es">
<head>
    <title>Pedido</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-index">
    <?php include './inc/navbar.php'; ?>
    <section id="container-pedido">
        <div class="container">
            <div class="page-header">
                <h1>Confirmar pedido</h1>
            </div>
            <br><br><br>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <img class="img-responsive center-all-contens" src="assets/img/fontindex.jpg" style="opacity: .4">
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div id="form-compra">
                        <form action="process/confirmcompra.php" method="post" role="form" class="FormLP3" data-form="save">
                            <?php
                            if (!empty($_SESSION['nombreUser']) && !empty($_SESSION['claveUser'])) {
                                // Usuario logueado
                                echo '
                                    <h2 class="text-center">¿Confirmar pedido?</h2>
                                    <p class="text-center">Para confirmar tu pedido, presiona el botón "Confirmar".</p>
                                    <br>
                                    <img class="img-responsive center-all-contens" src="assets/img/shopping-cart.png">
                                    <input type="hidden" name="clien-name" value="' . htmlspecialchars($_SESSION['nombreUser'], ENT_QUOTES, 'UTF-8') . '">
                                    <input type="hidden" name="clien-pass" value="' . htmlspecialchars($_SESSION['claveUser'], ENT_QUOTES, 'UTF-8') . '">
                                    <input type="hidden" name="clien-number" value="log">
                                    <br>
                                    <p class="text-center"><button class="btn btn-success" type="submit">Confirmar</button></p>
                                ';
                            } else {
                                // Usuario no logueado
                                echo '
                                    <h3 class="text-center">¿Confirmar el pedido?</h3>
                                    <p>
                                        Para confirmar tu compra, debes iniciar sesión o introducir tu nombre de usuario
                                        y contraseña registrados en <span class="tittles-pages-logo">LP3 Electronics</span>.
                                    </p>
                                    <br>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input class="form-control all-elements-tooltip" 
                                                type="text" 
                                                placeholder="Ingrese su nombre" 
                                                required 
                                                name="clien-name" 
                                                data-toggle="tooltip" 
                                                data-placement="top" 
                                                title="Ingrese su nombre" 
                                                pattern="[a-zA-Z]{1,9}" 
                                                maxlength="9">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                            <input class="form-control all-elements-tooltip" 
                                                type="password" 
                                                placeholder="Introduzca su contraseña" 
                                                required 
                                                name="clien-pass" 
                                                data-toggle="tooltip" 
                                                data-placement="top" 
                                                title="Introduzca su contraseña">
                                        </div>
                                    </div>
                                    <input type="hidden" name="clien-number" value="notlog">
                                    <br>
                                    <p class="text-center"><button class="btn btn-success" type="submit">Confirmar</button></p>
                                ';
                            }
                            ?>
                            <div class="ResForm" style="width: 100%; text-align: center; margin: 0;"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include './inc/footer.php'; ?>
</body>
</html>
