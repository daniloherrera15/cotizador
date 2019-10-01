<?php
session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
$umed=$_POST['umed'];
$desc=$_POST['desc'];
//Condicion para validar que contraseña y confirmar contraseña del formulario sean iguales
$array[0] = "'$umed','$desc'";
$campos="nombre, descripcion";
$tabla="unidad_medida";
$crud->insertar($array,$campos,$tabla,$con->getConnection(),'Unidad de Medida Ingresado Exitosamente.');
$con->desconectar();
?>