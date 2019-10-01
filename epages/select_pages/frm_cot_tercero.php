<?php
session_start();
include('../../includes/config.php');
include('../../classes/conectar.php');
include('../../classes/crud.php');
?>
<table id="clie_table_cot" name="clie_table_cot" class="display">
    <thead>        
    <tr>            
      <th>Identificación</th>
      <th>Nombre - Apellidos</th>
      <th>Razón Social</th>
      <th>Telefono</th>
      <th>Ciudad</th>
    </tr>
  </thead> 
  <tbody>
<?php
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
$crud->setconsulta("SELECT id,
       apellidos, 
       nombres, 
       razon_social, 
       nit_cedula, 
       direccion, 
       telefono, 
       celular, 
       ciudad, 
       email
  FROM c_cliente ");
$datos_usuario =  $crud->seleccionar($con->getConnection());
$con->desconectar();
$i=0;
while($i<sizeof($datos_usuario))
{
  if($datos_usuario[$i]['id']>0){
  ?>
     
    <tr>      
      <td><a onclick="javascript:colocar_tercero('<?php echo $datos_usuario[$i]['nombres'].' '.$datos_usuario[$i]['apellidos'] ?>','<?php echo $datos_usuario[$i]['nit_cedula'] ?>','<?php echo $datos_usuario[$i]['ciudad'] ?>','<?php echo $datos_usuario[$i]['direccion'] ?>','<?php echo $datos_usuario[$i]['telefono'].' - '.$datos_usuario[$i]['celular'] ?>')">
        <?php 
      echo $datos_usuario[$i]['nit_cedula'];
      ?></td>   
      <td><a onclick="javascript:colocar_tercero('<?php echo $datos_usuario[$i]['nombres'].' '.$datos_usuario[$i]['apellidos'] ?>','<?php echo $datos_usuario[$i]['nit_cedula'] ?>','<?php echo $datos_usuario[$i]['ciudad'] ?>','<?php echo $datos_usuario[$i]['direccion'] ?>','<?php echo $datos_usuario[$i]['telefono'].' - '.$datos_usuario[$i]['celular'] ?>')">
      <?php 
      echo $datos_usuario[$i]['nombres'].' '.$datos_usuario[$i]['apellidos'];
      ?></td>
      <td><a onclick="javascript:colocar_tercero('<?php echo $datos_usuario[$i]['nombres'].' '.$datos_usuario[$i]['apellidos'] ?>','<?php echo $datos_usuario[$i]['nit_cedula'] ?>','<?php echo $datos_usuario[$i]['ciudad'] ?>','<?php echo $datos_usuario[$i]['direccion'] ?>','<?php echo $datos_usuario[$i]['telefono'].' - '.$datos_usuario[$i]['celular'] ?>')">
      <?php 
      echo $datos_usuario[$i]['razon_social'];
      ?></td> 
      <td><a onclick="javascript:colocar_tercero('<?php echo $datos_usuario[$i]['nombres'].' '.$datos_usuario[$i]['apellidos'] ?>','<?php echo $datos_usuario[$i]['nit_cedula'] ?>','<?php echo $datos_usuario[$i]['ciudad'] ?>','<?php echo $datos_usuario[$i]['direccion'] ?>','<?php echo $datos_usuario[$i]['telefono'].' - '.$datos_usuario[$i]['celular'] ?>')">
      <?php 
      echo $datos_usuario[$i]['telefono'];
      ?></td>
      <td><a onclick="javascript:colocar_tercero('<?php echo $datos_usuario[$i]['nombres'].' '.$datos_usuario[$i]['apellidos'] ?>','<?php echo $datos_usuario[$i]['nit_cedula'] ?>','<?php echo $datos_usuario[$i]['ciudad'] ?>','<?php echo $datos_usuario[$i]['direccion'] ?>','<?php echo $datos_usuario[$i]['telefono'].' - '.$datos_usuario[$i]['celular'] ?>')">
      <?php
      echo $datos_usuario[$i]['ciudad'];
      ?></td> 
    </tr>      

  <?php
}
  $i++;
}
?>
  </tbody>
  </table>
    </section>
