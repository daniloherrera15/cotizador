<?php
 class Program
 {
  
   protected $fecha_ini;
   protected $fecha_fin;
   protected $interval;
   protected $lunes;
   protected $martes;
   protected $miercoles;
   protected $jueves;
   protected $viernes;
   protected $sabado;
   protected $domingo;
   protected $festivo;
   protected $asig;
   protected $day_sem;
   protected $tip_rel_fijo;
   protected $cadena_suprimida;
   protected $devolver_pos1;//devuelvo el número del día que tiene asignado el descanso, osea, el número 1
   
   


  public function __construct($fecha_ini1,$fecha_fin1)
   {
    
     $this->fecha_ini=$fecha_ini1;
     $this->fecha_fin=$fecha_fin1;
      
   }

 public function search_one()
  {
     if($this->lunes==1)
     {
      $this->devolver_pos1=1;
     }
    else
    {
       if($this->martes==1)
       {
        $this->devolver_pos1=2;
       }
       else
       {
         if($this->miercoles==1)
         {
          $this->devolver_pos1=3;
         }
         else
         {
           if($this->jueves==1)
           {
            $this->devolver_pos1=4;
           }
           else
           {
             if($this->viernes==1)
             {
              $this->devolver_pos1=5;
             }
             else
             {
               if($this->sabado==1)
               {
                $this->devolver_pos1=6;
               }
               else
               {
                 $this->devolver_pos1=0;
               }
             }
           }
         }
       }

    }

  }  

public function devuelve_dia_sem($dia_sem)
{
    switch ($dia_sem)
           {
                    case 0:
                     $this->day_sem ='DOMINGO';  
                    break;
                    case 1:
                     $this->day_sem ='LUNES';
                    break;
                    case 2:
                     $this->day_sem ='MARTES';
                    break;
                    case 3:
                     $this->day_sem ='MIERCOLES';
                    break;
                    case 4:
                     $this->day_sem ='JUEVES';
                    break;
                    case 5:
                     $this->day_sem ='VIERNES';
                    break;
                    case 6:
                     $this->day_sem ='SABADO';
                    break;
                     case 7:
                     $this->day_sem ='DOMINGO';
                    break;

           }
}
 

public  function dateDifference($date_1, $date_2,$differenceFormat)
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
   
    $interval1 = date_diff($datetime1, $datetime2);
    return $interval1->format($differenceFormat);
 
}

public function calcular_rango()
 {
    $this->interval= $this->dateDifference($this->fecha_ini,$this->fecha_fin,'%a');
 }

    
    public function getInterval()
    {
      return $this->interval;

    }

    public function sumar_dias($fecha,$cantidad)
    {
      $date = new DateTime($fecha);
      $date->add(new DateInterval('P'.$cantidad.'D'));
      return $date->format('Y-m-d') . "\n";
    }

    public function suprimir_caracteres($entrada)
     {
       $fech = explode("-",$entrada);
       $this->cadena_suprimida = $fech[0].$fech[1].$fech[2];
     }


 public function setDias($lun,$mar,$mier,$juev,$vier,$sab,$dom,$fest)
    {
        $this->lunes = $lun;
        $this->martes = $mar;
        $this->miercoles = $mier;
        $this->jueves = $juev;
        $this->viernes = $vier;
        $this->sabado = $sab;
        $this->domingo = $dom;
        $this->festivo = $fest;

    }

public function rotarDescanso($dia_desc)
{
   switch ($dia_desc) {
       case 0:
          $this->setDias(0,0,0,0,0,1,0,$this->festivo);
        break;

     
     case 1: //seteo lunes
         $this->setDias(0,0,0,0,0,0,1,$this->festivo);
     break;
     case 2:  //seteo martes
         $this->setDias(1,0,0,0,0,0,0,$this->festivo);
     break;
     case 3:  //seteo miercoles
         $this->setDias(0,1,0,0,0,0,0,$this->festivo);
     break;
     case 4:  //seteo jueves
         $this->setDias(0,0,1,0,0,0,0,$this->festivo);
     break;
     case 5:  //seteo viernes
         $this->setDias(0,0,0,1,0,0,0,$this->festivo);
     break;
     case 6:  //seteo sabado
         $this->setDias(0,0,0,0,1,0,0,$this->festivo);
     break;
     
     
   }
}

  public function setAsig($asig1)
    {
        $this->asig = $asig1;
     

    }
    
public function getLunes()
    {
      return $this->lunes;
    }

public function getMartes()
    {
      return $this->martes;
    }
public function getMiercoles()
    {
      return $this->miercoles;
    }
public function getJueves()
    {
      return $this->jueves;
    }
public function getViernes()
    {
      return $this->viernes;
    }
public function getSabado()
    {
      return $this->sabado;
    }
public function getDomingo()
    {
      return $this->domingo;
    }
public function getFestivo()
    {
      return $this->festivo;
    }

public function getAsig()
    {
      return $this->asig;
    }

public function getDiaSem()
    {
      return $this->day_sem;
    }

public function getRelFijo()
    {
      return $this->tip_rel_fijo;
    }

public function getPosOne()
    {
      return $this->devolver_pos1;
    }    

public function getCadenaSuprimida()
    {
      return $this->cadena_suprimida;
    }


public function asignar($dia_sem,$festivo_s_n,$tipo_asig)
  {
      if($tipo_asig == '1')
      {
        $this->tip_rel_fijo='FIJO';
      }
      else
      {
        $this->tip_rel_fijo='RELEVO'; 
      }
      

      if($festivo_s_n =='1')//se mira si es festivo
      {
        
          
          if($this->festivo == '1')
          {
            if($tipo_asig == '1')
              {
               $this->asig = 'DESCANSO';
              }
              else
              {
                $this->asig = 'EN_TURNO'; 
              }
          }
          else
          {
            if($tipo_asig=='1')
            {
              $this->asig = 'EN_TURNO'; 
            }

          }
          
      }
      else
      {//si no es festivo
          switch ($dia_sem)
           {
                case 0:
                      if($this->domingo=='0') //0 cuando no excluye el día en cuestion
                      {
                        if($tipo_asig == '1')//cuando es un turno fijo el que se va a asignar
                        {
                           $this->asig = 'EN_TURNO'; 
                        
                        }
                        else
                        {
                          $this->asig = 'DESCANSO';  
                        }  
                      
                      }
                      else
                      {//cuando excluye el dia en cuestion
                          
                        if($tipo_asig == '1')//cuando es un turno fijo el que se va a asignar
                        {
                           $this->asig = 'DESCANSO'; 
                        
                        }
                        else
                        {
                          $this->asig = 'EN_TURNO';  
                        }  

                      }
                    break;
                case 1:
                     if($this->lunes == '0') //0 cuando no excluye el día en cuestion
                      {
                        if($tipo_asig == '1')//cuando es un turno fijo el que se va a asignar
                        {
                           $this->asig = 'EN_TURNO'; 
                        
                        }
                        else
                        {
                          $this->asig = 'DESCANSO';  
                        }  
                      
                      }
                      else
                      {//cuando excluye el dia en cuestion
                          
                        if($tipo_asig == '1')//cuando es un turno fijo el que se va a asignar
                        {
                           $this->asig = 'DESCANSO'; 
                        
                        }
                        else
                        {
                          $this->asig = 'EN_TURNO';  
                        }  

                      }
                    break;
                case 2:
                     if($this->martes == '0') //0 cuando no excluye el día en cuestion
                      {
                        if($tipo_asig == '1')//cuando es un turno fijo el que se va a asignar
                        {
                           $this->asig = 'EN_TURNO'; 
                        
                        }
                        else
                        {
                          $this->asig = 'DESCANSO';  
                        }  
                      
                      }
                      else
                      {//cuando excluye el dia en cuestion
                          
                        if($tipo_asig == '1')//cuando es un turno fijo el que se va a asignar
                        {
                           $this->asig = 'DESCANSO'; 
                        
                        }
                        else
                        {
                          $this->asig = 'EN_TURNO';  
                        }  

                      }
                    break;
                  case 3:
                     if($this->miercoles == '0') //0 cuando no excluye el día en cuestion
                      {
                        if($tipo_asig == '1')//cuando es un turno fijo el que se va a asignar
                        {
                           $this->asig = 'EN_TURNO'; 
                        
                        }
                        else
                        {
                          $this->asig = 'DESCANSO';  
                        }  
                      
                      }
                      else
                      {//cuando excluye el dia en cuestion
                          
                        if($tipo_asig == '1')//cuando es un turno fijo el que se va a asignar
                        {
                           $this->asig = 'DESCANSO'; 
                        
                        }
                        else
                        {
                          $this->asig = 'EN_TURNO';  
                        }  

                      }
                    break;
                    case 4:
                     if($this->jueves == '0') //0 cuando no excluye el día en cuestion
                      {
                        if($tipo_asig == '1')//cuando es un turno fijo el que se va a asignar
                        {
                           $this->asig = 'EN_TURNO'; 
                        
                        }
                        else
                        {
                          $this->asig = 'DESCANSO';  
                        }  
                      }
                      else
                      {//cuando excluye el dia en cuestion
                          
                        if($tipo_asig == '1')//cuando es un turno fijo el que se va a asignar
                        {
                           $this->asig = 'DESCANSO'; 
                        
                        }
                        else
                        {
                          $this->asig = 'EN_TURNO';  
                        }  

                      }
                    break;
                    case 5:
                     if($this->viernes == '0') //0 cuando no excluye el día en cuestion
                      {
                        if($tipo_asig == '1')//cuando es un turno fijo el que se va a asignar
                        {
                           $this->asig = 'EN_TURNO'; 
                        
                        }
                        else
                        {
                          $this->asig = 'DESCANSO';  
                        }  
                      
                      }
                      else
                      {//cuando excluye el dia en cuestion
                          
                        if($tipo_asig == '1')//cuando es un turno fijo el que se va a asignar
                        {
                           $this->asig = 'DESCANSO'; 
                        
                        }
                        else
                        {
                          $this->asig = 'EN_TURNO';  
                        }  

                      }
                    break;
                    case 6:
                     if($this->sabado == '0') //0 cuando no excluye el día en cuestion
                      {
                        if($tipo_asig == '1')//cuando es un turno fijo el que se va a asignar
                        {
                           $this->asig = 'EN_TURNO'; 
                        
                        }
                        else
                        {
                          $this->asig = 'DESCANSO';  
                        }  
                      
                      }
                      else
                      {//cuando excluye el dia en cuestion
                          
                        if($tipo_asig == '1')//cuando es un turno fijo el que se va a asignar
                        {
                           $this->asig = 'DESCANSO'; 
                        
                        }
                        else
                        {
                          $this->asig = 'EN_TURNO';  
                        }  

                      }
                    break;
            }

         

      }
    
      
  }

 /* public function llenar($letra,$cantidad)
   {
     $i=1;
     while($i<=$cantidad)
     {
        $this->pivote=$this->pivote.$letra;
        
        $i++;
     }
   }



  public function llena_pivote()
   {
     if($this->inicio_turno =='1')
       {
         $this->llenar('D',$this->t_dia);
         $this->llenar('N',$this->t_noche);
         $this->llenar('X',$this->t_descanso);         
       }
       else
       {
         $this->llenar('N',$this->t_dia);
         $this->llenar('D',$this->t_noche);
         $this->llenar('X',$this->t_descanso);
         
       }

   }




    
    //cantidad de tuplas
    public function getPivote()
    {
      return $this->pivote;
    }


*/
 }



?>