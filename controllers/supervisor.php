<?php

class Supervisor extends Controller{
        

    function __construct(){
        parent::__construct();
        $this->view->message = "";
        $this->view->empleados = [];
        $this->view->vehiculos = [];
        $this->view->proforma = [];
    }

    function render(){
        if( isset($_SESSION["supervisor"]) ){
            $empleados = $this->model->getChoferes();
            $this->view->empleados = $empleados;
            $proforma = $this->model->getProforma();
            $this->view->proforma = $proforma;
            $vehiculos = $this->model->getVehiculos();
            $this->view->vehiculos = $vehiculos;
            $this->view->render('supervisor/index');
            exit();
        }else{
            header('location:http://localhost/tpFinal/main'); //cambiar por la URL que tengan
            exit();
        }
        
    }

    function cerrarSesion(){
            
        session_start();

        if( isset($_SESSION["supervisor"]) ){
            session_destroy();
            header('location:http://localhost/tpFinal/main'); //cambiar por la URL que tengan
            exit();
        }


    }

     function cargarViaje(){
       $origen = $_POST['origen'];
       $destino = $_POST['destino'];
       $fecha_carga = $_POST['fecha_carga'];
       $ETA = $_POST['ETA'];

       $message = "";
    
       if($this->model->insertViaje(['origen' => $origen, 'destino' => $destino, 'fecha_carga' => $fecha_carga, 'ETA' => $ETA])){
            
       }else{
            $message = "error viaje";
       }

       $this->view->message = $message;
       

    }

    function cargarCarga(){
       $tipo = $_POST['tipo'];
       $peso_neto = $_POST['peso_neto'];
       $hazard = $_POST['hazard'];
       $reefer = $_POST['reefer'];

       $message = "";
    
       if($this->model->insertCarga(['tipo' => $tipo, 'peso_neto' => $peso_neto, 'hazard' => $hazard, 'reefer' => $reefer])){
            
       }else{
            $message = "error carga";
       }

       $this->view->message = $message;
       

    }

    function cargarCosteoReal(){
       $kilometros_r = 0;

       $message = "";
    
       if($this->model->insertCosteoReal(['kilometros_r' => $kilometros_r])){
            
       }else{
            $message = "error CosteoReal";
       }

       $this->view->message = $message;
       

    }

    function cargarCosteo(){
       $kilometros_e = $_POST['kilometros_e'];
       
       $combustible_e = $_POST['combustible_e'];
       
       $ETD_e = $_POST['ETD_e'];
       
       $ETA_e = $_POST['ETA_e'];
       
       $viaticos_e = $_POST['viaticos_e'];
       
       $peajes_pesajes_e = $_POST['peajes_pesajes_e'];
       
       $extras_e = $_POST['extras_e'];
       
       $hazard_e = $_POST['hazard_e'];
       
       $reefer_e = $_POST['reefer_e'];
       
       $fee_e = $_POST['fee_e'];

       $total_e = $kilometros_e + $combustible_e + $viaticos_e +$peajes_pesajes_e +$extras_e + $hazard_e+ $reefer_e+$fee_e;
       

       

       

       $message = "";
    
       if($this->model->insertCosteo(['kilometros_e' => $kilometros_e,'combustible_e' => $combustible_e,'viaticos_e' => $viaticos_e,'peajes_pesajes_e' => $peajes_pesajes_e,'extras_e' => $extras_e,'hazard_e' => $hazard_e,'reefer_e' => $reefer_e,'fee_e' => $fee_e,'ETD_e' => $ETD_e,'ETA_e' => $ETA_e,'total_e' => $total_e])){
            
       }else{
            $message = "error costeo";
       }

       $this->view->message = $message;
        
      

    }

    function cargarProforma(){
        
        $cont = $this->model->getNroProforma() + 1 ;
        
            
       
        $this->cargarViaje();
        $id_viaje = $cont;
        $this->cargarCarga();
        $id_carga = $cont;
        $this->cargarCosteo();
        $id_costeo_estimado = $cont;
        $this->cargarCosteoReal();
        $id_costeo_real = $cont;
        $estado = 'antes';
        
        
        
        

       $fecha = $_POST['fecha'];
       

       $id_chofer= $_POST['id_chofer'];
       $id_vehiculo= $_POST['id_vehiculo'];

       $message = "";
    
       if($this->model->insertProforma(['fecha' => $fecha, 'id_viaje' => $id_viaje, 'id_carga' => $id_carga, 'id_costeo_estimado' => $id_costeo_estimado, 'id_chofer' => $id_chofer, 'id_vehiculo' => $id_vehiculo, 'id_costeo_real' => $id_costeo_real, 'estado' => $estado])){
            $message = "registro exitoso";
       }else{
            $message = "error proforma";
       }

       $this->view->message = $message;
       $this->render();

    }

    function verProforma($param = null){
        $idProforma = $param[0];
        $proforma = $this->model->getProformaById($idProforma);

       
        
        $this->view->proforma = $proforma;
        $this->view->mensaje = "";
        $this->view->render('supervisor/detalle');
    }

    function actualizarProforma(){
        
        $numero              = $_POST['numero'];
        $fecha               = $_POST['fecha'];
        $id_viaje            = $_POST['id_viaje'];
        $id_carga            = $_POST['id_carga'];
        $id_costeo_estimado  = $_POST['id_costeo_estimado'];
        $id_chofer           = $_POST['id_chofer'];
        $id_vehiculo         = $_POST['id_vehiculo'];

        $tipo         = $_POST['tipo'];
        $peso_neto        = $_POST['peso_neto'];
        $hazard     = $_POST['hazard'];
        $reefer   = $_POST['reefer'];

        $origen         = $_POST['origen'];
        $destino        = $_POST['destino'];
        $fecha_carga     = $_POST['fecha_carga'];
        $ETA   = $_POST['ETA'];

        $kilometros_e = $_POST['kilometros_e'];
        $combustible_e = $_POST['combustible_e'];        
        $ETD_e = $_POST['ETD_e'];        
        $ETA_e = $_POST['ETA_e'];        
        $viaticos_e = $_POST['viaticos_e'];        
        $peajes_pesajes_e = $_POST['peajes_pesajes_e'];        
        $extras_e = $_POST['extras_e'];        
        $hazard_e = $_POST['hazard_e'];        
        $reefer_e = $_POST['reefer_e'];        
        $fee_e = $_POST['fee_e'];
        

        $total_e = $kilometros_e + $combustible_e + $viaticos_e +$peajes_pesajes_e +$extras_e + $hazard_e+ $reefer_e+$fee_e;
        

        if($this->model->update(['numero'=>$numero, 'fecha'=>$fecha, 'id_viaje'=>$id_viaje, 'id_carga'=>$id_carga, 'id_costeo_estimado'=>$id_costeo_estimado, 'id_chofer'=>$id_chofer, 'id_vehiculo'=>$id_vehiculo, 'tipo' => $tipo, 'peso_neto' => $peso_neto, 'hazard' => $hazard, 'reefer' => $reefer, 'origen' => $origen, 'destino' => $destino, 'fecha_carga' => $fecha_carga, 'ETA' => $ETA,'kilometros_e' => $kilometros_e, 'combustible_e' => $combustible_e, 'ETD_e' => $ETD_e, 'ETA_e' => $ETA_e, 'viaticos_e' => $viaticos_e, 'peajes_pesajes_e' => $peajes_pesajes_e, 'extras_e' => $extras_e,'hazard_e' => $hazard_e, 'reefer_e' => $reefer_e,'fee_e' => $fee_e, 'total_e'=> $total_e])){

            $proforma = new Proforma();
            $proforma->numero = $numero;
            $proforma->fecha = $fecha;
            $proforma->id_viaje = $id_viaje;
            $proforma->id_carga = $id_carga;
            $proforma->id_costeo_estimado = $id_costeo_estimado;
            $proforma->id_chofer = $id_chofer;
            $proforma->id_vehiculo = $id_vehiculo;


            $proforma->tipo = $tipo;
            $proforma->peso_neto = $peso_neto;
            $proforma->hazard = $hazard;
            $proforma->reefer = $reefer;

            $proforma->origen = $origen;
            $proforma->destino = $destino;
            $proforma->fecha_carga = $fecha_carga;
            $proforma->ETA = $ETA;

            $proforma->kilometros_e = $kilometros_e;            
            $proforma->combustible_e = $combustible_e;            
            $proforma->ETD_e = $ETD_e;            
            $proforma->ETA_e = $ETA_e;            
            $proforma->viaticos_e = $viaticos_e;            
            $proforma->peajes_pesajes_e = $peajes_pesajes_e;            
            $proforma->extras_e = $extras_e;            
            $proforma->hazard_e = $hazard_e;            
            $proforma->reefer_e = $reefer_e;            
            $proforma->fee_e = $fee_e;            
            $proforma->total_e = $total_e;           



            $this->view->proforma = $proforma;
            $this->view->mensaje = "proforma actualizado correctamente";
        }else{
            $this->view->mensaje = "no se pudo actualizar";
        }
        $this->view->render('supervisor/detalle');
    }

    function eliminarProforma($param = null){
        $numero = $param[0];

        if($this->model->delete($numero)){
            $this->view->mensaje = "proforma eliminado correctamente";
        }else{
            $this->view->mensaje = "no se pudo eliminar";
        }
        $this->render();
    }

}

?>