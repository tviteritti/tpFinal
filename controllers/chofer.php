<?php

include_once'models/empleado.php';
include_once'models/vehiculo.php';
include_once'models/proforma.php';

class Chofer extends Controller{
    
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->proforma = [];
        $this->view->idUserSession = $_SESSION['chofer'];
        
    }

    function render(){
        if( isset($_SESSION["chofer"]) ){
            $proforma = $this->model->getProformaPorSession($_SESSION['chofer']);
            $this->view->proforma = $proforma;
            $this->view->render('chofer/index');
            exit();
        }else{
            header('location:http://localhost/tpFinal/main');   //cambiar por la URL que tengan
            exit();
        }
        
    }

    function cerrarSesion(){
            
    session_start();

    if( isset($_SESSION["chofer"]) ){
        session_destroy();
        header('location:http://localhost/tpFinal/main'); //cambiar por la URL que tengan
        exit();
    }


    }

    function cargarCosteoChofer(){
       $numero = $_POST['numero'];

       $kilometros_r = $_POST['kilometros_r'];
       
       $combustible_r = $_POST['combustible_r'];
       
       $ETD_r = $_POST['ETD_r'];
       
       $ETA_r = $_POST['ETA_r'];
       
       $viaticos_r = $_POST['viaticos_r'];
       
       $peajes_pesajes_r = $_POST['peajes_pesajes_r'];
       
       $extras_r = $_POST['extras_r'];
       
       $hazard_r = $_POST['hazard_r'];
       
       $reefer_r = $_POST['reefer_r'];
       
       $fee_r = $_POST['fee_r'];

       $total_r = $kilometros_r + $combustible_r + $viaticos_r +$peajes_pesajes_r +$extras_r + $hazard_r+ $reefer_r+$fee_r;
       

       

       

       $mensaje = "";
    
       if($this->model->insertCosteo(['kilometros_r' => $kilometros_r,'combustible_r' => $combustible_r,'viaticos_r' => $viaticos_r,'peajes_pesajes_r' => $peajes_pesajes_r,'extras_r' => $extras_r,'hazard_r' => $hazard_r,'reefer_r' => $reefer_r,'fee_r' => $fee_r,'ETD_r' => $ETD_r,'ETA_r' => $ETA_r,'total_r' => $total_r,'numero' => $numero])){
            
       }else{
            $mensaje = "error costeo";
       }

       $this->view->mensaje = $mensaje;
        
       $this->render();
      

    }

    function verProforma($param = null){
        $idProforma = $param[0];
        $proforma = $this->model->getProformaById($idProforma);

       
        
        $this->view->proforma = $proforma;
        $this->view->mensaje = "";
        $this->view->render('chofer/detalle');
    }

    function mostrarCargaDeDatos(){
       $this->view->render('chofer/cargarDatos');
    }

    function mostrarCargaDePosision(){
       $this->view->render('chofer/cargarPosision');
    }

    function comenzarViaje($param = null){
        $idProforma = $param[0];
        $mensaje = "";

        
        $proforma   = new Proforma();
        $proforma   = $this->model->proformaId($idProforma);
        
        
        
        $vehiculo   = new Vehiculo();
        $vehiculo   = $this->model->getVehiculoById($proforma->id_vehiculo);


        $todasProformas = $this->model->getProforma();
        foreach($todasProformas as $proforma){
            if($proforma->estado == "en curso"){
                $mensaje = "Se encuentra realizando un viaje";
                $this->view->mensaje = $mensaje;
                $this->render();
            }
        }

        $id_costeo_real = $proforma->id_costeo_real;
       $id_proforma = $proforma->numero;
       $id_vehiculo = $vehiculo->id;
       $combustible = $vehiculo->max_combustible;
       $kilometros  = $vehiculo->kilometraje;
       $id_chofer   = $_SESSION['chofer'];
       $estado      = true;
       $estadoProforma='en curso';

       
       
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $ETD_r = date("Y-m-d");
        


       $mensaje = "";
    
       if($this->model->insertViajeNuevo(['id_vehiculo' => $id_vehiculo, 'combustible' => $combustible, 'kilometros' => $kilometros, 'id_chofer' => $id_chofer,'estado' => $estado, 'estadoProforma' => $estadoProforma, 'id_proforma' => $id_proforma, 'ETD_r' => $ETD_r,'id_costeo_real' => $id_costeo_real])){
            
       }else{
            $mensaje = "error carga";
       }

       $this->view->mensaje = $mensaje;
       header('location:http://localhost/tpFinal/chofer'); //cambiar por la URL que tengan
        exit();

    }

    function actualizarDatos(){


        $id_chofer = $_SESSION['chofer'];
        $proforma = new Proforma();
        $proforma = $this->model->getProformaPorSessionEnCurso($id_chofer)[0];

        
        $costeoreal = $this->model->getCosteoRealPorId($proforma);

        $datosViaje = new Proforma();
        $datosViaje = $this->model->getDatosDeViajePorIdChofer($id_chofer);

        

        
        $kilometros_usado = $datosViaje[0]->kilometros_usado + ($_POST['kilometros'] - $datosViaje[0]->kilometros);
        $combustible_usado = $datosViaje[0]->combustible + $_POST['combustible_comprado'] - $_POST['combustible'];

        $id_chofer   = $_SESSION['chofer'];
        $estado      = true;
        $kilometros = $_POST['kilometros'];
        $combustible = $_POST['combustible'];       
        $combustible_comprado = $_POST['combustible_comprado'] + $datosViaje[0]->combustible_comprado;       
        $latitud = $_POST['latitud'];       
        $longitud = $_POST['longitud']; 
        
       
       $viaticos_r = $costeoreal[0]->viaticos_r;
       $id_costeo_real = $proforma->id_costeo_real;
       $viaticos_r = $_POST['viaticos_r'] + $costeoreal[0]->viaticos_r;       
       $peajes_pesajes_r = $_POST['peajes_pesajes_r'] + $costeoreal[0]->peajes_pesajes_r;       
       $extras_r = $_POST['extras_r'] + $costeoreal[0]->extras_r;       
       $hazard_r = $_POST['hazard_r'] + $costeoreal[0]->hazard_r;       
       $reefer_r = $_POST['reefer_r'] + $costeoreal[0]->reefer_r;
       $fee_r = $_POST['fee_r'] + $costeoreal[0]->fee_r;
       

       $mensaje = "";
    
       if($this->model->insertDatosViaje(['kilometros' => $kilometros,'combustible' => $combustible,'combustible_comprado' => $combustible_comprado,'latitud' => $latitud,'longitud' => $longitud,'viaticos_r' => $viaticos_r,'peajes_pesajes_r' => $peajes_pesajes_r,'extras_r' => $extras_r,'hazard_r' => $hazard_r,'reefer_r' => $reefer_r,'fee_r' => $fee_r,'id_chofer' => $id_chofer,'estado' => $estado,'id_costeo_real' => $id_costeo_real,'combustible_usado' => $combustible_usado,'kilometros_usado' => $kilometros_usado])){
            
       }else{
            $mensaje = "error al actualizar los datos";
       }

       $this->view->mensaje = $mensaje;
        
       $this->render();
    }

    function finalizarViaje(){
        $id_chofer = $_SESSION['chofer'];
        $proforma = new Proforma();
        $proforma = $this->model->getProformaPorSessionEnCurso($id_chofer)[0];

        
        $costeoreal = $this->model->getCosteoRealPorId($proforma);

        $datosViaje = new Proforma();
        $datosViaje = $this->model->getDatosDeViajePorIdChofer($id_chofer);

        $id_viaje = $datosViaje[0]->id;
        $kilometros = $datosViaje[0]->kilometros;
        $combustible =$datosViaje[0]->combustible;
        $combustible_usado =$datosViaje[0]->combustible_usado;
        $kilometros_usado =$datosViaje[0]->kilometros_usado;
        $latitud =$datosViaje[0]->latitud;
        $longitud =$datosViaje[0]->longitud;
        $combustible_comprado =$datosViaje[0]->combustible_comprado;
        $id_chofer =$datosViaje[0]->id_chofer;
        $estado = 0;
        $estado_proforma = "finalizado";
        

        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $ETA_r = date("Y-m-d");


        $mensaje = "";
    
       if($this->model->insertFinalizarViaje(['kilometros' => $kilometros,'combustible' => $combustible,'combustible_comprado' => $combustible_comprado,'latitud' => $latitud,'longitud' => $longitud,'id_chofer' => $id_chofer,'estado' => $estado,'combustible_usado' => $combustible_usado,'kilometros_usado' => $kilometros_usado,'estado_proforma' => $estado_proforma,'id_viaje' => $id_viaje,'ETA_r' => $ETA_r,'proforma' => $proforma])){
            
       }else{
            $mensaje = "error al actualizar los datos";
       }

        $this->view->mensaje = $mensaje;
        
       $this->render();
    }
    
}

?>