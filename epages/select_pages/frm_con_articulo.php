<?php
session_start();
include("../../includes/conf_postgre.php");
include("../../classes/con_postgre.php");
include("../../classes/crud_postgre.php");
?>
<table id="users_table" name="users_table" class="display">
    <thead>        
    <tr>            
      <th>Cedula</th>
      <th>Nombre - Apellidos</th>
      <th>Telefono</th>
      <th>Correo</th>
      <th>Usuario</th>
      <th align="center">Actualizar</th>
      <th align="center">Eliminar</th>
    </tr>
  </thead> 
  <tbody>
<?php
$con = new Connection($server,$port,$dbname,$user,$password);
$con->conectar();
$crud = new Crud();
$crud->setconsulta("select c_usuario.id
,usuario
,contrasena
,estado
,login,rol
,apellidos
,nombres
,cedula
,telefono
,email 
from c_usuario 
inner join usuario_detalle
on usuario_detalle.usuario_log = c_usuario.id ");
$datos_usuario =  $crud->seleccionar($con->getConnection());
$con->desconectar();
$i=0;
while($i<sizeof($datos_usuario))
{
  ?>
     
    <tr>      
      <td><?php 
      echo $datos_usuario[$i]['cedula'];
      ?></td>   
      <td><?php 
      echo $datos_usuario[$i]['nombres'].$datos_usuario[$i]['apellidos'];
      ?></td> 
      <td><?php 
      echo $datos_usuario[$i]['telefono'];
      ?></td> 
      <td><?php 
      echo $datos_usuario[$i]['email'];
      ?></td> 
      <td><?php 
      echo $datos_usuario[$i]['usuario'];
      ?></td> 
      <td class="text-center"><a onclick="javascript:editar_producto(<?php echo $datos_usuario_t[$i]['art_ref'] ?>)"><img src="../dist/img/edit.png" height="17" width="17"></a></td>
      <td class="text-center"><a><img src="../images/icons/delete1.png" height="17" width="17"></a></td>>
    </tr>      

  <?php
  $i++;
}
?>
  </tbody>
  </table>
    </section>
