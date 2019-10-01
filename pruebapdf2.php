<?php
include ("includes/conf_postgre.php");
include ("classes/crud_postgre.php");
include ("classes/con_postgre.php");
$con = new Connection($server,$port,$dbname,$user,$password);
$con->conectar();
session_start();
require_once("dompdf/dompdf_config.inc.php");
$i=0;
$crud = new Crud();
$crud->setconsulta("select cotizacion_maestro.id
,id_tercero
,id_vendedor
,concepto_detalle
,fecha_cotizacion
,estado 
,id_producto
,cantidad
,valor
,c_cliente.apellidos as tercape
,c_cliente.nombres as tercnom
,c_cliente.direccion as tercdir
,c_cliente.telefono as terctel
,c_cliente.celular as terccel
,c_cliente.email as tercema
,c_cliente.ciudad as tercciu
,articulo.ref_articulo as refart
,articulo.nombre_articulo as nomart
,articulo.precio_articulo as preart
,articulo.marca_articulo as marart
,articulo.descripcion as descart
,unidad_medida.nombre as uniart
from 
cotizacion_maestro
left join cotizacion_detalle
on cotizacion_maestro.id = cotizacion_detalle.id_maestra
left join c_cliente
on c_cliente.nit_cedula = cotizacion_maestro.id_tercero
left join articulo
on articulo.id = id_producto
left join unidad_medida
on unidad_medida.id = articulo.tipo_unidad
where cotizacion_maestro.id=8");
$datos_usuario =  $crud->seleccionar($con->getConnection());
$NIT=$datos_usuario[0]['id_tercero'];
$Nombre=$datos_usuario[0]['tercnom'].' - '.$datos_usuario[0]['tercape'];
$Ciudad=$datos_usuario[0]['tercciu'];
$Direccion=$datos_usuario[0]['tercdir'];
$Contacto=$datos_usuario[0]['tercema'];
$Telefono=$datos_usuario[0]['terctel'].' - '.$datos_usuario[0]['terccel'];;
$codigo="<style>
.tdunica{
background-color:#125b9b;
color:white;
border: 1px solid black;
}

table,th,td {
    border: 1px solid black;
    font:  100% monospace;
    border-collapse: collapse;
}
th {
  background-color: #125b9b;
    color: white;
}
</style>
 <img src='./dist/img/enc2.png'>
 <table style='width:100%'>
 <tr>
 <td style='width:15%' class='tdunica' >NOMBRE</td><td>$Nombre</td>
 </tr>
  <tr>
 <td class='tdunica'>NIT/CC</td><td>$NIT</td>
 </tr>
 <tr>
 <td class='tdunica'>DIRECCIÓN</td><td>$Direccion</td>
 </tr>
 <tr>
 <td class='tdunica'>CONTACTO</td><td>$Contacto</td>
 </tr> 
 <tr>
 <td class='tdunica'>TELEFONO</td><td>$Telefono</td>
 </tr> 
 <tr>
 <td class='tdunica'>CIUDAD</td><td>$Ciudad</td>
 </tr>
 </table>
 <table style='width:100%'>
  <tr>
    <th>Item</th>
    <th>Producto</th>
    <th>Marca</th>
    <th>Ref</th>
    <th>Descripcion</th>
    <th>Valor</th>
    <th>Unidad</th>
    <th>Cantidad</th>
    <th>Subtotal</th>
  </tr>
  ";
  while($i<sizeof($datos_usuario)){
    $a=$i+1;
    $nomart=$datos_usuario[$i]['nomart'];
    $marart=$datos_usuario[$i]['marart'];
    $refart=$datos_usuario[$i]['refart'];
    $descart=$datos_usuario[$i]['descart'];
    $cantidad=$datos_usuario[$i]['cantidad'];
    $uniart=$datos_usuario[$i]['uniart'];
    $valor=intval($datos_usuario[$i]['valor']);
    $subtotal=$valor*intval($cantidad);

 $codigo.="   
    <tr>      
      <td>$a</td>   
      <td>$nomart</td> 
      <td>$marart</td> 
      <td>$refart</td> 
      <td>$descart</td> 
      <td>$valor</td> 
      <td>$uniart</td>
      <td>$cantidad</td>  
      <td>$subtotal</td> 
    </tr>";   
  $i++;
}
$codigo.="</table>";
//   <tr >
//   	<td>1</td>
//     <td >Jill</td>
//     <td>Smith</td>
//     <td>50</td>
//     <td></td>
//     <td></td>
//     <td></td>
//     <td></td>
//     <td></td>
//   </tr>
//   <tr>
//   	<td>2</td>
//     <td>Eve</td>
//     <td>Jackson</td>
//     <td>94</td>
//     <td></td>
//     <td></td>
//     <td></td>
//     <td></td>
//     <td></td>  
//   </tr>
// </table>";
$codigo=utf8_decode($codigo);
$dompdf=new dompdf();
$dompdf->load_html($codigo);
ini_set("memory_limit","32M");
$dompdf->render();
$dompdf->stream("ejemplo.pdf");	

?>