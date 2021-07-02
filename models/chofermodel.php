<?php

include_once'models/proforma.php';

class choferModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getProformaPorSession($idUserSession){
        
        try{
            $items = [];

            $query = $this->db->connect()->prepare('SELECT * FROM proforma where id_chofer= :idUserSession');

            $query->execute(['idUserSession' => $idUserSession]);

            while($row = $query->fetch()){
                $item = new Proforma();

                $item->numero               = $row['numero'];
                $item->fecha                = $row['fecha'];
                $item->id_viaje             = $row['id_viaje'];
                $item->id_carga             = $row['id_carga'];
                $item->id_costeo_estimado   = $row['id_costeo_estimado'];
                $item->id_chofer            = $row['id_chofer'];


                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
           
            
            return [];
        }
        
    }

    public function insertCosteo($datos){
        
        try{

        $query = $this->db->connect()->prepare('UPDATE costeoreal SET kilometros_r=:kilometros_r,combustible_r=:combustible_r,viaticos_r=:viaticos_r,peajes_pesajes_r=:peajes_pesajes_r,extras_r=:extras_r,hazard_r=:hazard_r,reefer_r=:reefer_r,fee_r=:fee_r,ETD_r=:ETD_r,ETA_r=:ETA_r,total_r=:total_r where id= :numero');

        $query->execute(['kilometros_r' => $datos['kilometros_r'],'combustible_r' => $datos['combustible_r'],'viaticos_r' => $datos['viaticos_r'],'peajes_pesajes_r' => $datos['peajes_pesajes_r'],'extras_r' => $datos['extras_r'],'hazard_r' => $datos['hazard_r'],'reefer_r' => $datos['reefer_r'],'fee_r' => $datos['fee_r'],'ETD_r' => $datos['ETD_r'],'ETA_r' => $datos['ETA_r'],'total_r' => $datos['total_r'],'numero' => $datos['numero']]);


       
         return true;
        }catch(PDOException $e){
           
            
            return false;
        }
        
    }

    public function getProformaById($numero){

        $item = new Proforma();

        $query = $this->db->connect()->prepare("SELECT * FROM proforma where numero = :numero");
        try{
            $query->execute(['numero' => $numero]);

            while($row = $query->fetch()){
                $item->numero                = $row['numero'];
                $item->fecha                 = $row['fecha'];
                $item->id_viaje              = $row['id_viaje'];
                $item->id_carga              = $row['id_carga'];
                $item->id_costeo_estimado    = $row['id_costeo_estimado'];
                $item->id_costeo_real    = $row['id_costeo_real'];
                $item->id_chofer             = $row['id_chofer'];
            }

            $query = $this->db->connect()->prepare("SELECT * FROM viaje where id = :id_viaje");
            $query->execute(['id_viaje' => $item->id_viaje]);

            while($row = $query->fetch()){
                $item->origen          = $row['origen'];
                $item->destino       = $row['destino'];
                $item->fecha_carga     = $row['fecha_carga'];
                $item->ETA          = $row['ETA'];
            }

            $query = $this->db->connect()->prepare("SELECT * FROM costeoestimado where id = :id_costeo_estimado");
            $query->execute(['id_costeo_estimado' => $item->id_costeo_estimado]);

            while($row = $query->fetch()){
                $item->kilometros_e          = $row['kilometros_e'];
                $item->combustible_e     = $row['combustible_e'];
                $item->ETD_e          = $row['ETD_e'];
                $item->ETA_e     = $row['ETA_e'];
                $item->viaticos_e          = $row['viaticos_e'];
                $item->peajes_pesajes_e     = $row['peajes_pesajes_e'];
                $item->extras_e          = $row['extras_e'];
                $item->hazard_e     = $row['hazard_e'];
                $item->reefer_e          = $row['reefer_e'];
                $item->fee_e     = $row['fee_e'];
            }

            $query = $this->db->connect()->prepare("SELECT * FROM costeoreal where id = :id_costeo_real");
            $query->execute(['id_costeo_real' => $item->id_costeo_real]);

            while($row = $query->fetch()){
                $item->kilometros_r          = $row['kilometros_r'];
                $item->combustible_r     = $row['combustible_r'];
                $item->ETD_r          = $row['ETD_r'];
                $item->ETA_r     = $row['ETA_r'];
                $item->viaticos_r          = $row['viaticos_r'];
                $item->peajes_pesajes_r     = $row['peajes_pesajes_r'];
                $item->extras_r          = $row['extras_r'];
                $item->hazard_r     = $row['hazard_r'];
                $item->reefer_r          = $row['reefer_r'];
                $item->fee_r     = $row['fee_r'];
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

    public function getVehiculoById($id_vehiculo){

         $item = new Proforma();

        $query = $this->db->connect()->prepare("SELECT * FROM vehiculo where id = :id_vehiculo");
        try{
            $query->execute(['id_vehiculo' => $id_vehiculo]);

            while($row = $query->fetch()){
                $item->id                = $row['id'];
                $item->marca             = $row['marca'];
                $item->modelo            = $row['modelo'];
                $item->patente           = $row['patente'];
                $item->nro_chasis        = $row['nro_chasis'];
                $item->nro_motor         = $row['nro_motor'];
                $item->año_fabricacion   = $row['año_fabricacion'];
                $item->service           = $row['service'];
                $item->kilometraje       = $row['kilometraje'];
                $item->max_combustible   = $row['max_combustible'];
            }

           return $item;
        }catch(PDOException $e){
            return [];
        }

    }
?>    