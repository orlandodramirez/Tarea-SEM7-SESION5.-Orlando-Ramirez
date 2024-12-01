<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

// Simular retraso para UX
sleep(2);

// Capturar datos del formulario
$nombre = $_POST['nombre-login'];
$clave = md5($_POST['clave-login']);
$radio = $_POST['optionsRadios'];

if (!empty($nombre) && !empty($clave)) {
    // Consultar en las bases de datos correspondientes
    $verUser = ejecutarSQL::consultar("SELECT * FROM cliente WHERE Nombre='$nombre' AND Clave='$clave'");
    $verAdmin = ejecutarSQL::consultar("SELECT * FROM administrador WHERE Nombre='$nombre' AND Clave='$clave'");

    if ($radio == "option2") { // Opción de Administrador
        $AdminC = mysqli_num_rows($verAdmin);
        if ($AdminC > 0) {
            // Iniciar sesión de administrador
            $_SESSION['nombreAdmin'] = $nombre;
            $_SESSION['claveAdmin'] = $clave;
            echo '<script>location.href="index.php";</script>';
        } else {
            echo '<img src="assets/img/error.png" class="center-all-contens"><br>Error: Nombre o contraseña inválidos para administrador.';
        }
    } elseif ($radio == "option1") { // Opción de Usuario
        $UserC = mysqli_num_rows($verUser);
        if ($UserC > 0) {
            // Iniciar sesión de usuario
            $_SESSION['nombreUser'] = $nombre;
            $_SESSION['claveUser'] = $clave;
            echo '<script>location.href="index.php";</script>';
        } else {
            echo '<img src="assets/img/error.png" class="center-all-contens"><br>Error: Nombre o contraseña inválidos para usuario.';
        }
    }
} else {
    echo '<img src="assets/img/error.png" class="center-all-contens"><br>Error: Campos vacíos. Intente nuevamente.';
}
?>
