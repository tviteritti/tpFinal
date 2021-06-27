<?php

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

        $query = $this->db->connect()->prepare('INSERT INTO COSTEO (kilometros_e,kilometros_r,combustible_e,combustible_r, etd_e,etd_r,eta_e,eta_r,viaticos_e,viaticos_r,peajes_pesajes_e,peajes_pesajes_r,extras_e,extras_r,hazard_e,hazard_r,reefer_e,reefer_r,fee_e,fee_r) VALUES (:kilometros_e, :kilometros_r,:combustible_e, :combustible_r,:etd_e, :etd_r,:eta_e, :eta_r,:viaticos_e, :viaticos_r,:peajes_pesajes_e, :peajes_pesajes_r,:extra_e, :extra_r,:hazard_e, :hazard_r,:reefer_e, :reefer_r,:fee_e, :fee_r)');

        $query->execute(['kilometros_e' => $datos['kilometros_e'], 'kilometros_r' => $datos['kilometros_r'], 'combustible_e' => $datos['combustible_e'], 'combustible_r' => $datos['combustible_r'],'etd_e' => $datos['etd_e'], 'etd_r' => $datos['etd_r'], 'eta_e' => $datos['eta_e'], 'eta_r' => $datos['eta_r'],'viaticos_e' => $datos['viaticos_e'], 'viaticos_r' => $datos['viaticos_r'], 'peajes_pesajes_e' => $datos['peajes_pesajes_e'], 'peajes_pesajes_r' => $datos['peajes_pesajes_r'],'extra_e' => $datos['extra_e'], 'extra_r' => $datos['extra_r'], 'hazard_e' => $datos['hazard_e'], 'hazard_r' => $datos['hazard_r'],'reefer_e' => $datos['reefer_e'], 'reefer_r' => $datos['reefer_r'], 'fee_e' => $datos['fee_e'], 'fee_r' => $datos['fee_r']]);

         return true;
        }catch(PDOException $e){
           
            
            return false;
        }
        
    }
    public function insertProforma($datos){
        
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