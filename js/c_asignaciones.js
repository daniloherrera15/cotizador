// JavaScript Document


function 	programar_novedades(){

 var form= $("#edit_cli").serialize();

  $.post('../_admin/programar_novedades.php',form,

		function(data){

			 	

				//alert(data);





				 var cadena = data;

				 if(cadena.indexOf('Duplicate entry') != -1)
				 {
                    alert(data);
				 }
                 else
                 {
                 	if(cadena.indexOf('1') != -1)
                     {

				
				   
                  alert('Novedad Ingresada Exitosamente.');
				    $("#edit_cli").fadeOut('medium'); 
                   
				    /*$("#apellido_uno").val('');
					$("#apellido_dos").val('');
					$("#nombre_uno").val('');
					$("#nombre_dos").val('');
					$("#cedula").val('');
					$("#direccion").val('');
					$("#telefono_fijo").val('');
					$("#celular").val('');
					$("#email").val('');
					$("#cargo").val('');
					$("#tipo_sangre").val(''); 
					*/   	          
				
				 }
               }
		}

	);

   

}
function sacar_municipio2(){
 
        $("#select_municipio").load("saca_mun_emergente.php?uid="+$("#dep").val(),function(){
		      $(this).fadeIn("medium");
        });
  
  
        

}
function sacar_suc2(){
 
        $("#sucursal").load("sacar_suc_emergente.php?uid="+$("#select_municipio").val()+"&uid2="+$("#dep").val()+"&uid3="+$("#nit").val(),function(){
		      $(this).fadeIn("medium");
        });
  
  
        

}
function sacar_suc3(){
 
        $("#select_sucursal1").load("sacar_suc_emergente.php?uid="+$("#select_cliente").val(),function(){
		      $(this).fadeIn("medium");
        });
        
          $("#select_sucursal2").load("sacar_suc_emergente.php?uid="+$("#select_cliente").val(),function(){
		      $(this).fadeIn("medium");
        });
            $("#select_sucursal3").load("sacar_suc_emergente.php?uid="+$("#select_cliente").val(),function(){
		      $(this).fadeIn("medium");
        });
              $("#select_sucursal4").load("sacar_suc_emergente.php?uid="+$("#select_cliente").val(),function(){
		      $(this).fadeIn("medium");
        });
                $("#select_sucursal5").load("sacar_suc_emergente.php?uid="+$("#select_cliente").val(),function(){
		      $(this).fadeIn("medium");
        });
        
                    $("#select_sucursal6").load("sacar_suc_emergente.php?uid="+$("#select_cliente").val(),function(){
		      $(this).fadeIn("medium");
        });
        
  
  
         

}
  
 function res_listas()
 {
 	
 	// $("#select_dpto").val('');
 	// $("#select_municipio").val('');
 	// $("#select_sucursal").val('');
 	
 	sacar_suc3();
 }

 function subir()
      {
            $('html,body').animate({scrollTop:'0px'}, 1000);return false;
      }



//ingresar clientes


function sacar_municipio(){
    if($("#select_dpto").val()!='')
    {
        $("#select_municipio").load("saca_mun_emergente.php?uid="+$("#select_dpto").val(),function(){
		      $(this).fadeIn("medium");
        });
    }
    else
     {
     	alert("Esoja una Opci\u00f3n v\u00e1lida.");
     } 	 
  
        

}

function sacar_dias_turno(){
    if($("#select_turno").val()!='')
    {
        $("#select_dia_ini_turno").load("sacar_dias_turno.php?uid="+$("#select_turno").val(),function(){
		      $(this).fadeIn("medium");
        });
    }
    else
     {
     	alert("Esoja una Opci\u00f3n v\u00e1lida.");
     } 	 
  
        

}



function sacar_guarda(){
    if($("#select_sucursal").val()!='')
    {
        $("#select_guarda").load("saca_guarda.php?uid1="+$("#select_dpto").val()+"&uid2="+$("#select_municipio").val(),function(){
		      $(this).fadeIn("medium");
        });
    }
    else
     {
     	alert("Esoja una Opci\u00f3n v\u00e1lida.");
     } 	 
  
        

}

function saca_turno(){
    if($("#select_guarda").val()!='')
    {
        $("#select_turno").load("saca_turno.php",function(){
		      $(this).fadeIn("medium");
        });
    }
    else
     {
     	alert("Esoja una Opci\u00f3n v\u00e1lida.");
     } 	 
  
        

}




function sacar_suc_asoc()
{

     if($("#select_municipio").val()!='')
    {
        $("#select_sucursal").load("saca_suc_asoc.php?uid1="+$("#select_cliente").val()+"&uid2="+$("#select_dpto").val()+"&uid3="+$("#select_municipio").val(),function(){
		      $(this).fadeIn("medium");
        });
    }
    else
     {
     	alert("Esoja una Opci\u00f3n v\u00e1lida.");
     } 	

}

function 	ingresar_datos(){
  $("#save_asig").val('Generado Programaci\u00f3n...');
  $("#save_asig").attr('disabled', true);
 var form= $("#sub").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../_admin/programar_tvidelca_relevo.php',form,  
		function(data){

			 	

				//alert(data);





				 var cadena = data;

				 if(cadena.indexOf('Duplicate entry') != -1)
				 {
                    alert(data);
				 }
                 else
                 {
                 	if(cadena.indexOf('1') != -1)
                     {

				
				   
		                  alert('Programaci\u00f3n Ingresada Exitosamente.');
		                  $("#save_asig").val('Guardar Programaci\u00f3n');
		                  $("#save_asig").attr('disabled', false);
						    $("#sub")[0].reset(); 
		                   
						    /*$("#apellido_uno").val('');
							$("#apellido_dos").val('');
							$("#nombre_uno").val('');
							$("#nombre_dos").val('');
							$("#cedula").val('');
							$("#direccion").val('');
							$("#telefono_fijo").val('');
							$("#celular").val('');
							$("#email").val('');
							$("#cargo").val('');
							$("#tipo_sangre").val(''); 
							*/   	          
				
				     }
				     else
				     {
				     	  alert('No se asignar al guarda en el rango escojido.');
		                  $("#save_asig").val('Guardar Programaci\u00f3n');
		                  $("#save_asig").attr('disabled', false);
				     }

               }
		}

	);

   

}
 


//ver clientes

function ver_clientes(){
	cli= $("#nit").val();
	dep= $("#dep").val();
	mun= $("#select_municipio").val();
	suc= $("#sucursal").val();
	guar= $("#guar").val();
	r_guar= $("#r_guar").val();
	tur= $("#tur").val();
	nove= $("#nove").val();
	tip_tur= $("#tip_tur").val();
	desde= $("#desde").val();
	hasta = $("#hasta").val();
    var fecha1= new Date($("#desde").val());
    var fecha2= new Date($("#hasta").val());
    prog= $("#prog").val();
            

if(desde !='' && hasta != '' && fecha1>fecha2 )
{
   alert('Verifique que la fecha de inicio sea menor o igual que la fecha de final.');
	

}
else
{
	//load("sacar_asignaciones.php?cli="+cli+"&dep="+dep+"&mun="+mun+"&suc="+suc+"&guar="+guar+"&r_guar="+r_guar+"&tur="+tur+"&nove="+nove+"&tip_tur="tip_tur
	 $("#view_cli").load("sacar_asignaciones.php?cli="+cli+"&dep="+dep+"&mun="+mun+"&suc="+suc+"&guar="+guar+"&tur="+tur+"&nove="+nove+"&tip_tur="+tip_tur+"&desde="+desde+"&hasta="+hasta+"&prog="+prog,function(){

	     

		$(this).fadeIn("medium");

	  });
     }
}


//sacar subcategorias

function subcategorias(){
  var valor=$("#categoria_id").val();

 $("#sub_categoria_id").load("sacar_subcategoria.php?uid="+valor,function(){

     

	$(this).fadeIn("medium");

  }

  );


}


function r_n_r()
{
	var element = $("#departamento_id").val();
    var elemento = element.split(',');
    if(elemento[1]=='1')
    {
    	 $("#reemplazo").fadeIn('Medium');
    }
    else
    {
         $("#reemplazo").fadeOut('Medium');	  
    }

}

//ver cliente individual

function editar_cliente(user){



 $("#iden").val(user);

 $idvalor=document.getElementById('iden').value;



 $("#edit_cli").load("datos_asignacion.php?uid="+$idvalor,function(){

     

	$(this).fadeIn("medium");

	//$("#content1").fadeOut("medium");

	    //convirtiendo los valores a moneda      
	$('#precio').formatCurrency();
	$('#precio').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
    
	/*$('#clazadob').formatCurrency(); //colocarle el currency
	$('#calzadob').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
	
	$('#coch').formatCurrency();
	$('#coch').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
	
	$('#confeccion').formatCurrency();
	$('#confeccion').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });

    $('#electro').formatCurrency();
	$('#electro').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
    
	$('#juguete').formatCurrency();
	$('#juguete').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
	
	$('#tela').formatCurrency();
	$('#tela').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });*/
  }

  );

 

}







//cerrar la ventana de clientes

function hola()

{

	$("#edit_cli").fadeOut("medium");

}

//editar clientes

function modificar_clientes(){

     if($("#encuesta").val()=='0'  )

		{

		  alert('Los campos marcados con * son obligatorios');

		}
		else
		{
				  var form= $("#edit_cli").serialize();
				$.post('edit_clientes.php',form,
				function(data){
						alert(data);
					if(jQuery.trim(data)=='Subcategoria Exitosamente Actualizada.'){
					   ver_clientes();
                      $("#edit_cli").fadeOut("medium");    
					}	
				},{
				}
				);
		}

   

   

  

  

	



}



//eliminar clientes

function delete_clients()

{

	 if($("#datos_cli input[type=checkbox]:checked").length >= 1)

	 {

		

		if( confirm('Desea eliminar las asignaciones seleccionadas?') )

		{   

			var users = '';

			var arr = $("#datos_cli input[type=checkbox]:checked");

			arr = jQuery.map(arr, function(n, i){

			return ('prog_id=' + n.value);

			});

			users = arr.join(" or ");

			

			$.post('eliminar_asignaciones.php',{

					condition: users

				},

				function(data){

						ver_clientes();

				}

			);

		}

	}

	else

	{

		alert('Por favor seleccione los clientes  que desea eleminar');

	}

	

	 

	

}



//activar,desactivar clientes

function activate_cliente(set){

	

     if($("#datos_cli input[type=checkbox]:checked").length >= 1)

	 {	

		var users = '';

		

		var arr = $("#datos_cli input[type=checkbox]:checked");

				

		arr = jQuery.map(arr, function(n, i){

			return ('cliente_id=' + n.value);

		});

					

		users = arr.join(" or ");

		

		$.post('update_clientes.php',{

				condition: users,

				value: set

			},

			function(data){

				

					ver_clientes();

				

			}

		);

	 }

	 else

	 {

	  alert('Seleccione los clientes que desea activar o desactivar');

	 }

}



  function valEmail(valor){

         re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/

            if(!re.exec(valor))    {

              return false;

           }

		   else

		   {

            return true;

           }

        }



//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos

$(document).ready(function(){

   //$.ajaxSettings.cache = false;



    $("#sub").validate({
		rules: {			 
				select_cliente:{required:true},
				select_dpto:{required:true},
                select_municipio:{required:true},
                select_sucursal:{required:true},
                 p_nombre:{required:true},
                //select_guarda:{required:true},
                select_turno:{required:true},
                select_dia_ini_turno:{required:true},
                desde:{required:true},
                hasta:{required:true},
              
			
			 
		},
		submitHandler: function(form) {
			
            var fecha1= new Date($("#desde").val());
            var fecha2= new Date($("#hasta").val());
            if(fecha1>fecha2)
            {
            	alert('Verifique que la fecha  inicio sea menor o igual a la fecha fin.');
            }
            else
            {
            	ingresar_datos();
            }
			//if( $('#iden').val() == ''){
				//ingresar_datos();
			//}
			//else
			//{
			//	user_edit_submit();
			//}
		},
		errorElement: 'span',
		debug: true
	});


	$("#edit_cli").validate({
		rules: {			 
				departamento_id:{required:true},
				fecha_ini:{required:true},
                fecha_fin:{required:true},
              
			
			
		},
		submitHandler: function(form) {
			
            var fecha1= new Date($("#fecha_ini").val());
            var fecha2= new Date($("#fecha_fin").val());
            if(fecha1>fecha2)
            {
            	alert('Verifique que la fecha  inicio sea menor o igual a la fecha fin.');
            }
            else
            {
            	location.reload();
            	programar_novedades();
            	 ver_clientes();

            }
			//if( $('#iden').val() == ''){
				//ingresar_datos();
			//}
			//else
			//{
			//	user_edit_submit();
			//}
		},
		errorElement: 'span',
		debug: true
	});

   

   

   //escondo el precio de traida, la cantidad y la marca

   $("#marcal").fadeOut("medium");

   $("#paresl").fadeOut("medium");

   $("#preciol").fadeOut("medium");

   

   $("#save_emp").bind('click',function(){
         
		
		 
		 
       /*if($("#nombre").val()=='' || $("#descrip	").val()=='' || $("#dl").val()=='' || $("#dd").val()=='' )

		{

		  alert('Los campos marcados con * son obligatorios');

		}

		else

		{

		 
		  


		}*/
ingresar_clientes();


  });

      

   $("#tipo").change(function() {

      $("#idenl").val( $("#tipo").val());

	   if($("#idenl").val()==13)

	   {

	     $("#cubicajel").fadeOut("medium");

		 $("#paresl").fadeIn("medium");

		 $("#marcal").fadeIn("medium");

	     $("#preciol").fadeIn("medium");

	   }

	   else

	   {

	     $("#cubicajel").fadeIn("medium");

		   $("#marcal").fadeOut("medium");

		   $("#paresl").fadeOut("medium");

		   $("#preciol").fadeOut("medium");

	   }

	  

	 /*if($("#tipo").val()=="1")

	  {

	   $("#cubicaje").fadeIn("medium");

	  }

	  else

	  {

	     $("#cubicaje").fadeOut("medium");

	  }*/

    

   });

  


 

  ver_clientes(); 

});

 









