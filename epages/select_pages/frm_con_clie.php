<?php
session_start();
include('../../includes/config.php');
include('../../classes/conectar.php');
include('../../classes/crud.php');
?>
<table id="clie_table" name="clie_table" class="display">
    <thead>        
    <tr>            
      <th>Identificación</th>
      <th>Nombre - Apellidos</th>
      <th>Razón Social</th>
      <th>Telefono</th>
      <th>Celular</th>
      <th>Email</th>
      <th>Ciudad</th>
      <th>Dirección</th>
      <th>Prospecto</th>
      <th align="center">Editar</th>
      <th align="center">Eliminar</th>
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
       email,
       prospecto
  FROM c_cliente where estado='A'");
$datos_usuario =  $crud->seleccionar($con->getConnection());
$con->desconectar();
$i=0;
while($i<sizeof($datos_usuario))
{
   if($datos_usuario[$i]['id']>0){
  ?>
     
    <tr>      
      <td><?php 
      echo $datos_usuario[$i]['nit_cedula'];
      ?></td>   
      <td><?php 
      echo $datos_usuario[$i]['nombres'].' '.$datos_usuario[$i]['apellidos'];
      ?></td>
      <td><?php 
      echo $datos_usuario[$i]['razon_social'];
      ?></td> 
      <td><?php 
      echo $datos_usuario[$i]['telefono'];
      ?></td>  
      <td><?php 
      echo $datos_usuario[$i]['celular'];
      ?></td> 
      <td><?php 
      echo $datos_usuario[$i]['email'];
      ?></td> 
      <td><?php 
      echo $datos_usuario[$i]['ciudad'];
      ?></td> 
      <td><?php 
      echo $datos_usuario[$i]['direccion'];
      ?></td> 
      <td><?php 
      if($datos_usuario[$i]['prospecto']==0){
      echo "NO";
      }
      else
      {
        echo "SI";
      }
      ?></td> 
      <?php 
      if($datos_usuario[$i]['prospecto']==0){
      ?>
      <td class="text-center"><a onclick="javascript:formulario_actualizar_c('<?php echo $datos_usuario[$i]['nit_cedula']; ?>','<?php echo $datos_usuario[$i]['nombres']; ?>','<?php echo $datos_usuario[$i]['apellidos']; ?>','<?php echo $datos_usuario[$i]['razon_social']; ?>','<?php echo $datos_usuario[$i]['telefono']; ?>','<?php echo $datos_usuario[$i]['email']; ?>','<?php echo $datos_usuario[$i]['ciudad']; ?>','<?php echo $datos_usuario[$i]['direccion']; ?>')"><img src="../dist/img/edit.png" height="17" width="17"></a></td>
      <?php
      }
      else
      {
        ?>
      <td class="text-center"><a onclick="javascript:formulario_actualizar_p('<?php echo $datos_usuario[$i]['nit_cedula']; ?>','<?php echo $datos_usuario[$i]['razon_social']; ?>','<?php echo $datos_usuario[$i]['telefono']; ?>','<?php echo $datos_usuario[$i]['email']; ?>','<?php echo $datos_usuario[$i]['ciudad']; ?>','<?php echo $datos_usuario[$i]['prospecto']; ?>')"><img src="../dist/img/edit.png" height="17" width="17"></a></td>
      <?php
      }
      ?>
      
      <!--<td class="text-center"><a onclick="javascript:formulario_actualizar(<?php echo $datos_usuario[$i]['nit_cedula']; ?>,<?php echo $datos_usuario[$i]['razon_social'] ?>,<?php echo $datos_usuario[$i]['telefono'] ?>,<?php echo $datos_usuario[$i]['email'] ?>,<?php echo $datos_usuario[$i]['ciudad'] ?>)"><img src="../dist/img/edit.png" height="17" width="17"></a></td>-->
      <td class="text-center"><a onclick="javascript:eliminar('<?php echo $datos_usuario[$i]['nit_cedula']; ?>')"><img src="../images/icons/delete1.png" height="17" width="17"></a></td>
    </tr>      

  <?php
}
  $i++;
}
?>
  </tbody>
  </table>
    </section>
