<?php

include_once'models/vehiculo.php';
include_once'models/empleado.php';

class EncargadoModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getVehiculos(){
        
        try{
            $items = [];

            $query = $this->db->connect()->query('SELECT * FROM vehiculo');

            while($row = $query->fetch()){
                $item = new Vehiculo();

                $item->id               = $row['id'];
                $item->marca            = $row['marca'];
                $item->modelo           = $row['modelo'];
                $item->patente          = $row['patente'];
                $item->nro_chasis       = $row['nro_chasis'];
                $item->nro_motor        = $row['nro_motor'];
                $item->anio_fabricacion  = $row['anio_fabricacion'];
                $item->service          = $row['service'];
                $item->kilometraje      = $row['kilometraje'];
                $item->max_combustible  = $row['max_combustible'];

                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
           
            
            return [];
        }
    }
    public function getById($id){

        $item = new Vehiculo();

        $query = $this->db->connect()->prepare("SELECT * FROM vehiculo where id = :id");
        try{
            $query->execute(['id' => $id]);

            while($row = $query->fetch()){

                $item->id              = $row['id'];
                $item->marca            = $row['marca'];
                $item->modelo           = $row['modelo'];
                $item->patente          = $row['patente'];
                $item->nro_chasis       = $row['nro_chasis'];
                $item->nro_motor        = $row['nro_motor'];
                $item->anio_fabricacion  = $row['anio_fabricacion'];
                $item->service          = $row['service'];
                $item->kilometraje      = $row['kilometraje'];
                $item->max_combustible  = $row['max_combustible'];
            }

            return $item;
        }catch(PDOException $e){
            return [];
        }

    }

    public function update($item){

        $query = $this->db->connect()->prepare("UPDATE vehiculo SET marca = :marca, modelo = :modelo, patente = :patente, nro_chasis = :nro_chasis, nro_motor = :nro_motor, anio_fabricacion = :anio_fabricacion, service = :service, kilometraje = :kilometraje, max_combustible = :max_combustible WHERE id = :id");

        try{
            $query->execute([
                'id' => $item['id'],
                'marca' => $item['marca'],
                'modelo' => $item['modelo'],
                'patente' => $item['patente'],
                'nro_chasis' => $item['nro_chasis'],
                'nro_motor' => $item['nro_motor'],
                'anio_fabricacion' => $item['anio_fabricacion'],
                'service' => $item['service'],
                'kilometraje' => $item['kilometraje'],
                'max_combustible' => $item['max_combustible']
            ]);
            
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function updateService($item){

        $query = $this->db->connect()->prepare("UPDATE vehiculo SET service = :service WHERE id = :id");

        try{
            $query->execute([
                'id' => $item['id'],
                'service' => $item['service']
            ]);
            
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare("DELETE FROM vehiculo WHERE id = :id");

        try{
            $query->execute([
                'id' => $id,
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function insertVehiculo($datos){
        
        try{

        $query = $this->db->connect()->prepare('INSERT INTO VEHICULO (marca,modelo,patente,nro_chasis,nro_motor,anio_fabricacion,service,kilometraje,max_combustible) VALUES (:marca, :modelo,:patente, :nro_chasis,:nro_motor,:anio_fabricacion,:service,:kilometraje,:max_combustible)');

        $query->execute(['marca' => $datos['marca'], 'modelo' => $datos['modelo'],'patente' => $datos['patente'], 'nro_chasis' => $datos['nro_chasis'],'nro_motor' => $datos['nro_motor'],'anio_fabricacion' => $datos['anio_fabricacion'],'service' => $datos['service'],'kilometraje' => $datos['kilometraje'],'max_combustible' => $datos['max_combustible']]);

         return true;
        }catch(PDOException $e){
           
            
            return false;
        }
        
    }

    public function getChoferesEnViaje(){
        
        try{
            $items = [];

            $query = $this->db->connect()->query('SELECT * FROM proforma LEFT JOIN empleado ON proforma.id_chofer=empleado.id where proforma.estado="en curso" GROUP BY proforma.id_chofer');
            

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

     public function getdatosByChofer($id_chofer){
       try{
             $items = [];

            $query = $this->db->connect()->prepare('SELECT * FROM datosviaje where id_chofer= :id_chofer and estado = 1');

            $query->execute(['id_chofer' => $id_chofer]);

            while($row = $query->fetch()){

                $latitud              = $row['latitud'];
                $longitud            = $row['longitud'];
            }
            
            $items[0] = $latitud;
            $items[1] = $longitud;
            
            return $items;
        }catch(PDOException $e){
          
            
            return [];
        }
    }
}
?>