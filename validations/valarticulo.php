<?php
session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
$nom=$_POST['nom'];
$ref=$_POST['ref'];
$des=$_POST['des'];
$und=$_POST['und'];
$mar=$_POST['mar'];
$cat=$_POST['cat'];
$pre=$_POST['pre'];
//Condicion para validar que contraseña y confirmar contraseña del formulario sean iguales
$array[0] = "'$nom','$ref','$des','$und','$mar','$cat','$pre'";
$campos="nombre_articulo, descripcion,ref_articulo,tipo_unidad,marca_articulo,categoria,precio_articulo";
$tabla="articulo";
$crud->insertar($array,$campos,$tabla,$con->getConnection(),'Articulo Ingresado Exitosamente.');
$con->desconectar();
?>

