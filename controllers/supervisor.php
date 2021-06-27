<?php

class Supervisor extends Controller{
    
    function __construct(){
        parent::__construct();
        $this->view->message = "";
    }

    function render(){
        if( isset($_SESSION["supervisor"]) ){
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
            $message = "registro exitoso";
       }else{
            $message = "ya existe";
       }

       $this->view->message = $message;
       $this->render();

    }

    function cargarCarga(){
       $tipo = $_POST['tipo'];
       $peso_neto = $_POST['peso_neto'];
       $hazard = $_POST['hazard'];
       $reefer = $_POST['reefer'];

       $message = "";
    
       if($this->model->insertCarga(['tipo' => $tipo, 'peso_neto' => $peso_neto, 'hazard' => $hazard, 'reefer' => $reefer])){
            $message = "registro exitoso";
       }else{
            $message = "ya existe";
       }

       $this->view->message = $message;
       $this->render();

    }

    function cargarCosteo(){
       $kilometros_e = $_POST['kilometros_e'];
       $kilometros_r = $_POST['kilometros_r'];
       $combustible_e = $_POST['combustible_e'];
       $combustible_r = $_POST['combustible_r'];
       $etd_e = $_POST['etd_e'];
       $etd_r = $_POST['etd_r'];
       $eta_e = $_POST['eta_e'];
       $eta_r = $_POST['eta_r'];
       $viaticos_e = $_POST['viaticos_e'];
       $viaticos_r = $_POST['viaticos_r'];
       $peajes_pesajes_e = $_POST['peajes_pesajes_e'];
       $peajes_pesajes_r = $_POST['peajes_pesajes_r'];
       $extra_e = $_POST['extra_e'];
       $extra_r = $_POST['extra_r'];
       $hazard_e = $_POST['hazard_e'];
       $hazard_r = $_POST['hazard_r'];
       $reefer_e = $_POST['reefer_e'];
       $reefer_r = $_POST['reefer_r'];
       $fee_e = $_POST['fee_e'];
       $fee_r = $_POST['fee_r'];

       $total_e = $kilometros_e + $combustible_e + $etd_e + $eta_e + $viaticos_e + $peajes_pesajes_e + $extra_e + $hazard_e + $reefer_e + $fee_e;

       $total_r=$kilometros_r + $combustible_r + $etd_r + $eta_r + $viaticos_r + $peajes_pesajes_r + $extra_r + $hazard_r + $reefer_r + $fee_r;

       $message = "";
    
       if($this->model->insertCosteo(['kilometros_e' => $kilometros_e, 'kilometros_r' => $kilometros_r, 'combustible_e' => $combustible_e, 'combustible_r' => $combustible_r, 'etd_e' => $etd_e, 'etd_r' => $etd_r, 'eta_e' => $eta_e, 'eta_r' => $eta_r,'viaticos_e' => $viaticos_e, 'viaticos_r' => $viaticos_r, 'peajes_pesajes_e' => $peajes_pesajes_e, 'peajes_pesajes_r' => $peajes_pesajes_r, 'extra_e' => $extra_e, 'extra_r' => $extra_r, 'hazard_e' => $hazard_e, 'hazard_r' => $hazard_r, 'reefer_e' => $reefer_e, 'reefer_r' => $reefer_r, 'fee_e' => $fee_e, 'fee_r' => $fee_r,'total_e'=> $total_e, 'total_r'=> $total_r])){
            $message = "registro exitoso";
       }else{
            $message = "ya existe";
       }

       $this->view->message = $message;
       $this->render();

    }
}

?>