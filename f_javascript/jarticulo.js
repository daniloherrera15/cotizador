function ingresar_datos_umed(){

 var form= $("#cumed").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../validations/valumed.php',form,  
		function(data){
			alert(data);	
                $("#umed").val('');
                $("#desc").val('');
		}

	);
    ver_unimed();
}


function unime_form(){
$("#cumed").hide();
$("#ufrm").show()
}


function ver_unimed(){
$("#pru").hide();
$("#table_container").load("../epages/select_pages/frm_con_unimed.php",function(){
       $(this).fadeIn("medium");
       $('#unimed_table').DataTable();

 }

 );}

//-------------------MARCA-----------------------

function ingresar_datos_marca(){

 var form= $("#camar").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../validations/valmarca.php',form,  
    function(data){
      alert(data);  
                $("#marca").val('');
                $("#desc").val('');
    }

  );
    ver_marca();
}

function ver_marca(){
$("#pru").hide();
$("#table_container").load("../epages/select_pages/frm_con_marca.php",function(){
       $(this).fadeIn("medium");
       $('#marca_table').DataTable();

 }

 );}

//----------------CATEGORIA-----------------------
function ingresar_datos_categoria(){

 var form= $("#categ").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../validations/valcategoria.php',form,  
    function(data){
      alert(data);  
                $("#cate").val('');
                $("#desc").val('');
    }

  );
    ver_cate();
}


function ver_cate(){
$("#pru").hide();
$("#table_container").load("../epages/select_pages/frm_con_categoria.php",function(){
       $(this).fadeIn("medium");
       $('#categoria_table').DataTable();

 }

 );}

//-----------------TIPO-----------------------------

function ingresar_datos_tipo(){

 var form= $("#tipo").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../validations/valtipo.php',form,  
    function(data){
      alert(data);  
                $("#tip").val('');
                $("#desc").val('');
    }

  );
    ver_tipo();
}


function ver_tipo(){
$("#pru").hide();
$("#table_container").load("../epages/select_pages/frm_con_tipo.php",function(){
       $(this).fadeIn("medium");
       $('#categoria_table').DataTable();

 }

 );}

function limpiar_tipo(){
    $("#tip").val('');
    $("#desc").val('');
    ver_tipo();
}



//-----------------ARTICULO-------------------------

function ingresar_datos_articulo(){

 var form= $("#camar").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../validations/valarticulo.php',form,  
    function(data){
      alert(data);  
                $("#umed").val('');
                $("#desc").val('');
    }

  );
}

function ver_articulos(){
$("#table_container").load("../epages/select_pages/frm_con_articulos.php",function(){
       $(this).fadeIn("medium");
       $('#articulo_table').DataTable();

 }

 );}


//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos
$(document).ready(function(){
  if($("#form_view").val()==1){
    ver_unimed();
  }
  else if($("#form_view").val()==2)
  {
    ver_marca();
  }
  else if($("#form_view").val()==3)
  {
    ver_cate();
  }
  else if($("#form_view").val()==4)
  {
    ver_articulos();
  }
  else if($("#form_view").val()==5)
  {
    ver_tipo();
  }
});
