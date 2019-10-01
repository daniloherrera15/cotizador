<?php
 
 class Genera_campos
 {
  
   public $fecha_ini;
   public $fecha_fin;
   public $nombre_prog;
      
   


  public function __construct($fecha_ini1,$fecha_fin1,$nombre_prog1)
   {
    
     $this->fecha_ini=$fecha_ini1;
     $this->fecha_fin=$fecha_fin1;
     $this->nombre_prog = $nombre_prog1;
      
   }


 }
?>