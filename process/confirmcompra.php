<?php
session_start();

include '../library/configServer.php';
include '../library/consulSQL.php';

$num = $_POST['clien-number'];

if ($num == 'notlog') {
    $nameClien = $_POST['clien-name'];
    $passClien = md5($_POST['clien-pass']); 
} elseif ($num == 'log') {
    $nameClien = $_POST['clien-name'];
    $passClien = $_POST['clien-pass']; 
}

sleep(3);

$verdata = ejecutarSQL::consultar("SELECT * FROM cliente WHERE Clave='$passClien' AND Nombre='$nameClien'");
$num = mysqli_num_rows($verdata);

if ($num > 0) {
    if ($_SESSION['sumaTotal'] > 0) {
        $data = mysqli_fetch_array($verdata);
        $RUCC = $data['RUC'];
        $StatusV = "Pendiente";
        
        // Insertar datos en la tabla venta
        consultasSQL::InsertSQL("venta", "Fecha, RUC, Descuento, TotalPagar, Estado", 
            "'" . date('d-m-Y') . "', '$RUCC', '0', '" . $_SESSION['sumaTotal'] . "', '$StatusV'");

        // Recuperar el número del pedido actual
        $verId = ejecutarSQL::consultar("SELECT * FROM venta WHERE RUC='$RUCC' ORDER BY NumPedido DESC LIMIT 1");
        while ($fila = mysqli_fetch_array($verId)) {
            $Numpedido = $fila['NumPedido'];
        }

        // Insertar datos en detalle de la venta
        for ($i = 0; $i < $_SESSION['contador']; $i++) {
            consultasSQL::InsertSQL("detalle", "NumPedido, CodigoProd, CantidadProductos", 
                "'$Numpedido', '" . $_SESSION['producto'][$i] . "', '1'");
            
            // Actualizar el stock del producto
            $prodStock = ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='" . $_SESSION['producto'][$i] . "'");
            while ($fila = mysqli_fetch_array($prodStock)) {
                $existencias = $fila['Stock'];
                consultasSQL::UpdateSQL("producto", "Stock=('$existencias' - 1)", 
                    "CodigoProd='" . $_SESSION['producto'][$i] . "'");
            }
        }

        // Vaciar el carrito
        unset($_SESSION['producto']);
        unset($_SESSION['contador']);
        
        echo '<img src="assets/img/ok.png" class="center-all-contens"><br>El pedido se ha realizado con éxito';
    } else {
        echo '<img src="assets/img/error.png" class="center-all-contens"><br>No has seleccionado ningún producto, revisa el carrito de compras';
    }
} else {
    echo '<img src="assets/img/error.png" class="center-all-contens"><br>El nombre o contraseña son inválidos';
}
