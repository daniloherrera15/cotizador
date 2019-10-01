<?php
session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
$cate=$_POST['cate'];
$desc=$_POST['desc'];
//Condicion para validar que contraseña y confirmar contraseña del formulario sean iguales
$array[0] = "'$cate','$desc'";
$campos="nombre, descripcion";
$tabla="categoria_articulo";
$crud->insertar($array,$campos,$tabla,$con->getConnection(),'Categoria Ingresada Exitosamente.');
$con->desconectar();
?>