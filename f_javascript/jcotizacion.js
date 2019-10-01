//----------Cuerpo de Cotizacion-------------
function r_check_prop(valor){
if($("#prope").prop("checked")==true){
  $("#prope").val(1);
  $("#ter").val("");
  $("#ter").attr("readonly",false);
  $("#ter").attr("placeholder","Razón Social Prospecto");
  $("#nit").val("");
  $("#nit").attr("readonly",false);
  $("#ciu").val("");
  $("#ciu").attr("readonly",false);
  $("#con").val("");
  $("#con").attr("readonly",false);
  $("#dir").val("");
  $("#dir").attr("readonly",false);
  $("#dir").attr("placeholder","Correo Electronico Prospecto");
  $("#thdes").fadeOut("medium");
  $("#thgan").fadeIn("medium");
  $("#tddes1").fadeOut("medium");
  $("#tdunt1").fadeIn("medium");
  var i=1
  for (i=1;i<=$("#cont").val();i++)
  {
   $("#tddes"+i).fadeOut("medium");
  $("#tdunt"+i).fadeIn("medium"); 
  }



}else if ($("#prope").prop("checked")==false){
  $("#prope").val(0);
  $("#ter").val("");
  $("#ter").attr("readonly",true);
  $("#ter").attr("placeholder","Tercero");
  $("#nit").val("");
  $("#nit").attr("readonly",true);
  $("#ciu").val("");
  $("#ciu").attr("readonly",true);
  $("#con").val("");
  $("#con").attr("readonly",true);
  $("#dir").val("");
  $("#dir").attr("readonly",true);
  $("#dir").attr("placeholder","Direccion");
  $("#thdes").fadeIn("medium");
  $("#thgan").fadeOut("medium");
  $("#tdunt1").fadeOut("medium");
  $("#tddes1").fadeIn("medium");

}
}




//---------------OTROS---------------
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
    ver_clientes();
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

//-----------------ARTICULO-------------------------

function ingresar_datos_articulo(){

 var form= $("#camar").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../validations/valumed.php',form,  
    function(data){
      alert(data);  
                $("#umed").val('');
                $("#desc").val('');
    }

  );
    ver_clientes();
}

function ver_tabla(){

  $("#prueba_comprobante").load("../epages/body_pages/tab_cotizacion.php",function(){
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
           var add_rows="<tr id='pr"+$("#cont").val()+"' name='pr"+$("#cont").val()+"'><td style='width:160px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='pro"+$("#cont").val()+"' id='pro"+$("#cont").val()+"' placeholder='Producto' onclick='javascript:ver_tabla3(this.id)' style='width:155px;overflow:auto;'><input type='hidden' name='idpr"+$("#cont").val()+"' id='idpr"+$("#cont").val()+"' readonly><td style='width:160px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='ref"+$("#cont").val()+"' id='ref"+$("#cont").val()+"' placeholder='Referencia' style='width:120px;overflow:auto;' readonly><td style='width:160px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='mar"+$("#cont").val()+"' id='mar"+$("#cont").val()+"' placeholder='Marca' style='width:120px;overflow:auto;' readonly><td id='tddes"+$("#cont").val()+"' name='tddes"+$("#cont").val()+"' style='width:250px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='des"+$("#cont").val()+"' id='des"+$("#cont").val()+"' placeholder='Descripcion' style='width:220px;overflow:auto;' readonly><td style='width:160px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='ume"+$("#cont").val()+"' id='ume"+$("#cont").val()+"' placeholder='Unidad Medida' style='width:100px;overflow:auto;' readonly><td style='width:160px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='can"+$("#cont").val()+"' id='can"+$("#cont").val()+"' placeholder='Cantidad' style='width:70px;overflow:auto;' onblur='javascript:calculo_sub_total(this.id,this.value)'><td style='width:160px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='val"+$("#cont").val()+"' id='val"+$("#cont").val()+"' placeholder='Valor' style='width:70px;overflow:auto;'><td id='tdunt"+$("#cont").val()+"' name='tdunt"+$("#cont").val()+"' style='display:none;width:160px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='util"+$("#cont").val()+"' id='util"+$("#cont").val()+"' placeholder='Utilidad' style='width:70px;overflow:auto;'><td style='width:180px;overflow:auto;border: #367fa9 1px solid;'><input type='text' name='sub"+$("#cont").val()+"' id='sub"+$("#cont").val()+"' placeholder='Subtotal' style='width:73px;overflow:auto;' readonly><img id='im"+$("#cont").val()+"' name='im"+$("#cont").val()+"' title='Eliminar Fila' src='../images/icons/delete1.png' height='20' width='20' onclick='javascript:remove_td(this.id),suma_total()'></tr>";
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


//---------tabla terceros--------------
function ver_tabla2(){
  if($("#prope").val()==0){
  $("#cas1").fadeOut("medium");
  $("#cas2").fadeIn("medium");
  $("#cas2").load("../epages/select_pages/frm_cot_tercero.php",function(){
   $(this).fadeIn("medium");
   $('#clie_table_cot').DataTable({
    ordering: false,
    // scrollY: 350
    "info": false

  });
 });
}
}

function colocar_tercero(nombre,nit,ciudad,direccion,contacto){
  $("#ter").val(nombre);
  $("#nit").val(nit);
  $("#ciu").val(ciudad);
  $("#dir").val(direccion);
  $("#con").val(contacto);
  $("#cas2").fadeOut("medium");
  $("#cas1").fadeIn("medium");
}

//---------Tabla Productos---------
function ver_tabla3(id){
  var remplazo;
  remplazo=id.replace("pro","");
  $("#cauxi").val(remplazo);
  $("#cas1").fadeOut("medium");
  $("#cas3").fadeIn("medium");
  $("#cas3").load("../epages/select_pages/frm_cot_articulos.php",function(){
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
  $("#cas1").fadeIn("medium");
  $("#cas3").fadeOut("medium");
  $("#btna").attr("disabled",false);
  $("#btng").attr("disabled",false);
  suma_total();
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

function suma_total()
{
var i=1;
var suma=0;
for(i=1;i<=$("#cont").val();i++){
  suma=parseInt(suma)+parseInt($("#sub"+i).val());
}
  $("#ttiva").val(suma*0.19);
  $("#tdif").val(suma*1.19);
}


//INSERCIÓN COTIZACIÓN MAESTRO Y DETALLE
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
    $.post('../validations/valcotizacion.php',form,  
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

//VALIDAR CAMPOS
function validar_campo(){

}

//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos
$(document).ready(function(){
ver_tabla();
});
