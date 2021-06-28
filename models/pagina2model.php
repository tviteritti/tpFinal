<?php

class Pagina2Model extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        
        try{

        $query = $this->db->connect()->prepare('INSERT INTO empleado (dni,nombre,apellido,fecha_nac,usuario,password,email,rol) VALUES (:dni, :nombre,:apellido, :fecha_nac, :usuario, :password, :email, :rol)');

        $query->execute(['dni' => $datos['dni'], 'nombre' => $datos['nombre'], 'apellido' => $datos['apellido'], 'fecha_nac' => $datos['fecha_nac'], 'usuario' => $datos['usuario'], 'password' => $datos['password'], 'email' => $datos['email'], 'rol' => $datos['rol']]);

         return true;
        }catch(PDOException $e){
           
            
            return false;
        }
        
    }
}

?>