<?php
session_start();
include('../../includes/config.php');
include('../../classes/conectar.php');
include('../../classes/crud.php');
?>
<table id="cot_articulo_table" name="articulo_table" class="display">
    <thead>        
    <tr>            
      <th>Nombre</th>
      <th>Referencia</th>
      <th>Descripcion</th>
      <th>Categoria</th>
      <th>Unidad Medida</th>
      <th>Precio</th>
    </tr>
  </thead> 
  <tbody>
<?php
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
$crud->setconsulta("SELECT articulo.id as idproducto, ref_articulo, nombre_articulo, precio_articulo, 
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
  if($datos_usuario[$i]['idproducto']>0){
  ?>
     
    <tr>      
      <td><a onclick="javascript:colocar_articulo ('<?php echo $datos_usuario[$i]['idproducto'] ?>','<?php echo $datos_usuario[$i]['nombre_articulo'] ?>','<?php echo $datos_usuario[$i]['ref_articulo'] ?>','<?php echo $datos_usuario[$i]['nombrem'] ?>','<?php echo $datos_usuario[$i]['descripcion'] ?>','<?php echo $datos_usuario[$i]['unidad'] ?>','<?php echo $datos_usuario[$i]['precio_articulo'] ?>')">
      <?php 
      echo $datos_usuario[$i]['nombre_articulo'];
      ?></a></td>   
      <td><a onclick="javascript:colocar_articulo ('<?php echo $datos_usuario[$i]['idproducto'] ?>','<?php echo $datos_usuario[$i]['nombre_articulo'] ?>','<?php echo $datos_usuario[$i]['ref_articulo'] ?>','<?php echo $datos_usuario[$i]['nombrem'] ?>','<?php echo $datos_usuario[$i]['descripcion'] ?>','<?php echo $datos_usuario[$i]['unidad'] ?>','<?php echo $datos_usuario[$i]['precio_articulo'] ?>')">
      <?php 
      echo $datos_usuario[$i]['ref_articulo'];
      ?></a></td> 
      <td><a onclick="javascript:colocar_articulo ('<?php echo $datos_usuario[$i]['idproducto'] ?>','<?php echo $datos_usuario[$i]['nombre_articulo'] ?>','<?php echo $datos_usuario[$i]['ref_articulo'] ?>','<?php echo $datos_usuario[$i]['nombrem'] ?>','<?php echo $datos_usuario[$i]['descripcion'] ?>','<?php echo $datos_usuario[$i]['unidad'] ?>','<?php echo $datos_usuario[$i]['precio_articulo'] ?>')">
      <?php 
      echo $datos_usuario[$i]['descripcion'];
      ?></a></td> 
      <td><a onclick="javascript:colocar_articulo ('<?php echo $datos_usuario[$i]['idproducto'] ?>','<?php echo $datos_usuario[$i]['nombre_articulo'] ?>','<?php echo $datos_usuario[$i]['ref_articulo'] ?>','<?php echo $datos_usuario[$i]['nombrem'] ?>','<?php echo $datos_usuario[$i]['descripcion'] ?>','<?php echo $datos_usuario[$i]['unidad'] ?>','<?php echo $datos_usuario[$i]['precio_articulo'] ?>')">
      <?php 
      echo $datos_usuario[$i]['categoriaa'];
      ?></a></td> 
      <td><a onclick="javascript:colocar_articulo ('<?php echo $datos_usuario[$i]['idproducto'] ?>','<?php echo $datos_usuario[$i]['nombre_articulo'] ?>','<?php echo $datos_usuario[$i]['ref_articulo'] ?>','<?php echo $datos_usuario[$i]['nombrem'] ?>','<?php echo $datos_usuario[$i]['descripcion'] ?>','<?php echo $datos_usuario[$i]['unidad'] ?>','<?php echo $datos_usuario[$i]['precio_articulo'] ?>')">
      <?php 
      echo $datos_usuario[$i]['unidad'];
      ?></a></td> 
      <td><a onclick="javascript:colocar_articulo ('<?php echo $datos_usuario[$i]['idproducto'] ?>','<?php echo $datos_usuario[$i]['nombre_articulo'] ?>','<?php echo $datos_usuario[$i]['ref_articulo'] ?>','<?php echo $datos_usuario[$i]['nombrem'] ?>','<?php echo $datos_usuario[$i]['descripcion'] ?>','<?php echo $datos_usuario[$i]['unidad'] ?>','<?php echo $datos_usuario[$i]['precio_articulo'] ?>')">
      <?php 
      echo $datos_usuario[$i]['precio_articulo'];
      ?></a></td> 
    </tr>      

  <?php
  
}
$i++;
}
?>
  </tbody>
  </table>
    </section>
