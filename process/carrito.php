<?php
error_reporting(E_PARSE);
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();

$suma = 0;

// Verificar si se recibe un precio mediante GET
if (isset($_GET['precio'])) {
    $_SESSION['producto'][$_SESSION['contador']] = $_GET['precio'];
    $_SESSION['contador']++;
}

// Generar tabla para mostrar los productos en el carrito
echo '<table class="table table-bordered">';

for ($i = 0; $i < $_SESSION['contador']; $i++) {
    $consulta = ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='" . $_SESSION['producto'][$i] . "'");

    while ($fila = mysqli_fetch_array($consulta)) {
        echo "<tr><td>" . $fila['NombreProd'] . "</td><td>₲ " . number_format($fila['Precio'], 0, ',', '.') . "</td></tr>";
        $suma += $fila['Precio'];
    }
}
// Mostrar el subtotal
echo "<tr><td>Subtotal</td><td>₲ " . number_format($suma, 0, ',', '.') . "</td></tr>";
echo "</table>";

// Guardar el subtotal en la sesión
$_SESSION['sumaTotal'] = $suma;
?>
