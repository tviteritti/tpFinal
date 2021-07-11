<?php

class Supervisor extends Controller{
        

    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
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

       $mensaje = "";
    
       if($this->model->insertViaje(['origen' => $origen, 'destino' => $destino, 'fecha_carga' => $fecha_carga, 'ETA' => $ETA])){
            
       }else{
            $mensaje = "error viaje";
       }

       $this->view->mensaje = $mensaje;
       

    }

    function cargarCarga(){
       $tipo = $_POST['tipo'];
       $peso_neto = $_POST['peso_neto'];
       $hazard = $_POST['hazard'];
       $reefer = $_POST['reefer'];

       $mensaje = "";
    
       if($this->model->insertCarga(['tipo' => $tipo, 'peso_neto' => $peso_neto, 'hazard' => $hazard, 'reefer' => $reefer])){
            
       }else{
            $mensaje = "error carga";
       }

       $this->view->mensaje = $mensaje;
       

    }

    function cargarCosteoReal(){
       $kilometros_r = 0;

       $mensaje = "";
    
       if($this->model->insertCosteoReal(['kilometros_r' => $kilometros_r])){
            
       }else{
            $mensaje = "error CosteoReal";
       }

       $this->view->mensaje = $mensaje;
       

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
       

       

       

       $mensaje = "";
    
       if($this->model->insertCosteo(['kilometros_e' => $kilometros_e,'combustible_e' => $combustible_e,'viaticos_e' => $viaticos_e,'peajes_pesajes_e' => $peajes_pesajes_e,'extras_e' => $extras_e,'hazard_e' => $hazard_e,'reefer_e' => $reefer_e,'fee_e' => $fee_e,'ETD_e' => $ETD_e,'ETA_e' => $ETA_e,'total_e' => $total_e])){
            
       }else{
            $mensaje = "error costeo";
       }

       $this->view->mensaje = $mensaje;
        
      

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

       $mensaje = "";
    
       if($this->model->insertProforma(['fecha' => $fecha, 'id_viaje' => $id_viaje, 'id_carga' => $id_carga, 'id_costeo_estimado' => $id_costeo_estimado, 'id_chofer' => $id_chofer, 'id_vehiculo' => $id_vehiculo, 'id_costeo_real' => $id_costeo_real, 'estado' => $estado])){
            $mensaje = "registro exitoso";
       }else{
            $mensaje = "error proforma";
       }

       $this->view->mensaje = $mensaje;
       $this->render();

    }

    function verProforma($param = null){
        $idProforma = $param[0];
        $proforma = $this->model->getProformaById($idProforma);

       
        
        $this->view->proforma = $proforma;
        $this->view->mensaje = "";
        $this->view->render('supervisor/detalle');
    }

    function verPosicion(){
        
        $empleados = $this->model->getChoferesEnViaje();

       
        
        $this->view->empleados = $empleados;
        $this->view->mensaje = "";
        $this->view->render('supervisor/mostrarPosision');
    }

     function generarQr($param = null){
        $id_chofer = $param[0];
        $datos = $this->model->getdatosByChofer($id_chofer);
       
        $latitud = $datos[0]->latitud;
        $longitud = $datos[0]->longitud;

        include_once("phpqrcode/qrlib.php");

        
        QRcode::png("https://maps.google.com/maps?q=".$latitud.",".$longitud);
        

        
        $this->view->render('supervisor/generarQr');
    }

    function agregarProforma(){
        $vehiculos = $this->model->getVehiculos();
        $this->view->vehiculos = $vehiculos;
        $empleados = $this->model->getChoferes();
        $this->view->empleados = $empleados;
        $this->view->render('supervisor/agregarProforma');
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

       function verPdf($param = null){
        $numero = $param[0];

        $proforma = $this->model->getProformaCompletaById($numero);

        $proforma->total_e = ($proforma->combustible_e * 200) + $proforma->viaticos_e + $proforma->extras_e + $proforma->hazard_e + $proforma->peajes_pesajes_e + $proforma->reefer_e + $proforma->fee_e;

        $proforma->total_r = ($proforma->combustible_r * 200) + $proforma->viaticos_r + $proforma->extras_r + $proforma->hazard_r + $proforma->peajes_pesajes_r + $proforma->reefer_r + $proforma->fee_r;

        $this->view->proforma = $proforma;
        $this->view->render('supervisor/pdfProforma');

    }

    function verEstadisticas(){
        $proformasN= $this->model->getProforma();
       $items = [];
       foreach ($proformasN as $numero) {
            $proformas = $this->model->getProformaCompletaById($numero->numero);
            array_push($items, $proformas);
       }
        


        $vehiculos = $this->model->getVehiculos();
        $this->view->vehiculos = $vehiculos;
        $this->view->items = $items;

        $this->view->render('supervisor/estadisticas');

    }

}

?>