<?php
include('config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
session_start();
require_once("../dompdf2/dompdf_config.inc.php");
$i=0;
$cot=$_GET['var'];
$cot=str_replace('"',"",$cot);
$crud = new Crud();
$crud->setconsulta("select cotizacion_maestro.id
,id_tercero
,id_vendedor
,concepto_detalle
,fecha_cotizacion
,cotizacion_maestro.estado 
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
,marca_articulo.nombre as marart
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
left join marca_articulo
on articulo.marca_articulo = marca_articulo.id
where cotizacion_maestro.id=$cot");
$datos_usuario =  $crud->seleccionar($con->getConnection());
$NIT=$datos_usuario[0]['id_tercero'];
$Nombre=$datos_usuario[0]['tercnom'].' - '.$datos_usuario[0]['tercape'].' - '.$cot;
$Ciudad=$datos_usuario[0]['tercciu'];
$Direccion=$datos_usuario[0]['tercdir'];
$Contacto=$datos_usuario[0]['tercema'];
$Telefono=$datos_usuario[0]['terctel'].' - '.$datos_usuario[0]['terccel'];;
$total=0;
$codigo="<html>
<head>
<style>
body {
    --background-color: lightblue;
    font-family: Arial, Helvetica, sans-serif;
}
img{
  width:250px;
}
.contenedor {
   border: 1px;
   display: inline-block;
   width: auto;
   margin: auto;
   text-align: left;
}
#imagen{
  padding-left: 5px;
    padding-top: 5px;
    margin-left: 15px;
    float: left;
    position: relative;
    width: auto;
    height: auto;
}
#encabezado{
  padding-top: 5px;
    padding-left: 5px;
    margin-left: 10px;
    position: relative;
    float: left;
    width: auto;
    height: auto;
}
.tdunica{

color:#000;
font-weight: bold;
padding:3px;
}

table,th,td {
    border-collapse: collapse;
    font-family: Arial, Helvetica, sans-serif;
    font-size:10pt;
    padding: 3px;
}
th {
  background-color: #125b9b;
    color: white;
}
.t1{
min-width:350px;
}
span{
font-size:10pt;
text-align: right;
}
#detalle{
  border: 1px solid #000;
}
#detalle td{
  border: 1px solid #000;
}
#encabezado th{
  background-color:#ffffff;
    color:#000;
    text-align:center;
    }
</style>
</head>
<body>
<div class='contenedor'>
<div id='imagen'>
<img src='../dist/img/enc2.png'>
<!--<span>Visite: www.cvsc.com.co</span>-->
</div>
<div id='encabezado'>
 <table>
 <tr><th colspan=2>Cliente</th><th>Cotización</th></tr>
 <tr>
 <td style='width:15%' class='tdunica' >Nombre:</td><td>ACOSTA & ACOSTA CONSTRUCCIONES S.A.S</td><td rowspan=3>BQ-05122</td>
 </tr>
  <tr>
 <td class='tdunica'>NIT/CC:</td><td class='t1'>900237116</td>
 </tr>
 <tr>
 <td class='tdunica'>Dirección:</td><td>CR 12 35 84</td>
 </tr>
 <tr>
 <td class='tdunica'>Contacto:</td><td colspan=2>Fulano de Tal</td>
 </tr> 
 <tr>
 <td class='tdunica'>Teléfono:</td><td colspan=2>6357426-3118092963</td>
 </tr> 
 <tr>
 <td class='tdunica'>Ciudad:</td><td colspan=2>TAURAMENA</td>
 </tr>
 </table>
 </div>
 </div>
 <table style='width:100%;border: 0px' id='detalle' >
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
  </tr>";
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
    $total=$total+$subtotal;
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
    </tr>
     ";   
  $i++;
}
$subtotal=$total;
$iva=$total*0.19;
$total=$total+$iva;
$codigo.="
<tr>      
      <td colspan=6>Observaciones - Recomendaciones</td> 
      <td colspan=2>Subtotal</td> 
      <td>$subtotal</td> 
    </tr>
    <tr>      
      <td rowspan=3 colspan=6>Ninguna Apreciable.</td> 
      <td>IVA</td> 
      <td>19%</td> 
      <td>$iva</td> 
    </tr>
    <tr>   
      <td>Flete</td> 
      <td>-</td>
      <td>-</td> 
    </tr>
    <tr>      
      <td colspan=2>TOTAL</td> 
      <td>$total</td> 
    </tr>
</table>
</body>
</html>";
$codigo=utf8_decode($codigo);
$dompdf=new dompdf();
if(get_magic_quotes_runtime())
{
    // Desactivar
    set_magic_quotes_runtime(false);
}
$dompdf->load_html($codigo);
ini_set("memory_limit","32M");
$dompdf->render();
$dompdf->stream("BQ-COT-$cot.pdf");	

?>