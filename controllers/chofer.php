<?php

class Chofer extends Controller{
    
    function __construct(){
        parent::__construct();
        $this->view->message = "";
        $this->view->proforma = [];
        $idUserSession = $_SESSION['chofer'];
    }

    function render(){
        if( isset($_SESSION["chofer"]) ){
            $proforma = $this->model->getProformaPorSession($_SESSION['chofer']);
            $this->view->proforma = $proforma;
            $this->view->idUserSession = $_SESSION['chofer'];
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
       

       

       

       $message = "";
    
       if($this->model->insertCosteo(['kilometros_r' => $kilometros_r,'combustible_r' => $combustible_r,'viaticos_r' => $viaticos_r,'peajes_pesajes_r' => $peajes_pesajes_r,'extras_r' => $extras_r,'hazard_r' => $hazard_r,'reefer_r' => $reefer_r,'fee_r' => $fee_r,'ETD_r' => $ETD_r,'ETA_r' => $ETA_r,'total_r' => $total_r,'numero' => $numero])){
            
       }else{
            $message = "error costeo";
       }

       $this->view->message = $message;
        
       $this->render();
      

    }

    function verProforma($param = null){
        $idProforma = $param[0];
        $proforma = $this->model->getProformaById($idProforma);

       
        
        $this->view->proforma = $proforma;
        $this->view->mensaje = "";
        $this->view->render('chofer/detalle');
    }

    
}

?>