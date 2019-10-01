<?php
session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
$tipo=$_POST['tip'];
$desc=$_POST['desc'];
$array[0] = "'$tipo','$desc'";
$campos="nombre, descripcion";
$tabla="tipo";
$crud->insertar($array,$campos,$tabla,$con->getConnection(),'Tipo Ingresado Exitosamente.');
$con->desconectar();
?>