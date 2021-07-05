<?php

include_once'models/empleado.php';

class AdministradorModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        
        try{
            $items = [];

            $query = $this->db->connect()->query('SELECT * FROM empleado');

            while($row = $query->fetch()){
                $item = new Empleado();

                $item->id        = $row['id'];
                $item->dni       = $row['dni'];
                $item->nombre    = $row['nombre'];
                $item->apellido  = $row['apellido'];
                $item->fecha_nac = $row['fecha_nac'];
                $item->usuario   = $row['usuario'];
                $item->password  = $row['password'];
                $item->email     = $row['email'];
                $item->rol       = $row['rol'];

                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
           
            
            return [];
        }
        
    }

    public function getById($id){

        $item = new Empleado();

        $query = $this->db->connect()->prepare("SELECT * FROM empleado where id = :id");
        try{
            $query->execute(['id' => $id]);

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

    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE empleado SET dni = :dni, nombre = :nombre, apellido = :apellido, fecha_nac = :fecha_nac, usuario = :usuario, password = :password, email = :email, rol = :rol WHERE id = :id");

        try{
            $query->execute([
                'id' => $item['id'],
                'dni' => $item['dni'],
                'nombre' => $item['nombre'],
                'apellido' => $item['apellido'],
                'fecha_nac' => $item['fecha_nac'],
                'usuario' => $item['usuario'],
                'password' => $item['password'],
                'email' => $item['email'],
                'rol' => $item['rol']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare("DELETE FROM empleado WHERE id = :id");

        try{
            $query->execute([
                'id' => $id,
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}

?>