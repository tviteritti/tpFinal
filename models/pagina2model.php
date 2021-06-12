<?php

class Pagina2Model extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        
        try{

        $query = $this->db->connect()->prepare('INSERT INTO LOGIN (USER,PASSWORD) VALUES (:user, :password)');

        $query->execute(['user' => $datos['user'], 'password' => $datos['password']]);

         return true;
        }catch(PDOException $e){
           
            
            return false;
        }
        
    }
}

?>