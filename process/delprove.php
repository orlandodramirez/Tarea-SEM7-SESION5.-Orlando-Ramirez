<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(5);
$RUCProve= $_POST['RUC-prove'];
$cons=  ejecutarSQL::consultar("select * from proveedor where RUCProveedor='$RUCProve'");
$totalprove = mysqli_num_rows($cons);

if($totalprove>0){
    if(consultasSQL::DeleteSQL('proveedor', "RUCProveedor='".$RUCProve."'")){
        echo '<img src="assets/img/ok.png" class="center-all-contens"><br><p class="lead text-center">Proveedor eliminado éxitosamente</p>';
    }else{
        echo '<img src="assets/img/error.png" class="center-all-contens"><br><p class="lead text-center">Ha ocurrido un error.<br>Por favor intente nuevamente</p>'; 
    }
}else{
    echo '<img src="assets/img/error.png" class="center-all-contens"><br><p class="lead text-center">El código de proveedor no existe</p>';
}
?>
