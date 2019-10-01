<?php
session_start();
  include('conectar.php');
  include('crud.php');
  class Usuario{
    private $usuario_apellidos;
    private $usuario_nombres;
    private $conexion;
    private $crud;
    private $tupla;
    private $usuario_id;
    private $usuario_roll;
    public function login($nick,$password_usu,$server,$user,$password,$dbname){
	    	
	    	$this->conexion = new Coneccion($server,$user,$password,$dbname);
	    	$this->conexion->conectar();
	    	$this->conexion->getConection();
	        $this->crud = new Crud();
	    	$this->crud->setConsulta("select c_usuario.usuario_id,c_usuario.usuario_apellido,c_usuario.usuario_nombre,roll.roll_descrip from c_usuario join usuario_roll on(c_usuario.usuario_id= usuario_roll.usuario_id) join roll on (roll.roll_id = usuario_roll.roll_id) where usuario_nick= '$nick' and usuario_password = '$password_usu' ");
	        $this->tupla=$this->crud->seleccionar($this->conexion->getConection());
            
            if($nick =='' || $password =='')
            {
                $array = [
					    "apellidos" => '',
					    "nombres" => '',
					    "codigo" => "2",
					    "id"=>'',
					    "respuesta"=>'Los campos de usuario y contraseña no deben ir vacíos.',
					];
            }
            else
            {

                 if(sizeof($this->tupla)>0)
		            {
		              foreach ($this->tupla as $key => $value) {
			                $array = [
							    "apellidos" => $value['usuario_apellido'],
							    "nombres" => $value['usuario_nombre'],
							    "id"=>$value['usuario_id'],
							    "codigo" => "0",
							    "respuesta"=>'No Hay Error.',
							];
		                  $this->usuario_id=$value['usuario_id'];
		                  $this->usuario_apellidos=$value['usuario_apellido'];
		                  $this->usuario_nombres = $value['usuario_nombre'];
		                  $this->usuario_roll = $value['roll_descrip'];
		                }  
		                $_SESSION['user_authorized'] = true;
		                $_SESSION['user_id']=$this->usuario_id;
		                $_SESSION['nom']=$this->usuario_nombres;
		                $_SESSION['apel']=$this->usuario_apellidos;
		                $_SESSION['rol']=$this->usuario_roll;


		            }
		            else
		            {
		            	 $array = [
							    "respuesta" => 'Usuario o contraseña incorrecta.',
							    "codigo" => "1",
							    "apellidos"=>'',
							    "id"=>'',
							    "nombres"=>'',
							];
		            }

            }

           
    
         return $array;   
         $this->conexion->desconectar();
    }


    public function getMenues($id,$server,$user,$password,$dbname)
    {
        $this->conexion = new Coneccion($server,$user,$password,$dbname);
	    	$this->conexion->conectar();
	    	$this->conexion->getConection();
	        $this->crud = new Crud();
	    	$this->crud->setConsulta("select m.menu_descrip,m.menu_html,m.menu_id
									 from c_usuario as usu 
									 join usuario_roll as usur on(usu.usuario_id=usur.usuario_id)
									 join roll as r on(usur.roll_id=r.roll_id)
									 join roll_menu as rm on(rm.roll_id= r.roll_id)
									 join menu as m on(rm.menu_id=m.menu_id)
									 where  m.menu_html <>'' and  usu.usuario_id=".$id);
	        $this->tupla=$this->crud->seleccionar($this->conexion->getConection());
            
              if(sizeof($this->tupla)>0)
		            {
		               $array = $this->tupla;
		 
		            }
		            else
		            {
		            	 $array = [
							    "descripcion" => '',
							    "html" => '',
							    "id"=>'',
							    "codigo" => "3",
							    "respuesta"=>'No hay registros asociados a la consulta',
							];
		            }

           
    
		         return $array;   
		         $this->conexion->desconectar();
    }



  }
?>