<?php
session_start();
include('../../includes/config.php');
include('../../classes/conectar.php');
include('../../classes/crud.php');
?>
<table id="articulo_table" name="articulo_table" class="display">
    <thead>        
    <tr>            
      <th>Nombre</th>
      <th>Referencia</th>
      <th>Descripcion</th>
      <th>Categoria</th>
      <th>Unidad Medida</th>
      <th>Precio</th>
      <th align="center">Editar</th>
      <th align="center">Eliminar</th>
    </tr>
  </thead> 
  <tbody>
<?php
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
$crud->setconsulta("SELECT articulo.id, ref_articulo, nombre_articulo, precio_articulo, 
       unidad_medida.nombre as unidad, tipo_unidad, 
       marca_articulo,marca_articulo.nombre as nombrem, categoria_articulo.nombre as categoriaa,
       categoria, articulo.descripcion
  FROM articulo
  inner join unidad_medida
  on unidad_medida.id = articulo.tipo_unidad
  inner join categoria_articulo
  on categoria_articulo.id = articulo.categoria
  inner join marca_articulo
  on marca_articulo.id = articulo.marca_articulo");
$datos_usuario =  $crud->seleccionar($con->getConnection());
$con->desconectar();
$i=0;
while($i<sizeof($datos_usuario))
{
  ?>
     
    <tr>      
      <td><?php 
      echo $datos_usuario[$i]['nombre_articulo'];
      ?></td>   
      <td><?php 
      echo $datos_usuario[$i]['ref_articulo'];
      ?></td> 
      <td><?php 
      echo $datos_usuario[$i]['descripcion'];
      ?></td> 
      <td><?php 
      echo $datos_usuario[$i]['categoriaa'];
      ?></td> 
      <td><?php 
      echo $datos_usuario[$i]['unidad'];
      ?></td> 
      <td><?php 
      echo $datos_usuario[$i]['precio_articulo'];
      ?></td> 
      <td class="text-center"><a onclick="javascript:editar_producto(<?php echo $datos_usuario_t[$i]['art_ref'] ?>)"><img src="../dist/img/edit.png" height="17" width="17"></a></td>
      <td class="text-center"><a><img src="../images/icons/delete1.png" height="17" width="17"></a></td>
    </tr>      

  <?php
  $i++;
}
?>
  </tbody>
  </table>
    </section>
