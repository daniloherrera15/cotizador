<?php
session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$nit=$_POST['nit'];
$nven=$_POST['nven'];
$pcd=$_POST['pcd'];
$fecha=date('Y-m-d h:i:s');
$nven= str_replace(".", "", $nven);
$nven= str_replace("€", "", $nven);
$nven= str_replace(" ", "", $nven);
$cfilas=$_POST['cont'];
$nedit=$_POST['nedit'];
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
$crud->eliminar("cotizacion_detalle",$con->getConnection(),"id_maestra='$nedit'","");
$crud->setConsulta(
"select * from cotizacion_maestro where id='$nedit'");
  $datos1= $crud->seleccionar($con->getConnection());
//VERIFICA QUE LA INSERCIÓN FUE EXITOSA
        if($crud->getTuplas()>0)
        {
        	$cotizacion=$datos1[0]['id'];
          $a=1;
          $mensaje='';
        while ($a<=$cfilas) 
        {
          if($a==($cfilas)){
              $mensaje='Cotización Actualizada Con Exito '.$nedit;
            }
          //INSERTA EL DETALLE
            $producto=$_POST['idpr'.($a)];
            $cantidad=$_POST['can'.($a)];
            $valor=$_POST['val'.($a)];
            $array[0] = "'$producto','$cantidad','$valor','$cotizacion'";
            $campos="id_producto, cantidad,valor,id_maestra";
            $tabla="cotizacion_detalle";
            $crud->insertar($array,$campos,$tabla,$con->getConnection(),$mensaje);
            $a++;
            
        }
       //ENVIA CORREO CON DATOS DE LA COTIZACIÓN
        // $cmail="daniloherrera@cvsc.com.co";

         // require"../includes/PHPMailerM/src/Exception.php";
         // require"../includes/PHPMailerM/src/PHPMailer.php";
         // require"../includes/PHPMailerM/src/SMTP.php";
         

 
// //Crear una instancia de PHPMailer
// $mail = new PHPMailer();
// //Definir que vamos a usar SMTP
// $mail->IsSMTP();
// //Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
// // 0 = off (producción)
// // 1 = client messages
// // 2 = client and server messages
// $mail->SMTPDebug  = 0;
// //Ahora definimos gmail como servidor que aloja nuestro SMTP
// $mail->Host       = 'smtp.gmail.com';
// //El puerto será el 587 ya que usamos encriptación TLS
// $mail->Port       = 587;
// //Definmos la seguridad como TLS
// $mail->SMTPSecure = 'tls';
// //Tenemos que usar gmail autenticados, así que esto a TRUE
// $mail->SMTPAuth   = true;
// //Definimos la cuenta que vamos a usar. Dirección completa de la misma
// $mail->Username   = "dherrera.itsa@gmail.com";
// //Introducimos nuestra contraseña de gmail
// $mail->Password   = "95081508845";
// //Definimos el remitente (dirección y, opcionalmente, nombre)
// $mail->SetFrom('dherrera.itsa@gmail.com', 'Danilo Herrera');
// //Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
// $mail->AddReplyTo('replyto@correoquesea.com','El de la réplica');
// //Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
// $mail->AddAddress('daniloherrera@cvsc.com.co', 'Danilo CVSC');
// //Definimos el tema del email
// $mail->Subject = 'Esto es un correo de prueba';
// $mail->Body = "hi ! \n\n this is First mailing I made ";
// //Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
// $mail->AltBody = 'This is a plain-text message body';
// //Enviamos el correo
// if(!$mail->Send()) {
//   echo "Error: " . $mail->ErrorInfo;
// } else {
//   echo "Enviado!";
// }
//               // $correo= new PHPMailer();
//               // $mail->IsSMTP(); // telling the class to use SMTP 
//               // $mail->Host = "smtp.email.com"; // SMTP server 
//               // $mail->From = "from@email.com"; 
//               // $mail->AddAddress("myfriend@site.com"); 
//               // $mail->Subject = "first mailing"; 
//               // $mail->Body = "hi ! \n\n this is First mailing I made 
//               // myself with phpMailer !"; 
//               // $mail->WordWrap = 50; 
//               // $correo->SetFrom("COTIZACIÓN REGISTRADA", "Certificado Cidet");
//               // $correo->AddAddress("danilohb15@hotmail.com");
//               // $correo->Subject = "Sistema de Cotización Seguridad Electronica.";
//               //$html="<img src='../../img/LOGO.png'>";
//               $html="<h3>Se ha creado una nueva cotizacion número: <p style='color:red;'>".$cotizacion."</p> gracias por usar nuestra plataforma 
//               <p>Ingrese a <b>www.cvsc.com.co/cotizaciones</b> para mas información</p>";
//               // mail($cmail,"Prueba",$html);
            

       }
       else
        {
         ?>
           <script type="text/javascript">
           alert('Error al insertar cotización detalle');
           </script>
           <?php
        }


$con->desconectar();

?>