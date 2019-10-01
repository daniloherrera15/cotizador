<?php
session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
//$id=$_GET['uid'];
$num= $_GET['idcot'];
$acc=$_GET['acc'];
$num=intval($num);
$fecha=date('Y-m-d');
$usuario=$_SESSION['documento'];
$usuario=str_replace(".", "", $usuario);
$usuario=str_replace(",00", "", $usuario);
$usuario=str_replace("€", "", $usuario);
$usuario=trim($usuario);
$usuario=intval($usuario);
$crud= new Crud();
if($acc==1){
$crud->update("Update cotizacion_maestro set estado=9, fecha_cambio_estado=$fecha, usuario_cambio_estado=$usuario where id=$num","Cotización Aprobada Correctamente",$con->getConnection());
}
if($acc==2){
$crud->update("Update cotizacion_maestro set estado=10, fecha_cambio_estado=$fecha, usuario_cambio_estado=$usuario where id=$num","Cotización Rechazada Correctamente",$con->getConnection());
}
?>
