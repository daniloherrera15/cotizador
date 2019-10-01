<?php
session_start();
if($_SESSION['nombre_completo'] == null || $_SESSION['nombre_completo']=''){
  ?>
  <script type="text/javascript">
           alert('PERMISO DENEGADO');
           </script>
<?php
 header("location:../index.php");
}
?>