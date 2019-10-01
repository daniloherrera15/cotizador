function formulario_actualizar_p(id,rsoc,tel,email,ciu,prospe){
  $("#cas1").fadeOut("medium");
  if(confirm("Desea editar el tercero: "+id+" ?")){
  $("#cas2").fadeIn("medium");
  $("#nom").val('Prospecto');
  $("#ape").val('Prospecto');
  $("#ide").val(id);
  $("ide").prop("readonly",true);
  $("#tel").val(tel);
  $("#ema").val(email);
  $("#rso").val(rsoc);
  $("#ciu").val(ciu);
  $("#cel").val(tel);
  $("#dir").val('Prospecto#');
}
else
{
  $("#cas1").fadeIn("medium");
}


}

function formulario_actualizar_c(id,nombre,apellido,rsoc,tel,email,ciu,direccion){
  $("#cas1").fadeOut("medium");
  if(confirm("Desea editar el tercero: "+id+" ?")){
  $("#cas2").fadeIn("medium");
  $("#nom").val(nombre);
  $("#ape").val(apellido);
  $("#ide").val(id);
  $("#tel").val(tel);
  $("#ema").val(email);
  $("#rso").val(rsoc);
  $("#ciu").val(ciu);
  $("#cel").val(tel);
  $("#dir").val(direccion);
}
else
{
  $("#cas1").fadeIn("medium");
}


}

function tabla_clientes(){
 $("#cas2").fadeOut("medium");
 if(confirm("Desea volver a la tabla de terceros?")){
 $("#cas1").fadeIn("medium"); 
  }
  else
  {
    ver_clientes();
    $("#cas2").fadeIn("medium");
  }
  }



function ingresar_datos(){

 var form= $("#cclie").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../validations/valclie.php',form,  
		function(data){
			alert(data);	
                $("#nom").val('');
                $("#ape").val('');
                $("#ide").val('');
                $("#tel").val('');
                $("#ema").val('');
                $("#rso").val('');
                $("#ciu").val('');
                $("#cel").val('');
                $("#dir").val('');
		}

	);
}

function ver_clientes(){
$("#table_container").load("../epages/select_pages/frm_con_clie.php",function(){
       $(this).fadeIn("medium");
       $('#clie_table').DataTable();

 }

 );}

function actualizar_cliente(){
   var form= $("#cclie").serialize();
 if( confirm('Desea Actualizar el tercero: '+$("#ide").val()+"?") )
 { 
  //$.post('../_admin/programar.php',form,
    $.post('../validations/valeditcli.php',form,  
      function(data){
       alert(data); 
       if($.trim(data) =='Tercero Actualizado con Exito.')
       { 
        $("#cas2").fadeOut("medium");
        ver_clientes();
        $("#cas1").fadeIn("medium");
       }
     }

     );

  }
}

function eliminar(id){
  var form= $("#cclie").serialize();
if( confirm('Desea eliminar el tercero: '+id+"?") )
 { 
  //$.post('../_admin/programar.php',form,
    $.post('../validations/valdelcli.php?id='+id,form,  
      function(data){
       alert(data); 
       if($.trim(data) =='Tercero Eliminado con Exito.')
       { 
        ver_clientes();
       }
     }

     );

  }

}

//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos
$(document).ready(function(){
ver_clientes();
});
