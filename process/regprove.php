<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(5);

$RUCProve= $_POST['prove-RUC'];
$nameProve= $_POST['prove-name'];
$dirProve= $_POST['prove-dir'];
$telProve= $_POST['prove-tel'];
$webProve= $_POST['prove-web'];

if(!$RUCProve=="" && !$nameProve=="" && !$dirProve=="" && !$telProve=="" && !$webProve==""){
    $verificar=  ejecutarSQL::consultar("select * from proveedor where RUCProveedor='".$RUCProve."'");
    $verificaltotal = mysqli_num_rows($verificar);
    if($verificaltotal<=0){
        if(consultasSQL::InsertSQL("proveedor", "RUCProveedor, NombreProveedor, Direccion, Telefono, PaginaWeb", "'$RUCProve','$nameProve','$dirProve','$telProve','$webProve'")){
            echo '<img src="assets/img/ok.png" class="center-all-contens"><br><p class="lead text-center">Proveedor añadido éxitosamente</p>';
        }else{
            echo '<img src="assets/img/error.png" class="center-all-contens"><br><p class="lead text-center">Ha ocurrido un error.<br>Por favor intente nuevamente</p>'; 
        }
    }else{
        echo '<img src="assets/img/error.png" class="center-all-contens"><br><p class="lead text-center">El número de RUC que ha ingresado ya existe.<br>Por favor ingrese otro número de RUC</p>';
    }
}else {
    echo '<img src="assets/img/error.png" class="center-all-contens"><br><p class="lead text-center">Error los campos no deben de estar vacíos</p>';
}
?>
