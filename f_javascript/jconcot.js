function ver_tabla(){
  $("#tabla_reporte").unload();
  $("#tabla_reporte").load("../epages/select_pages/frm_con_cot.php",function(){
   $(this).fadeIn("medium");
   $('#table_cot').DataTable({
    ordering: false,
    // scrollY: 350
    "language": {

           "sProcessing":     "Procesando...",

    "sLengthMenu":     "Mostrar _MENU_ registros",

    "sZeroRecords":    "No se encontraron resultados",

    "sEmptyTable":     "Ningún dato disponible en esta tabla",

    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",

    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",

    "sInfoPostFix":    "",

    "sSearch":         "Buscar:",

    "sUrl":            "",

    "sInfoThousands":  ",",

    "sLoadingRecords": "Cargando...",

    "oPaginate": {

        "sFirst":    "Primero",

        "sLast":     "Último",

        "sNext":     "Siguiente",

        "sPrevious": "Anterior"

    }

  }
 });


 });


}


function generar_pdf(id)
{
var idr=id.replace("BQ-COT-","");
alert(idr);
}

function aprueba_cotizacion(id)
{
 if( confirm('Desea Aprobar la Cotización: BQ-COT-'+id) )
 { 

    $.post('../validations/EstadoComprobante.php?acc='+1+'&idcot='+id,  
      function(data){
       alert(data); 
       if($.trim(data) =='Cotización Aprobada con exito')
       { 
       }
     });
  ver_tabla();
}
}

function rechaza_cotizacion(id)
{
 if( confirm('Desea Rechazar la Cotización: BQ-COT-'+id) )
 { 

    $.post('../validations/EstadoComprobante.php?acc='+2+'&idcot='+id,  
      function(data){
       alert(data); 
       if($.trim(data) =='Cotización Rechazada con exito')
       { 
       }
     });
 ver_tabla();
}
}

//950815Hb.*.**

// function mostrar_editar(id,num,terid,terno,conc,venid,venno,clp,cont,ciud){
  function mostrar_editar(id){
  $("#cas1").fadeOut();
  if (confirm("Desea editar la cotizacion: "+id+"?")) {
  ver_tabla_cot(id);
  $("#cas3").fadeIn(); 
  //alert($("#tauxterid"+id).val());
  $("#nocom").val($("#tauxnum"+id).val());
  $("#ater").val($("#tauxterid"+id).val());
  $("#nit").val($("#tauxterno"+id).val());
  $("#pcd").val($("#tauxconc"+id).val());
  $("#nven").val($("#tauxvenid"+id).val());
  $("#ven").val($("#tauxvenno"+id).val());
  $("#dir").val($("#tauxclp"+id).val());
  $("#con").val($("#tauxcont"+id).val());
  $("#ciu").val($("#tauxciud"+id).val());
  $("#nocom").prop("readonly",true);
  $("#ater").prop("readonly",true);
  $("#nit").prop("readonly",true);
  $("#nven").prop("readonly",true);
  $("#ven").prop("readonly",true);
  $("#dir").prop("readonly",true);
  $("#con").prop("readonly",true);
  $("#ciu").prop("readonly",true);
  $("#nedit").val(id);
  }
  else
  {
  $("#cas1").fadeIn();
  }
}




function ver_concot(){
$("#cas3").fadeOut();
  if (confirm("Desea descartar los cambios?")) {
  $("#cas1").fadeIn(); 
  ver_tabla();
  }
  else
  {
  $("#cas3").fadeIn();
  }
}



function ver_tabla_cot(id){
  $("#prueba_comprobante_editar").load("../epages/body_pages/tab_cotizacion_edit.php?coti="+id,function(){
   $(this).fadeIn("medium");
   $('#table_id').DataTable({
    ordering: false,
    // scrollY: 350
    "bLengthChange": false,
    "paging":   false,
    "info":     false,
    "filter": false
  });
 });
  suma_total();
}

function suma_total()
{
//alert($("#cont").val());
var i=1;
var suma=0;
for(i=1;i<=$("#cont").val();i++){
  suma=parseInt(suma)+parseInt($("#sub"+i).val());
}
  $("#ttiva").val(suma*0.19);
  $("#tdif").val(suma*1.19);
}



//------------------------detalle comprobante-------------------------

function agregar_fila()
   {
      if ( ($("#conc"+$("#cont").val()).val()!="" && $("#debito"+$("#cont").val()).val()!="") || ($("#conc"+$("#cont").val()).val()!="" && $("#credito"+$("#cont").val()).val()!="")  )
     {
         
         add_td();
     }
     else
     {
        alert('Verifique que los terceros, los concepos , los debitos y / o los creditos no esten vacios.');
     }
   }

   function add_td()
   {
                //alert("entr");
           $("#cont").val(parseInt($("#cont").val())+1);
           //alert($("#cont").val());
           var add_rows="<tr id='pr"+$("#cont").val()+"' name='pr"+$("#cont").val()+"'><td style='width:160px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='pro"+$("#cont").val()+"' id='pro"+$("#cont").val()+"' placeholder='Producto' onclick='javascript:ver_tabla3(this.id)' style='width:155px;overflow:auto;'><input type='hidden' name='idpr"+$("#cont").val()+"' id='idpr"+$("#cont").val()+"' readonly><td style='width:160px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='ref"+$("#cont").val()+"' id='ref"+$("#cont").val()+"' placeholder='Referencia' style='width:120px;overflow:auto;' readonly><td style='width:160px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='mar"+$("#cont").val()+"' id='mar"+$("#cont").val()+"' placeholder='Marca' style='width:120px;overflow:auto;' readonly><td style='width:250px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='des"+$("#cont").val()+"' id='des"+$("#cont").val()+"' placeholder='Descripcion' style='width:220px;overflow:auto;' readonly><td style='width:160px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='ume"+$("#cont").val()+"' id='ume"+$("#cont").val()+"' placeholder='Unidad Medida' style='width:100px;overflow:auto;' readonly><td style='width:160px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='can"+$("#cont").val()+"' id='can"+$("#cont").val()+"' placeholder='Cantidad' style='width:70px;overflow:auto;' onblur='javascript:calculo_sub_total(this.id,this.value)'><td style='width:160px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='val"+$("#cont").val()+"' id='val"+$("#cont").val()+"' placeholder='Valor' style='width:70px;overflow:auto;'><td style='width:180px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='sub"+$("#cont").val()+"' id='sub"+$("#cont").val()+"' placeholder='Subtotal' style='width:65px;overflow:auto;' readonly><img id='im"+$("#cont").val()+"' name='im"+$("#cont").val()+"' title='Eliminar Fila' src='../images/icons/delete1.png' height='20' width='20' onclick='javascript:remove_td(this.id),suma_total()'></tr>";
           $("#tbo").append(add_rows);
            //suma_total();
   }

function mapeo(ruta)
{
  var arr = $(ruta);
  arr = jQuery.map(arr, function(n, i){
   return (n.id);
 });

  return(arr);   
}

function remove_td(id){
  var fil= id;
  fil= fil.replace('im','pr');
  if( confirm('Desea eliminar la fila seleccionada?:'+fil) )
  { 
   if($("#cont").val()>1)
   {
    $("#"+fil).remove();
    $("#cont").val(parseInt($("#cont").val())-1);
    
    var arr=  mapeo("table#table_id tbody#tbo tr");
    

        //cambio de nombre primer nivel
        var i=0;
        while(i<arr.length)
        {

         $('tr#'+arr[i]).attr("id", "pr"+(i+1)); 
         $('tr#'+"pr"+(i+1)).attr("name", "pr"+(i+1)); 

         i++;
       }

         //segundo mapeo
         var i=1;

         while(i<=parseInt($("#cont").val()))
         {     
           var arr2 = mapeo(" table#table_id tbody#tbo tr#pr"+i+" input[type=text],table#table_id tbody#tbo tr#pr"+i+" input[type=hidden], table#table_id tbody#tbo tr#pr"+i+" img ");

           $('input[type=text]#'+arr2[0]).attr("id", "pro"+i); 
           $('input[type=text]#pro'+i).attr("name", "pro"+i); 
           
           $('input[type=hidden]#'+arr2[1]).attr("id", "idpr"+i); 
           $('input[type=hidden]#idpr'+i).attr("name", "idpr"+i); 

           $('input[type=text]#'+arr2[2]).attr("id", "ref"+i); 
           $('input[type=text]#ref'+i).attr("name", "ref"+i); 

           $('input[type=text]#'+arr2[3]).attr("id", "mar"+i); 
           $('input[type=text]#mar'+i).attr("name", "mar"+i); 

           $('input[type=text]#'+arr2[4]).attr("id", "des"+i); 
           $('input[type=text]#des'+i).attr("name", "des"+i); 

           $('input[type=text]#'+arr2[5]).attr("id", "ume"+i); 
           $('input[type=text]#ume'+i).attr("name", "ume"+i); 

           $('input[type=text]#'+arr2[6]).attr("id", "can"+i); 
           $('input[type=text]#can'+i).attr("name", "can"+i); 

           $('input[type=text]#'+arr2[7]).attr("id", "val"+i); 
           $('input[type=text]#val'+i).attr("name", "val"+i); 

           $('input[type=text]#'+arr2[8]).attr("id", "sub"+i); 
           $('input[type=text]#sub'+i).attr("name", "sub"+i); 

           

           if(i>=2)
           {
            $('img#'+arr2[9]).attr("id", "im"+i); 
            $('img#im'+i).attr("name", "im"+i); 
          }



          i++;
        }






      }

    }
  }

function calculo_sub_total(id,cantidad){
var remplazo;
remplazo = id.replace("can","");
if(cantidad==null || cantidad==0 || cantidad < 0){
  $("#can"+remplazo).val(1);
  cantidad=1;
}
$("#sub"+remplazo).val(cantidad*$("#val"+remplazo).val());
suma_total();
}

function calculo_sub_total2(id){
var remplazo;
remplazo = id.replace("val","");
if($("#can"+remplazo).val()==null || $("#can"+remplazo).val()==0 || $("#can"+remplazo).val() < 0){
  $("#can"+remplazo).val(1);
}
$("#sub"+remplazo).val($("#can"+remplazo).val()*$("#val"+remplazo).val());
suma_total();
}
//---------Tabla Productos---------
function ver_tabla3(id){
  var remplazo;
  remplazo=id.replace("pro","");
  $("#cauxi").val(remplazo);
  $("#cas3").fadeOut("medium");
  $("#cas4").fadeIn("medium");
  $("#cas4").load("../epages/select_pages/frm_cot_articulos.php",function(){
   $(this).fadeIn("medium");
   $('#cot_articulo_table').DataTable({
    
  });
 });
}

function colocar_articulo(id,nombre,ref,mar,descripcion,unimed,precio){
  var remplazo;
  remplazo = $("#cauxi").val();
  $("#idpr"+remplazo).val(id);
  $("#pro"+remplazo).val(nombre);
  $("#ref"+remplazo).val(ref);
  $("#mar"+remplazo).val(mar);
  $("#des"+remplazo).val(descripcion);
  $("#ume"+remplazo).val(unimed);
  $("#can"+remplazo).val(1);
  $("#val"+remplazo).val(precio);
  $("#sub"+remplazo).val(precio);
  $("#cas3").fadeIn("medium");
  $("#cas4").fadeOut("medium");
  $("#btna").attr("disabled",false);
  $("#btng").attr("disabled",false);
  suma_total();
}

//Insercion y actualización
function ingresar_cotizacion(){
//Verifica que en el maestro no hayan campos en blanco
if( $("#nit").val()==0 || $("#nit").val() == null || $("#nit").val()=="")
{
  alert("DEBE INGRESAR UN TERCERO VALIDO: ERROR GUARDAR COTIZACIÓN");
}
else if ($("#nven").val()==0 || $("#nven").val() == null || $("#nven").val()=="")
{
alert("DEBE INGRESAR UN Nº de VENDEDOR VALIDO: ERROR GUARDAR COTIZACIÓN");
}
else if (($("#pcd").val()==0 || $("#pcd").val() == null || $("#pcd").val()=="") && ($("#pcd2").val()==0 || $("#pcd2").val() == null || $("#pcd2").val()==""))
{
alert("DEBE INGRESAR UN CONCEPTO PARA LA COTIZACIÓN: ERROR GUARDAR COTIZACIÓN");
}else
{

 var form= $("#coti").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../validations/updcotizacion.php',form,  
    function(data){
      alert(data);  
                // $("#nom").val('');
                // $("#ape").val('');
                // $("#ced").val('');
                // $("#tel").val('');
                // $("#ema").val('');
                // $("#nac").val('');
                // $("#ced").val('');
                // $("#usu").val('');
                // $("#pass").val('');
                // $("#pass2").val('');
    }

  );

}

}

//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos
$(document).ready(function(){
ver_tabla();
});
