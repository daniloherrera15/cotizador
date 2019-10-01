<?php
session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
//POST TERCERO GENERAL
$identificacion=$_POST['ide'];
$nombres=$_POST['nom'];
$apellidos=$_POST['ape'];
$razonsocial=$_POST['rso'];
$telefono=$_POST['tel'];
$celular=$_POST['cel'];
$ciudad=$_POST['ciu'];
$direccion=$_POST['dir'];
$email=$_POST['ema'];
$crud->update("update c_cliente set apellidos='$apellidos',nombres='$nombres',razon_social='$razonsocial',
direccion='$direccion',telefono='$telefono',celular='$celular',ciudad='$ciudad',
email='$email',prospecto='false' where nit_cedula='$identificacion'","Tercero Actualizado con Exito.",$con->getConnection());
$con->desconectar();
?>
