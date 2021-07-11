<?php

include_once'models/empleado.php';
include_once'models/vehiculo.php';
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

        $query = $this->db->connect()->prepare('INSERT INTO costeoestimado (kilometros_e,combustible_e,viaticos_e,peajes_pesajes_e,extras_e,hazard_e,reefer_e,fee_e,ETD_e,ETA_e,total_e) VALUES (:kilometros_e,:combustible_e,:viaticos_e,:peajes_pesajes_e,:extras_e,:hazard_e,:reefer_e,:fee_e,:ETD_e,:ETA_e,:total_e)');

        $query->execute(['kilometros_e' => $datos['kilometros_e'],'combustible_e' => $datos['combustible_e'],'viaticos_e' => $datos['viaticos_e'],'peajes_pesajes_e' => $datos['peajes_pesajes_e'],'extras_e' => $datos['extras_e'],'hazard_e' => $datos['hazard_e'],'reefer_e' => $datos['reefer_e'],'fee_e' => $datos['fee_e'],'ETD_e' => $datos['ETD_e'],'ETA_e' => $datos['ETA_e'],'total_e' => $datos['total_e']]);

        $query = $this->db->connect()->prepare('INSERT INTO costeoreal (kilometros_r,) VALUES (:kilometros_r)');

        $query->execute(['kilometros_r' => 0]);

       
         return true;
        }catch(PDOException $e){
           
            
            return false;
        }
        
    }
    public function insertCosteoReal($datos){
        
        try{

        $query = $this->db->connect()->prepare('INSERT INTO costeoreal (kilometros_r) VALUES (:kilometros_r)');

        $query->execute(['kilometros_r' =>  $datos['kilometros_r']]);

       
         return true;
        }catch(PDOException $e){
           
            
            return false;
        }
        
    }
    public function insertProforma($datos){
        
        try{

        $query = $this->db->connect()->prepare('INSERT INTO PROFORMA (fecha,id_viaje,id_carga,id_costeo_estimado,id_chofer,id_vehiculo,id_costeo_real,estado) VALUES (:fecha, :id_viaje,:id_carga, :id_costeo_estimado,:id_chofer,:id_vehiculo,:id_costeo_real,:estado)');

        $query->execute(['fecha' => $datos['fecha'], 'id_viaje' => $datos['id_viaje'],'id_carga' => $datos['id_carga'], 'id_costeo_estimado' => $datos['id_costeo_estimado'],'id_chofer' => $datos['id_chofer'],'id_vehiculo' => $datos['id_vehiculo'],'id_costeo_real' => $datos['id_costeo_real'],'estado' => $datos['estado']]);

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
                $item = new Proforma();

                $item->id                   = $row['id'];
                $item->kilometros           = $row['kilometros'];
                $item->combustible          = $row['combustible'];
                $item->combustible_usado    = $row['combustible_usado'];
                $item->kilometros_usado     = $row['kilometros_usado'];
                $item->latitud              = $row['latitud'];
                $item->longitud             = $row['longitud'];
                $item->combustible_comprado = $row['combustible_comprado'];
                


                array_push($items, $item);
            }
            
            return $items;
        }catch(PDOException $e){
          
            
            return [];
        }
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
                $item->max_combustible      = $row['max_combustible'];

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
                $item = new Proforma();

                $item->numero               = $row['numero'];
                $item->fecha                = $row['fecha'];
                $item->id_viaje             = $row['id_viaje'];
                $item->id_carga             = $row['id_carga'];
                $item->id_costeo_estimado   = $row['id_costeo_estimado'];
                $item->id_chofer            = $row['id_chofer'];
                $item->id_vehiculo           = $row['id_vehiculo'];


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
                $item->numero                = $row['numero'];
                $item->fecha                 = $row['fecha'];
                $item->id_viaje              = $row['id_viaje'];
                $item->id_carga              = $row['id_carga'];
                $item->id_costeo_estimado    = $row['id_costeo_estimado'];
                $item->id_chofer             = $row['id_chofer'];
                $item->id_vehiculo             = $row['id_vehiculo'];
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

        public function getProformaCompletaById($numero){

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
                $item->id_costeo_real       = $row['id_costeo_real'];
                $item->id_chofer             = $row['id_chofer'];
                $item->id_vehiculo             = $row['id_vehiculo'];
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
                $item->total_e     = ($row['combustible_e']*200) + $row['viaticos_e'] + $row['peajes_pesajes_e'] + $row['extras_e'] + $row['hazard_e'] + $row['reefer_e'] + $row['fee_e'];
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
                $item->total_r     = ($row['combustible_r']*200) + $row['viaticos_r'] + $row['peajes_pesajes_r'] + $row['extras_r'] + $row['hazard_r'] + $row['reefer_r'] + $row['fee_r'];
            }

            $query = $this->db->connect()->prepare("SELECT * FROM carga where id = :id_carga");
            $query->execute(['id_carga' => $item->id_carga]);

            while($row = $query->fetch()){
                $item->tipo          = $row['tipo'];
                $item->peso_neto       = $row['peso_neto'];
                $item->hazard     = $row['hazard'];
                $item->reefer          = $row['reefer'];
            }

             

            $query = $this->db->connect()->prepare("SELECT * FROM vehiculo where id = :id_vehiculo");
            $query->execute(['id_vehiculo' => $item->id_vehiculo]);

            while($row = $query->fetch()){
                $item->marca            = $row['marca'];
                $item->modelo           = $row['modelo'];
                $item->patente          = $row['patente'];
                $item->nro_chasis       = $row['nro_chasis'];
                $item->nro_motor        = $row['nro_motor'];
                $item->anio_fabricacion  = $row['anio_fabricacion'];
                $item->service          = $row['service'];
                $item->kilometraje      = $row['kilometraje'];
                $item->max_combustible      = $row['max_combustible'];
            }

            $query = $this->db->connect()->prepare("SELECT * FROM empleado where id = :id_chofer");
            $query->execute(['id_chofer' => $item->id_chofer]);

            while($row = $query->fetch()){
                $item->dni       = $row['dni'];
                $item->nombre    = $row['nombre'];
                $item->apellido  = $row['apellido'];
                $item->fecha_nac = $row['fecha_nac'];
                $item->usuario   = $row['usuario'];
                $item->password  = $row['password'];
                $item->email     = $row['email'];
                $item->rol       = $row['rol'];
            }


            return $item;
        }catch(PDOException $e){
            return [];
        }

    }

    public function getProformaCompleta(){

        $item = new Proforma();

        $query = $this->db->connect()->query("SELECT * FROM proforma");
        try{
            

            while($row = $query->fetch()){
                $item->numero                = $row['numero'];
                $item->fecha                 = $row['fecha'];
                $item->id_viaje              = $row['id_viaje'];
                $item->id_carga              = $row['id_carga'];
                $item->id_costeo_estimado    = $row['id_costeo_estimado'];
                $item->id_costeo_real       = $row['id_costeo_real'];
                $item->id_chofer             = $row['id_chofer'];
                $item->id_vehiculo             = $row['id_vehiculo'];
            }

            $query = $this->db->connect()->query("SELECT * FROM viaje");

            while($row = $query->fetch()){
                $item->origen          = $row['origen'];
                $item->destino       = $row['destino'];
                $item->fecha_carga     = $row['fecha_carga'];
                $item->ETA          = $row['ETA'];
            }

            $query = $this->db->connect()->query("SELECT * FROM costeoestimado ");

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

            $query = $this->db->connect()->query("SELECT * FROM costeoreal");

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

            $query = $this->db->connect()->query("SELECT * FROM carga");

            while($row = $query->fetch()){
                $item->tipo          = $row['tipo'];
                $item->peso_neto       = $row['peso_neto'];
                $item->hazard     = $row['hazard'];
                $item->reefer          = $row['reefer'];
            }

             

            $query = $this->db->connect()->query("SELECT * FROM vehiculo");

            while($row = $query->fetch()){
                $item->marca            = $row['marca'];
                $item->modelo           = $row['modelo'];
                $item->patente          = $row['patente'];
                $item->nro_chasis       = $row['nro_chasis'];
                $item->nro_motor        = $row['nro_motor'];
                $item->anio_fabricacion  = $row['anio_fabricacion'];
                $item->service          = $row['service'];
                $item->kilometraje      = $row['kilometraje'];
            }

            $query = $this->db->connect()->query("SELECT * FROM empleado");

            while($row = $query->fetch()){
                $item->dni       = $row['dni'];
                $item->nombre    = $row['nombre'];
                $item->apellido  = $row['apellido'];
                $item->fecha_nac = $row['fecha_nac'];
                $item->usuario   = $row['usuario'];
                $item->password  = $row['password'];
                $item->email     = $row['email'];
                $item->rol       = $row['rol'];
            }


            return $item;
        }catch(PDOException $e){
            return [];
        }

    }

    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE proforma SET fecha = :fecha, id_viaje = :id_viaje, id_carga = :id_carga, id_costeo_estimado = :id_costeo_estimado, id_chofer = :id_chofer, id_vehiculo = :id_vehiculo WHERE numero = :numero");

        try{
            $query->execute([
                'numero'             => $item['numero'],
                'fecha'              => $item['fecha'],
                'id_viaje'           => $item['id_viaje'],
                'id_carga'           => $item['id_carga'],
                'id_costeo_estimado' => $item['id_costeo_estimado'],
                'id_chofer'          => $item['id_chofer'],
                'id_vehiculo'        => $item['id_vehiculo'],

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
        
        $query = $this->db->connect()->prepare("UPDATE costeoestimado SET kilometros_e = :kilometros_e, combustible_e = :combustible_e, ETD_e = :ETD_e, ETA_e = :ETA_e, viaticos_e = :viaticos_e, peajes_pesajes_e = :peajes_pesajes_e, extras_e = :extras_e, hazard_e = :hazard_e, reefer_e = :reefer_e, fee_e = :fee_e, total_e = :total_e WHERE id = :id_costeo_estimado");
        
        $query->execute([
                'kilometros_e' => $item['kilometros_e'],
                'combustible_e' => $item['combustible_e'],
                'ETD_e' => $item['ETD_e'],
                'ETA_e' => $item['ETA_e'],
                'viaticos_e' => $item['viaticos_e'],
                'peajes_pesajes_e' => $item['peajes_pesajes_e'],
                'extras_e' => $item['extras_e'],
                'hazard_e' => $item['hazard_e'],
                'reefer_e' => $item['reefer_e'],
                'fee_e' => $item['fee_e'],
                'total_e' => $item['total_e'],
                'id_costeo_estimado' => $item['id_costeo_estimado'],

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
                $item->numero               = $row['numero'];
                $item->fecha                = $row['fecha'];
                $item->id_viaje             = $row['id_viaje'];
                $item->id_carga             = $row['id_carga'];
                $item->id_costeo_estimado   = $row['id_costeo_estimado'];
                $item->id_chofer            = $row['id_chofer'];
                $item->id_vehiculo          = $row['id_vehiculo'];
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
        $query = $this->db->connect()->prepare("DELETE FROM costeo_estimado WHERE id = :id_costeo_estimado");
            $query->execute([
                'id_costeo_estimado' => $item->id_costeo_estimado,
            ]);

            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}

?>