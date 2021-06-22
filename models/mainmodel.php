<?php

include_once'models/empleado.php';

class MainModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function start($datos){
        
        try{

        $query = $this->db->connect()->prepare('INSERT INTO LOGIN (USER,PASSWORD) VALUES (:user, :password)');

        $query->execute(['user' => $datos['user'], 'password' => $datos['password']]);

         return true;
        }catch(PDOException $e){
           
            
            return false;
        }
        
    }

    public function getByUser($usuario){

        $item = new Empleado();

        $query = $this->db->connect()->prepare("SELECT * FROM empleado where usuario = :usuario");
        try{
            $query->execute(['usuario' => $usuario]);

            while($row = $query->fetch()){
                $item->id           = $row['id'];
                $item->dni          = $row['dni'];
                $item->nombre       = $row['nombre'];
                $item->apellido     = $row['apellido'];
                $item->fecha_nac    = $row['fecha_nac'];
                $item->usuario      = $row['usuario'];
                $item->password     = $row['password'];
                $item->email        = $row['email'];
                $item->rol          = $row['rol'];
            }

            return $item;
        }catch(PDOException $e){
            return [];
        }

    }
}

?>