<?php
session_start();
include('../../includes/config.php');
include('../../classes/conectar.php');
include('../../classes/crud.php');
?>
<form method="get">
<table id="table_id" class="display" >
<thead >        
    <tr>            

      <th style="border: white 1px solid;background:#367fa9; color:white"> Producto </th>
      <th style="border: white 1px solid;background:#367fa9; color:white"> Referencia </th>
      <th style="border: white 1px solid;background:#367fa9; color:white"> Marca </th> 
      <th style="border: white 1px solid;background:#367fa9; color:white"> Descripción </th> 
       <th style="border: white 1px solid;background:#367fa9; color:white"> U. Medida</th>     
       <th style="border: white 1px solid;background:#367fa9; color:white"> Cantidad</th>     
       <th style="border: white 1px solid;background:#367fa9; color:white"> Valor</th>     
       <th style="border: white 1px solid;background:#367fa9; color:white"> Subtotal</th>     
    </tr>
  </thead>

  <tbody id="tbo" name="tbo"> 
      <?php
                $fi=1;
                $i=0;
                $con = new Connection($server,$user,$password,$dbname);
                $con->conectar();
                $crud = new Crud();
                $crud->setconsulta("select ar.id as idar,
                 ar.nombre_articulo,
                 cd.cantidad,
                 ar.ref_articulo,
                 ar.descripcion as desart,
                 ar.precio_articulo,
                 ma.descripcion as marca,
                 um.descripcion as unidad,
                 ca.descripcion   as categoria    
                  from cotizacion_detalle as cd 
                  inner join articulo as ar
                  on ar.id=cd.id_producto
                  inner join marca_articulo as ma
                  on ma.id=ar.marca_articulo
                  inner join unidad_medida as um
                  on um.id=ar.tipo_unidad
                  inner join categoria_articulo as ca
                  on ca.id = ar.categoria
                  where id_maestra=".$_GET['coti']);
                $datos_usuario =  $crud->seleccionar($con->getConnection());
                $con->desconectar();
               while($i<sizeof($datos_usuario)){
                if($fi==1){
               ?> 
      <tr id="pr<?php echo $fi ?>" name="pr<?php echo $fi ?>">  
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="pro<?php echo $fi ?>" id="pro<?php echo $fi ?>" value="<?php echo $datos_usuario[$i]['nombre_articulo']; ?>"placeholder="Producto" style="width:155px;overflow:auto;" onclick="javascript:ver_tabla3(this.id)" readonly><input type="hidden" name="idpr1" id="idpr1" value="<?php echo $datos_usuario[$i]['idar']; ?>" readonly ><!--<input type="text" name="codcuenta1" id="codcuenta1" onkeyup="javascript:buscar_codigo(this.value,this.id)" ondblclick="ver_cod(this.id)" placeholder="Codigo" style="width:73px;overflow:auto;border: #367fa9 1px solid"><input type="text" name="descuenta1" id="descuenta1" onkeyup="javascript:buscar_descripcion(this.value,this.id)" ondblclick="ver_desc(this.id)" placeholder="Descripción" style="width:102px;overflow:auto;border: #367fa9 1px solid" ></td>   -->
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="ref<?php echo $fi ?>" id="ref<?php echo $fi ?>" value="<?php echo $datos_usuario[$i]['ref_articulo']; ?>"placeholder="Referencia" style="width:120px;overflow:auto;" readonly><!--<input type="text" name="conc1" id="conc1" placeholder="Digite Concepto" style="width:158px;overflow:auto;border: white 0px solid"></td>   -->
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="mar<?php echo $fi ?>" id="mar<?php echo $fi ?>" value="<?php echo $datos_usuario[$i]['marca']; ?>"placeholder="Marca" style="width:120px;overflow:auto;" readonly><!--<input type="text" name="terceroid1" id="terceroid1" onkeyup="javascript:buscar_tercero_id(this.value,this.id)" ondblclick="ver_terceros_com_id(this.id)" placeholder="Digite ID" style="width:85px;overflow:auto;border: #367fa9 1px solid;background: #FFFFFF" disabled><input type="text" name="tercerorn1" id="tercerorn1" ondblclick="ver_terceros_com_de(this.id)" onkeyup="javascript:buscar_tercero_nombre(this.value,this.id)" placeholder="Digite R.S/Nom" style="width:100px;overflow:auto;border: #367fa9 1px solid;background: #FFFFFF" disabled></td>   -->
      <td style="width:250px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="des<?php echo $fi ?>" id="des<?php echo $fi ?>" value="<?php echo $datos_usuario[$i]['desart']; ?>"placeholder="Descripcion" style="width:220px;overflow:auto;" readonly><!--<input type="text" name="debito1" id="debito1" placeholder="Digite el valor" value="0" onkeyup="sumar_debito(this.value)" onkeypress='javascript:validar_cero(this.id,this.value)'  onchange="javascript:cambia_deb()" onblur="javascript:cambia_formato(this.id)" onclick='javascript:validar_cero(this.id,this.value)' style='width:99x;overflow:auto;border: white 0px solid'></td> -->
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="ume<?php echo $fi ?>" id="ume<?php echo $fi ?>" value="<?php echo $datos_usuario[$i]['unidad']; ?>"placeholder="Unidad Medida" style="width:100px;overflow:auto;" readonly><!--<input type="text" name="credito1" value='0' id="credito1"onkeyup="sumar_credito(this.value)" onkeypress='javascript:validar_cero(this.id,this.value)' onclick='javascript:validar_cero(this.id,this.value)' onchange="javascript:cambia_cre()" onblur="javascript:cambia_formato(this.id)" placeholder="Digite el valor"style='width:99x;overflow:auto;border: white 0px solid'></td>       -->
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="can<?php echo $fi ?>" id="can<?php echo $fi ?>" value="<?php echo $datos_usuario[$i]['cantidad']; ?>"placeholder="Cantidad" style="width:70px;overflow:auto;" onblur="javascript:calculo_sub_total(this.id,this.value)"><!-- <input type="text" name="dcc1" id="dcc1"  onclick="javascript:ver_centros()" placeholder="Digite Centro de Costos" style="width:152px;overflow:auto;border: white 0px solid"> <input type="text" name="lcl1" id="lcl1" onclick="javascript:ver_centros()" placeholder="Localizacion" style="width:70px;overflow:auto;border: #367fa9 1px solid;background: #FFFFFF" disabled><input type="text" name="act1" id="act1" onclick="javascript:ver_act()" placeholder="Actividad" style="width:70px;overflow:auto;border:  #367fa9 1px solid;background: #FFFFFF" disabled></td>   -->
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="val<?php echo $fi ?>" id="val<?php echo $fi ?>" value="<?php echo $datos_usuario[$i]['precio_articulo']; ?>"placeholder="Valor" style="width:70px;overflow:auto;" onblur="javascript:calculo_sub_total2(this.id)">
      <td style="width:180px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="sub<?php echo $fi ?>" id="sub<?php echo $fi ?>" value="<?php echo ($datos_usuario[$i]['precio_articulo']*$datos_usuario[$i]['cantidad']); ?>"placeholder="Subtotal" style="width:65px;overflow:auto;" readonly>
    </tr>    
    <?php 
    }
    else
    {
    ?>
      <tr id="pr<?php echo $fi ?>" name="pr<?php echo $fi ?>">  
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="pro<?php echo $fi ?>" id="pro<?php echo $fi ?>" value="<?php echo $datos_usuario[$i]['nombre_articulo']; ?>"placeholder="Producto" style="width:155px;overflow:auto;" onclick="javascript:ver_tabla3(this.id)" readonly><input type="hidden" name="idpr<?php echo $fi ?>" id="idpr<?php echo $fi ?>" value="<?php echo $datos_usuario[$i]['idar']; ?>" readonly ><!--<input type="text" name="codcuenta1" id="codcuenta1" onkeyup="javascript:buscar_codigo(this.value,this.id)" ondblclick="ver_cod(this.id)" placeholder="Codigo" style="width:73px;overflow:auto;border: #367fa9 1px solid"><input type="text" name="descuenta1" id="descuenta1" onkeyup="javascript:buscar_descripcion(this.value,this.id)" ondblclick="ver_desc(this.id)" placeholder="Descripción" style="width:102px;overflow:auto;border: #367fa9 1px solid" ></td>   -->
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="ref<?php echo $fi ?>" id="ref<?php echo $fi ?>" value="<?php echo $datos_usuario[$i]['ref_articulo']; ?>"placeholder="Referencia" style="width:120px;overflow:auto;" readonly><!--<input type="text" name="conc1" id="conc1" placeholder="Digite Concepto" style="width:158px;overflow:auto;border: white 0px solid"></td>   -->
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="mar<?php echo $fi ?>" id="mar<?php echo $fi ?>" value="<?php echo $datos_usuario[$i]['marca']; ?>"placeholder="Marca" style="width:120px;overflow:auto;" readonly><!--<input type="text" name="terceroid1" id="terceroid1" onkeyup="javascript:buscar_tercero_id(this.value,this.id)" ondblclick="ver_terceros_com_id(this.id)" placeholder="Digite ID" style="width:85px;overflow:auto;border: #367fa9 1px solid;background: #FFFFFF" disabled><input type="text" name="tercerorn1" id="tercerorn1" ondblclick="ver_terceros_com_de(this.id)" onkeyup="javascript:buscar_tercero_nombre(this.value,this.id)" placeholder="Digite R.S/Nom" style="width:100px;overflow:auto;border: #367fa9 1px solid;background: #FFFFFF" disabled></td>   -->
      <td style="width:250px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="des<?php echo $fi ?>" id="des<?php echo $fi ?>" value="<?php echo $datos_usuario[$i]['desart']; ?>"placeholder="Descripcion" style="width:220px;overflow:auto;" readonly><!--<input type="text" name="debito1" id="debito1" placeholder="Digite el valor" value="0" onkeyup="sumar_debito(this.value)" onkeypress='javascript:validar_cero(this.id,this.value)'  onchange="javascript:cambia_deb()" onblur="javascript:cambia_formato(this.id)" onclick='javascript:validar_cero(this.id,this.value)' style='width:99x;overflow:auto;border: white 0px solid'></td> -->
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="ume<?php echo $fi ?>" id="ume<?php echo $fi ?>" value="<?php echo $datos_usuario[$i]['unidad']; ?>"placeholder="Unidad Medida" style="width:100px;overflow:auto;" readonly><!--<input type="text" name="credito1" value='0' id="credito1"onkeyup="sumar_credito(this.value)" onkeypress='javascript:validar_cero(this.id,this.value)' onclick='javascript:validar_cero(this.id,this.value)' onchange="javascript:cambia_cre()" onblur="javascript:cambia_formato(this.id)" placeholder="Digite el valor"style='width:99x;overflow:auto;border: white 0px solid'></td>       -->
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="can<?php echo $fi ?>" id="can<?php echo $fi ?>" value="<?php echo $datos_usuario[$i]['cantidad']; ?>"placeholder="Cantidad" style="width:70px;overflow:auto;" onblur="javascript:calculo_sub_total(this.id,this.value)"><!-- <input type="text" name="dcc1" id="dcc1"  onclick="javascript:ver_centros()" placeholder="Digite Centro de Costos" style="width:152px;overflow:auto;border: white 0px solid"> <input type="text" name="lcl1" id="lcl1" onclick="javascript:ver_centros()" placeholder="Localizacion" style="width:70px;overflow:auto;border: #367fa9 1px solid;background: #FFFFFF" disabled><input type="text" name="act1" id="act1" onclick="javascript:ver_act()" placeholder="Actividad" style="width:70px;overflow:auto;border:  #367fa9 1px solid;background: #FFFFFF" disabled></td>   -->
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="val<?php echo $fi ?>" id="val<?php echo $fi ?>" value="<?php echo $datos_usuario[$i]['precio_articulo']; ?>"placeholder="Valor" style="width:70px;overflow:auto;" onblur="javascript:calculo_sub_total2(this.id)">
      <td style="width:180px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="sub<?php echo $fi ?>" id="sub<?php echo $fi ?>" value="<?php echo ($datos_usuario[$i]['precio_articulo']*$datos_usuario[$i]['cantidad']); ?>"placeholder="Subtotal" style="width:65px;overflow:auto;" readonly>
      <img id="im<?php echo $fi ?>" name="im<?php echo $fi ?>" title="Eliminar Fila" src="../images/icons/delete1.png" height="20" width="20" onclick="javascript:remove_td(this.id),suma_total()">
    <?php
    }
    $i++;
        $fi++;
    }  ?>

   
</tbody>
<input type="hidden" id="cont" name="cont" value="<?php echo $i ?>">
</table>
  </form>