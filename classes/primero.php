<?php
 class PrimerGrado
 {
   protected $numero1;
   protected $numero2;
   protected $resultado;

  public function __construct($numero1,$numero2)
   {
    
     $this->numero1=$numero1;
     $this->numero2=$numero2;
      
   }

    public  function suma()
    {
        $this->resultado = $this->numero1 + $this->numero2;
     
    }

    public function resta()
    {
       $this->resultado = $this->numero1 - $this->numero2;

    }

   public function getResultado()
    {
      return $this->resultado;
    }    


 }
?>