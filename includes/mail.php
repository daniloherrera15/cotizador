<?php
require("PHPMailer/class.phpmailer.php");
$mail = new PHPMailer();
try {
$mail->Host = "localhost";
$mail->From = "daniloherrera@cvsc.com.co";
$mail->FromName = "Danilo Herrera Barrios";
$mail->Subject = "Prueba PHPMailer";
$mail->AddAddress("dherrera.itsa@gmail.com","Andres Herrera");
$mail->AddAddress("danilohb15@hotmail.com","Carlos Herrera"); 
$mail->AddCC("Marlayniebles@cvsc.com.co");
//$mail->AddBCC("usuariocopiaoculta@correo.com");
 
$body  = "Hola <strong>amigo</strong><br>";
$body .= "probando <i>PHPMailer<i>.<br><br>";
$body .= "<font color='red'>Saludos</font>";
$mail->Body = $body;
$mail->AltBody = "Hola amigo\nprobando PHPMailer\n\nSaludos";
//$mail->AddAttachment("images/foto.jpg", "foto.jpg");
//$mail->AddAttachment("files/demo.zip", "demo.zip");
$mail->Send();
echo 'Message has been sent';
} catch (Exception $e) {
 echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
echo "<h2>HOLA!.<\h2>";
?>
