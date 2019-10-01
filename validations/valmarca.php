<?php
session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
$marca=$_POST['marca'];
$desc=$_POST['desc'];
//Condicion para validar que contraseña y confirmar contraseña del formulario sean iguales
$array[0] = "'$marca','$desc'";
$campos="nombre, descripcion";
$tabla="marca_articulo";
$crud->insertar($array,$campos,$tabla,$con->getConnection(),'Marca Ingresada Exitosamente.');
$con->desconectar();
?>