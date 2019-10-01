<?php
session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
$nom=$_POST['nom'];
$ape=$_POST['ape'];
$ide=$_POST['ide'];
$rso=$_POST['rso'];
$tel=$_POST['tel'];
$cel=$_POST['cel'];
$ema=$_POST['ema'];
$ciu=$_POST['ciu'];
$dir=$_POST['dir'];
//Condicion para validar que contraseña y confirmar contraseña del formulario sean iguales
$array[0] = "'$ape','$nom','$rso','$ide','$dir','$tel','$cel','$ciu','$ema','A'";
$campos="apellidos,nombres,razon_social,nit_cedula,direccion,telefono,celular,ciudad,email,estado";
$tabla="c_cliente";
$crud->insertar($array,$campos,$tabla,$con->getConnection(),'Cliente Ingresado Exitosamente.');
$con->desconectar();
?>
