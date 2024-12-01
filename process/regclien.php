<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(3);
$RUCCliente= $_POST['clien-RUC'];
$nameCliente= $_POST['clien-name'];
$fullnameCliente= $_POST['clien-fullname'];
$apeCliente= $_POST['clien-lastname'];
$passCliente= md5($_POST['clien-pass']);
$dirCliente= $_POST['clien-dir'];
$phoneCliente= $_POST['clien-phone'];
$emailCliente= $_POST['clien-email'];

if(!$RUCCliente=="" && !$nameCliente=="" && !$apeCliente=="" && !$dirCliente=="" && !$phoneCliente=="" && !$emailCliente=="" && !$fullnameCliente==""){
    
    $verificar=  ejecutarSQL::consultar("select * from cliente where RUC='".$RUCCliente."'");
    
    $verificaltotal = mysqli_num_rows($verificar);
    if($verificaltotal<=0){
        if(consultasSQL::InsertSQL("cliente", "RUC, Nombre, NombreCompleto, Apellido, Direccion, Clave, Telefono, Email", 
        "'$RUCCliente','$nameCliente','$fullnameCliente','$apeCliente','$dirCliente', '$passCliente','$phoneCliente','$emailCliente'")){
            echo '<img src="../assets/img/ok.png" class="center-all-contens"><br>El registro se completó con éxito';
        }else{
            echo '<img src="assets/img/error.png" class="center-all-contens"><br>Ha ocurrido un error.<br>Por favor intente nuevamente'; 
        }
    }else{
        echo '<img src="assets/img/error.png" class="center-all-contens"><br>El RUC que ha ingresado ya está registrado.<br>Por favor ingrese otro número de RUC';
    }
} else {
    echo '<img src="assets/img/error.png" class="center-all-contens"><br>Error, los campos no deben de estar vacíos';
}
?>
