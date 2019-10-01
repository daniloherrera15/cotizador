<?php 
include('includes/config.php');
include('classes/conectar.php');
include('classes/crud.php');
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
session_start();
 //if(!isset($_SESSION['user_authorized'])) {session_destroy();}
?>
<?php
    if(isset($_POST['submitted']))
    {
        $crud = new Crud();
        $crud->setConsulta("SELECT c_usuario.id,usuario,contrasena,cedula,nombres,apellidos,rolusuario.rol 
        from c_usuario
        INNER JOIN usuario_detalle
        ON usuario_detalle.usuario_log=c_usuario.id
        INNER JOIN rolusuario
        ON rolusuario.id=c_usuario.rol where usuario='$_POST[usu]' and contrasena='$_POST[pass]'");
         $datos1= $crud->seleccionar($con->getConnection());
      
        if($crud->getTuplas()>0)
        {
          if ($datos1[0]['login']!="a")// LA CONDICIÒN ES == I
          {
          $_SESSION['documento'] = $datos1[0]['cedula'];
          $_SESSION['nombre_completo'] = $datos1[0]['nombres']." ".$datos1[0]['apellidos'];
          $_SESSION['usuario_rol'] = $datos1[0]['rol'];
    
            // $crud2= new Crud();
            // $crud2->update("update 'opUsuario' login= 'a' where usuario= '$_POST[usu]' and contrasena='$_POST[pass]' and estado = 'TRUE'",
            //   "ok",$con->getConnection());
            header("location:epages/main.php");
          }
          else
           {
              ?>
               <script type="text/javascript">
           alert('el usuario al que intenta acceder, ya se encuentra logeado');
           </script>
              <?php
            }
        }
       else
        {
         ?>
           <script type="text/javascript">
           alert('Usuario o Password Incorrectos');
           </script>
          <?php
        } 
        $con->desconectar();

    }
?>
<html class="bg-black">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
  <link href="js/" />
       </head>
       <body class="bg-black">
        <div class = "modal-body">
        <div class="form-box" id="login-box">
          <div class="header">
<img
sizes="(max-width: 200px) 100vw, 200px"
srcset="
LogoGris_oc3pkn_c_scale,w_200.png 200w,
LogoGris_oc3pkn_c_scale,w_823.png 823w,
LogoGris_oc3pkn_c_scale,w_1400.png 1400w"
src="LogoGris_oc3pkn_c_scale,w_200.png"
alt="">
<br></div>
          <form name="login" id="login" method="post">
            <div class="body bg-gray">
              <!--<div class="form-group">
                <input type="text" name="emp" id="emp" class="form-control" placeholder="Empresa" required />
              </div>-->
              <div class="form-group">
                <input type="text" name="usu" id="usu" class="form-control" placeholder="Usuario" required/>
              </div>
              <div class="form-group">
                <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña" required />
              </div>
                    <button type="submit" name="submitted" id="submitted" class="btn bg-blue btn-block">Iniciar</button>
                    </form>      
                  </div>
                </div>
              </form>
            </div>
      <script src="../js/jquery.min.js"></script>
      <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
    </body>
    </html>