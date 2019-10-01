<?php
session_start();
include('../../includes/config.php');
include('../../classes/conectar.php');
include('../../classes/crud.php');
?>
<table id="table_cot" class="display" >
<thead >   
<br>     
    <tr>       
      <th align="justify">Numero de Cotizacion</th>        
      <th align="center">Tercero</th>
      <th align="center">Concepto</th>
      <th align="center">Vendedor</th>
      <th align="center">Fecha</th>
      <th align="center">Estado</th>
      <th align="center">Acción</th>
      <th align="center">Descargar</th>

    </tr>
  </thead>  
  <tbody> 
      <?php
                $i=0;
                $con = new Connection($server,$user,$password,$dbname);
                $con->conectar();
                $crud = new Crud();
                $crud->setconsulta("select 
                cotizacion_maestro.id as idcot,
                id_tercero,
                c_cliente.nombres as clinom,
                id_vendedor,
                usuario_detalle.nombres as usunom,
                concepto_detalle,
                fecha_cotizacion,
                estados.nombre as estado,
                estados.id as estid,
                cotizacion_maestro.usuario_cambio_estado,
                encargado.nombres encnom,
                encargado.apellidos encap
                from cotizacion_maestro
                inner join c_cliente
                on c_cliente.nit_cedula=cotizacion_maestro.id_tercero
                inner join usuario_detalle
                on usuario_detalle.cedula=cotizacion_maestro.id_vendedor
                inner join estados
                on estados.id=cotizacion_maestro.estado
                inner join usuario_detalle as encargado
                on encargado.cedula = cotizacion_maestro.usuario_cambio_estado
                where estados.id in (9,10,13,14)");
                $datos_usuario =  $crud->seleccionar($con->getConnection());
                $con->desconectar();
               while($i<sizeof($datos_usuario))
               {
                // if($datos_usuario[$i]['estado']==1)
                // {
                //   $est="Activo";
                // }else if ($datos_usuario[$i]['estado']==2){
                //   $est="Autorizado";
                // }else if($datos_usuario[$i]['estado']==3){
                //   $est="Negado";
                // }
                  $vendedor= $datos_usuario[$i]['id_vendedor'];
                  $vendedor= str_replace(".", "", $vendedor);
                  $vendedor= str_replace("€", "", $vendedor);
                  $vendedor= str_replace(",00", "", $vendedor);
                ?>
    <tr>      

      <td align="left"><?php echo "BQ-"."COT-".$datos_usuario[$i]['idcot'] ?></td>
      <td align="left"><?php echo $datos_usuario[$i]['id_tercero']." - ".$datos_usuario[$i]['clinom'] ?></td>
      <td align="left"><?php echo $datos_usuario[$i]['concepto_detalle'] ?></td>
      <td align="left"><?php echo $vendedor." - ".$datos_usuario[$i]['usunom'] ?></td>
      <td align="left"><?php echo $datos_usuario[$i]['fecha_cotizacion'] ?></td>
      <td align="left"><?php echo $datos_usuario[$i]['estado'] ?>
       <input type="hidden" name="auxenc" id="auxenc" value="<?php echo $datos_usuario[$i]['encnom']." ".$datos_usuario[$i]['encap'];  ?>">
       <input type="hidden" name="auxcli" id="auxcli" value="<?php echo $datos_usuario[$i]['id_tercero'] ;?>">
      </td>
      <?php if($datos_usuario[$i]['estid']==9){ ?>
      <td align="center"><a id="<?php echo $datos_usuario[$i]['idcot'] ?>" name="<?php echo $datos_usuario[$i]['idcot'] ?>" href="#" style="color:#6dc1e0;" onclick="javascript:enviar_cotizacion(this.id)"><i class="fa fa-envelope fa-lg" aria-hidden="true"></a></td>
      <?php } else if($datos_usuario[$i]['estid']==10) {?>
      <td align="center"><a id="<?php echo $datos_usuario[$i]['idcot'] ?>" name="<?php echo $datos_usuario[$i]['idcot'] ?>" href="#" style="color:#ce020f;" onclick="javascript:rechaza_cotizacion(this.id)"><i class="fa fa-minus-circle fa-lg" aria-hidden="true"></a></td>
      <?php } else { ?>
      <td align="center"><a id="<?php echo $datos_usuario[$i]['idcot'] ?>" name="<?php echo $datos_usuario[$i]['idcot'] ?>" href="#" style="color:#bab70b;" onclick="javascript:aprueba_cotizacion(this.id)"><i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></a></td>
      <?php } ?>

      <!--<td align="center"><?php echo $est ?></td>-->
      <td align="center"><a id="<?php echo "BQ-"."COT-".$datos_usuario[$i]['idcot'] ?>" name="<?php echo "BQ-"."COT-".$datos_usuario[$i]['idcot'] ?>" href='../includes/generarpdf.php?var="<?php echo $datos_usuario[$i]['idcot'] ?>"'><img src="../dist/img/pdf.png" value="0" ></a></td>
      <!-- <td align="center"><a id="<?php echo "BQ-"."COT-".$datos_usuario[$i]['idcot'] ?>" name="<?php echo "BQ-"."COT-".$datos_usuario[$i]['idcot'] ?>" href="" value="0" onclick="javascript:generar_pdf(this.id)"><img src="../dist/img/pdf.png" value="0" ></a></td> -->
    </tr>
          
      <?php
          $i++;
            }
    ?>
</table>
  
