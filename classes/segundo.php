<?php
include('primero.php');

 class SegundoGrado Extends PrimerGrado
 {     

   public function multiplicar()
   {
      $this->resultado = $this->numero1 * $this->numero2;
   }


 }
?>