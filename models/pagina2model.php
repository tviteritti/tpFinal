<?php

class Pagina2Model extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        
        try{

        $query = $this->db->connect()->prepare('INSERT INTO empleado (dni,nombre,apellido,fecha_nac,usuario,password,email,hash) VALUES (:dni, :nombre,:apellido, :fecha_nac, :usuario, :password, :email, :hash)');

        $query->execute(['dni' => $datos['dni'], 'nombre' => $datos['nombre'], 'apellido' => $datos['apellido'], 'fecha_nac' => $datos['fecha_nac'], 'usuario' => $datos['usuario'], 'password' => $datos['password'], 'email' => $datos['email'], 'hash' => $datos['hash']]);

         return true;
        }catch(PDOException $e){
           
            
            return false;
        }
        
    }
}

?>