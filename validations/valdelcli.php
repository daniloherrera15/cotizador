<?php
session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
//POST TERCERO GENERAL
$identificacion=$_GET['id'];
$crud->update("update c_cliente set estado='I' where nit_cedula='$identificacion'","Tercero Actualizado con Exito.",$con->getConnection());
$con->desconectar();
?>
