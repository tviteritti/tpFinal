<?php

include_once'models/empleado.php';
include_once'models/proforma.php';

class SupervisorModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insertViaje($datos){
        
        try{

        $query = $this->db->connect()->prepare('INSERT INTO VIAJE (origen,destino, fecha_carga, ETA) VALUES (:origen, :destino, :fecha_carga, :ETA)');

        $query->execute(['origen' => $datos['origen'], 'destino' => $datos['destino'], 'fecha_carga' => $datos['fecha_carga'], 'ETA' => $datos['ETA']]);

        
         return true;
        }catch(PDOException $e){
           
            
            return false;
        }
        
    }

    public function insertCarga($datos){
        
        try{

        $query = $this->db->connect()->prepare('INSERT INTO CARGA (tipo, peso_neto, hazard, reefer) VALUES (:tipo, :peso_neto, :hazard, :reefer)');

        $query->execute(['tipo' => $datos['tipo'], 'peso_neto' => $datos['peso_neto'], 'hazard' => $datos['hazard'], 'reefer' => $datos['reefer']]);

        
         return true;
        }catch(PDOException $e){
           
            
            return false;
        }
        
    }
    public function insertCosteo($datos){
        
        try{

        $query = $this->db->connect()->prepare('INSERT INTO COSTEO (kilometros_e,kilometros_r,combustible_e,combustible_r, ETD_e,ETD_r,ETA_e,ETA_r,viaticos_e,viaticos_r,peajes_pesajes_e,peajes_pesajes_r,extras_e,extras_r,hazard_e,hazard_r,reefer_e,reefer_r,fee_e,fee_r,total_e,total_r) VALUES (:kilometros_e, :kilometros_r,:combustible_e, :combustible_r,:ETD_e, :ETD_r,:ETA_e, :ETA_r,:viaticos_e, :viaticos_r,:peajes_pesajes_e, :peajes_pesajes_r,:extras_e, :extras_r,:hazard_e, :hazard_r,:reefer_e, :reefer_r,:fee_e, :fee_r, :total_e,:total_r)');

        $query->execute(['kilometros_e' => $datos['kilometros_e'], 'kilometros_r' => $datos['kilometros_r'], 'combustible_e' => $datos['combustible_e'], 'combustible_r' => $datos['combustible_r'],'ETD_e' => $datos['ETD_e'], 'ETD_r' => $datos['ETD_r'], 'ETA_e' => $datos['ETA_e'], 'ETA_r' => $datos['ETA_r'],'viaticos_e' => $datos['viaticos_e'], 'viaticos_r' => $datos['viaticos_r'], 'peajes_pesajes_e' => $datos['peajes_pesajes_e'], 'peajes_pesajes_r' => $datos['peajes_pesajes_r'],'extras_e' => $datos['extras_e'], 'extras_r' => $datos['extras_r'], 'hazard_e' => $datos['hazard_e'], 'hazard_r' => $datos['hazard_r'],'reefer_e' => $datos['reefer_e'], 'reefer_r' => $datos['reefer_r'], 'fee_e' => $datos['fee_e'], 'fee_r' => $datos['fee_r'],'total_e' => $datos['total_e'],'total_r' => $datos['total_r']]);

       
         return true;
        }catch(PDOException $e){
           
            
            return false;
        }
        
    }
    public function insertProforma($datos){
        
        try{

        $query = $this->db->connect()->prepare('INSERT INTO PROFORMA (fecha,id_viaje,id_carga,id_costeo,id_chofer) VALUES (:fecha, :id_viaje,:id_carga, :id_costeo,:id_chofer)');

        $query->execute(['fecha' => $datos['fecha'], 'id_viaje' => $datos['id_viaje'],'id_carga' => $datos['id_carga'], 'id_costeo' => $datos['id_costeo'],'id_chofer' => $datos['id_chofer']]);

         return true;
        }catch(PDOException $e){
           
            
            return false;
        }
        
    }

    public function getChoferes(){
        
        try{
            $items = [];

            $query = $this->db->connect()->query('SELECT * FROM empleado where rol="chofer"');

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

    public function getNroProforma(){
        
        try{
            $nro = 0;

            $query = $this->db->connect()->query('SELECT MAX(numero) FROM proforma');

            while($row = $query->fetch()){
                $nro      = $row[0];
            }
            return $nro;
        }catch(PDOException $e){
           
            
            return 0;
        }
        
    }

    public function getProforma(){
        
        try{
            $items = [];

            $query = $this->db->connect()->query('SELECT * FROM proforma');

            while($row = $query->fetch()){
                $item = new Empleado();

                $item->numero        = $row['numero'];
                $item->fecha       = $row['fecha'];
                $item->id_viaje    = $row['id_viaje'];
                $item->id_carga  = $row['id_carga'];
                $item->id_costeo   = $row['id_costeo'];
                $item->id_chofer  = $row['id_chofer'];


                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
           
            
            return [];
        }
        
    }

    public function getProformaById($numero){

        $item = new Proforma();

        $query = $this->db->connect()->prepare("SELECT * FROM proforma where numero = :numero");
        try{
            $query->execute(['numero' => $numero]);

            while($row = $query->fetch()){
                $item->numero           = $row['numero'];
                $item->fecha          = $row['fecha'];
                $item->id_viaje       = $row['id_viaje'];
                $item->id_carga     = $row['id_carga'];
                $item->id_costeo    = $row['id_costeo'];
                $item->id_chofer      = $row['id_chofer'];
            }

            $query = $this->db->connect()->prepare("SELECT * FROM viaje where id = :id_viaje");
            $query->execute(['id_viaje' => $item->id_viaje]);

            while($row = $query->fetch()){
                $item->origen          = $row['origen'];
                $item->destino       = $row['destino'];
                $item->fecha_carga     = $row['fecha_carga'];
                $item->ETA          = $row['ETA'];
            }

            $query = $this->db->connect()->prepare("SELECT * FROM costeo where id = :id_costeo");
            $query->execute(['id_costeo' => $item->id_costeo]);

            while($row = $query->fetch()){
                $item->kilometros_e          = $row['kilometros_e'];
                $item->kilometros_r       = $row['kilometros_r'];
                $item->combustible_e     = $row['combustible_e'];
                $item->combustible_r          = $row['combustible_r'];
                $item->ETD_e          = $row['ETD_e'];
                $item->ETD_r       = $row['ETD_r'];
                $item->ETA_e     = $row['ETA_e'];
                $item->ETA_r          = $row['ETA_r'];
                $item->viaticos_e          = $row['viaticos_e'];
                $item->viaticos_r       = $row['viaticos_r'];
                $item->peajes_pesajes_e     = $row['peajes_pesajes_e'];
                $item->peajes_pesajes_r          = $row['peajes_pesajes_r'];
                $item->extras_e          = $row['extras_e'];
                $item->extras_r       = $row['extras_r'];
                $item->hazard_e     = $row['hazard_e'];
                $item->hazard_r          = $row['hazard_r'];
                $item->reefer_e          = $row['reefer_e'];
                $item->reefer_r       = $row['reefer_r'];
                $item->fee_e     = $row['fee_e'];
                $item->fee_r          = $row['fee_r'];
            }

            $query = $this->db->connect()->prepare("SELECT * FROM carga where id = :id_carga");
            $query->execute(['id_carga' => $item->id_carga]);

            while($row = $query->fetch()){
                $item->tipo          = $row['tipo'];
                $item->peso_neto       = $row['peso_neto'];
                $item->hazard     = $row['hazard'];
                $item->reefer          = $row['reefer'];
            }


            return $item;
        }catch(PDOException $e){
            return [];
        }

    }

    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE proforma SET fecha = :fecha, id_viaje = :id_viaje, id_carga = :id_carga, id_costeo = :id_costeo, id_chofer = :id_chofer WHERE numero = :numero");

        try{
            $query->execute([
                'numero' => $item['numero'],
                'fecha' => $item['fecha'],
                'id_viaje' => $item['id_viaje'],
                'id_carga' => $item['id_carga'],
                'id_costeo' => $item['id_costeo'],
                'id_chofer' => $item['id_chofer'],

            ]);

        $query = $this->db->connect()->prepare("UPDATE carga SET tipo = :tipo, peso_neto = :peso_neto, hazard = :hazard, reefer = :reefer WHERE id = :id_carga");
        
        $query->execute([
                'tipo' => $item['tipo'],
                'peso_neto' => $item['peso_neto'],
                'hazard' => $item['hazard'],
                'reefer' => $item['reefer'],
                'id_carga' => $item['id_carga'],

        ]);

        $query = $this->db->connect()->prepare("UPDATE viaje SET origen = :origen, destino = :destino, fecha_carga = :fecha_carga, ETA = :ETA WHERE id = :id_viaje");
        
        $query->execute([
                'origen' => $item['origen'],
                'destino' => $item['destino'],
                'fecha_carga' => $item['fecha_carga'],
                'ETA' => $item['ETA'],
                'id_viaje' => $item['id_viaje'],

        ]);

        $query = $this->db->connect()->prepare("UPDATE costeo SET kilometros_e = :kilometros_e, kilometros_r = :kilometros_r, combustible_e = :combustible_e, combustible_r = :combustible_r, ETD_e = :ETD_e, ETD_r = :ETD_r, ETA_e = :ETA_e, ETA_r = :ETA_r, viaticos_e = :viaticos_e, viaticos_r = :viaticos_r, peajes_pesajes_e = :peajes_pesajes_e, peajes_pesajes_r = :peajes_pesajes_r, extras_e = :extras_e, extras_r = :extras_r, hazard_e = :hazard_e, hazard_r = :hazard_r, reefer_e = :reefer_e, reefer_r = :reefer_r, fee_e = :fee_e, fee_r = :fee_r, total_e = :total_e, total_r = :total_r WHERE id = :id_costeo");
        
        $query->execute([
                'kilometros_e' => $item['kilometros_e'],
                'kilometros_r' => $item['kilometros_r'],
                'combustible_e' => $item['combustible_e'],
                'combustible_r' => $item['combustible_r'],
                'ETD_e' => $item['ETD_e'],
                'ETD_r' => $item['ETD_r'],
                'ETA_e' => $item['ETA_e'],
                'ETA_r' => $item['ETA_r'],
                'viaticos_e' => $item['viaticos_e'],
                'viaticos_r' => $item['viaticos_r'],
                'peajes_pesajes_e' => $item['peajes_pesajes_e'],
                'peajes_pesajes_r' => $item['peajes_pesajes_r'],
                'extras_e' => $item['extras_e'],
                'extras_r' => $item['extras_r'],
                'hazard_e' => $item['hazard_e'],
                'hazard_r' => $item['hazard_r'],
                'reefer_e' => $item['reefer_e'],
                'reefer_r' => $item['reefer_r'],
                'fee_e' => $item['fee_e'],
                'fee_r' => $item['fee_r'],
                'total_e' => $item['total_e'],
                'total_r' => $item['total_r'],
                'id_costeo' => $item['id_costeo'],

        ]);
            

            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($numero){


        $item = new Proforma();

        $query = $this->db->connect()->prepare("SELECT * FROM proforma where numero = :numero");
        try{
            $query->execute(['numero' => $numero]);

            while($row = $query->fetch()){
                $item->numero           = $row['numero'];
                $item->fecha          = $row['fecha'];
                $item->id_viaje       = $row['id_viaje'];
                $item->id_carga     = $row['id_carga'];
                $item->id_costeo    = $row['id_costeo'];
                $item->id_chofer      = $row['id_chofer'];
            }

        $query = $this->db->connect()->prepare("DELETE FROM proforma WHERE numero = :numero");

        
            $query->execute([
                'numero' => $numero,
            ]);

        $query = $this->db->connect()->prepare("DELETE FROM viaje WHERE id = :id_viaje");
            $query->execute([
                'id_viaje' => $item->id_viaje,
            ]);
        $query = $this->db->connect()->prepare("DELETE FROM carga WHERE id = :id_carga");
            $query->execute([
                'id_carga' => $item->id_carga,
            ]);
        $query = $this->db->connect()->prepare("DELETE FROM costeo WHERE id = :id_costeo");
            $query->execute([
                'id_costeo' => $item->id_costeo,
            ]);

            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}

?>