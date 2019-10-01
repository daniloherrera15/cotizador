function ver_tabla(){
  $("#tabla_reporte").unload();
  $("#tabla_reporte").load("../epages/select_pages/frm_are_cot.php",function(){
   $(this).fadeIn("medium");
   $('#table_cot').DataTable({
    ordering: false,
    // scrollY: 350


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


function enviar_cotizacion(id)
{
 encargado=$("#auxenc").val();
 cliente=$("#auxcli").val();
 if( confirm('Desea Enviar la Cotización: BQ-COT-'+id+'\nAprobada por: '+encargado+'\nAl Cliente: '+cliente+' ?') )
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
 encargado=$("#auxenc").val();
 alert('Cotización: BQ-COT-'+id+'\nRechazada por: '+encargado+'\nComuniquese con él para más información.')
 ver_tabla();
}

//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos
$(document).ready(function(){
ver_tabla();
});
