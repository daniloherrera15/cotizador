<div id="info" name="info">
<form method="get">
<table id="table_id" class="display" >
<thead >        

    <tr>            
      <th style="border: white 1px solid;background:#367fa9; color:white"> Producto </th>
      <th style="border: white 1px solid;background:#367fa9; color:white"> Referencia </th>
      <th style="border: white 1px solid;background:#367fa9; color:white"> Marca </th>
      <th id='thdes' name='thdes' style="border: white 1px solid;background:#367fa9; color:white"> Descripción </th> 
      <th style="border: white 1px solid;background:#367fa9; color:white"> U. Medida</th>    
      <th style="border: white 1px solid;background:#367fa9; color:white"> Cantidad</th>     
      <th style="border: white 1px solid;background:#367fa9; color:white"> Valor</th>
      <th id='thgan' name='thgan' style="display:none;border: white 1px solid;background:#367fa9; color:white"> Ganancia </th>      
      <th style="border: white 1px solid;background:#367fa9; color:white"> Subtotal</th>     
    </tr>
  
  </thead>  
  <tbody id="tbo" name="tbo"> 
    <tr id="pr1" name="pr1">  
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="pro1" id="pro1" placeholder="Producto" style="width:155px;overflow:auto;" onclick="javascript:ver_tabla3(this.id)" readonly><input type="hidden" name="idpr1" id="idpr1" value="0" readonly ><!--<input type="text" name="codcuenta1" id="codcuenta1" onkeyup="javascript:buscar_codigo(this.value,this.id)" ondblclick="ver_cod(this.id)" placeholder="Codigo" style="width:73px;overflow:auto;border: #367fa9 1px solid"><input type="text" name="descuenta1" id="descuenta1" onkeyup="javascript:buscar_descripcion(this.value,this.id)" ondblclick="ver_desc(this.id)" placeholder="Descripción" style="width:102px;overflow:auto;border: #367fa9 1px solid" ></td>   -->
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="ref1" id="ref1" placeholder="Referencia" style="width:120px;overflow:auto;" readonly><!--<input type="text" name="conc1" id="conc1" placeholder="Digite Concepto" style="width:158px;overflow:auto;border: white 0px solid"></td>   -->
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="mar1" id="mar1" placeholder="Marca" style="width:120px;overflow:auto;" readonly><!--<input type="text" name="terceroid1" id="terceroid1" onkeyup="javascript:buscar_tercero_id(this.value,this.id)" ondblclick="ver_terceros_com_id(this.id)" placeholder="Digite ID" style="width:85px;overflow:auto;border: #367fa9 1px solid;background: #FFFFFF" disabled><input type="text" name="tercerorn1" id="tercerorn1" ondblclick="ver_terceros_com_de(this.id)" onkeyup="javascript:buscar_tercero_nombre(this.value,this.id)" placeholder="Digite R.S/Nom" style="width:100px;overflow:auto;border: #367fa9 1px solid;background: #FFFFFF" disabled></td>   -->
      <td id='tddes1' name='tddes1' style="width:250px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="des1" id="des1" placeholder="Descripcion" style="width:220px;overflow:auto;" readonly><!--<input type="text" name="debito1" id="debito1" placeholder="Digite el valor" value="0" onkeyup="sumar_debito(this.value)" onkeypress='javascript:validar_cero(this.id,this.value)'  onchange="javascript:cambia_deb()" onblur="javascript:cambia_formato(this.id)" onclick='javascript:validar_cero(this.id,this.value)' style='width:99x;overflow:auto;border: white 0px solid'></td> -->
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="ume1" id="ume1" placeholder="Unidad Medida" style="width:100px;overflow:auto;" readonly><!--<input type="text" name="credito1" value='0' id="credito1"onkeyup="sumar_credito(this.value)" onkeypress='javascript:validar_cero(this.id,this.value)' onclick='javascript:validar_cero(this.id,this.value)' onchange="javascript:cambia_cre()" onblur="javascript:cambia_formato(this.id)" placeholder="Digite el valor"style='width:99x;overflow:auto;border: white 0px solid'></td>       -->
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="can1" id="can1" placeholder="Cantidad" style="width:70px;overflow:auto;" onblur="javascript:calculo_sub_total(this.id,this.value)"><!-- <input type="text" name="dcc1" id="dcc1"  onclick="javascript:ver_centros()" placeholder="Digite Centro de Costos" style="width:152px;overflow:auto;border: white 0px solid"> <input type="text" name="lcl1" id="lcl1" onclick="javascript:ver_centros()" placeholder="Localizacion" style="width:70px;overflow:auto;border: #367fa9 1px solid;background: #FFFFFF" disabled><input type="text" name="act1" id="act1" onclick="javascript:ver_act()" placeholder="Actividad" style="width:70px;overflow:auto;border:  #367fa9 1px solid;background: #FFFFFF" disabled></td>   -->
      <td style="width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="val1" id="val1" placeholder="Valor" style="width:70px;overflow:auto;" onblur="javascript:calculo_sub_total2(this.id)">
      <td id='tdunt1' name='tdunt1' style="display:none;width:160px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="util1" id="util1" placeholder="Utilidad" style="width:70px;overflow:auto;">
      <td style="width:180px;overflow:auto;border: #367fa9 1px solid;"><input type="text" name="sub1" id="sub1" placeholder="Subtotal" style="width:74px;overflow:auto;" readonly>
    </tr>       
</tbody>
</table>
  </form>
  </div>