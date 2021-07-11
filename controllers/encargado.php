<?php

class Encargado extends Controller{
    
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
         $this->view->vehiculos = [];

    }

    function render(){
        if( isset($_SESSION["encargado"]) ){
            $vehiculos = $this->model->getVehiculos();
            $this->view->vehiculos = $vehiculos; 
            $this->view->render('encargado/index');
            exit();
        }else{
            header('location:http://localhost/tpFinal/main'); //cambiar por la URL que tengan
            exit();
        }
        
    }

    function cerrarSesion(){
            
        session_start();

        if( isset($_SESSION["encargado"]) ){
            session_destroy();
            header('location:http://localhost/tpFinal/main'); //cambiar por la URL que tengan
            exit();
        }


    }

    function verVehiculo($param = null){
        $idVehiculo = $param[0];
        $vehiculo = $this->model->getById($idVehiculo);

       
        
        $this->view->vehiculo = $vehiculo;
        $this->view->mensaje = "";
        $this->view->render('encargado/detalle');
    }

    function service($param = null){
        $idVehiculo = $param[0];
        $vehiculo = $this->model->getById($idVehiculo);

       
        
        $this->view->vehiculo = $vehiculo;
        $this->view->mensaje = "";
        $this->view->render('encargado/modificarService');
    }

    function actualizarService(){
        
        $id        = $_POST['id'];
        $service   = $_POST['service'];
        
        if($this->model->updateService(['id'=>$id, 'service'=>$service])){

            $this->view->mensaje = "service actualizado correctamente";
        }else{
            $this->view->mensaje = "no se pudo actualizar";
        }
        header('location:http://localhost/tpFinal/encargado/realizarService');   
            exit();
    }

    function actualizarVehiculo(){
        
        $id              = $_POST['id'];
        $marca           = $_POST['marca'];
        $modelo          = $_POST['modelo'];
        $patente         = $_POST['patente'];
        $nro_chasis      = $_POST['nro_chasis'];
        $nro_motor       = $_POST['nro_motor'];
        $anio_fabricacion = $_POST['anio_fabricacion'];
        $service         = $_POST['service'];
        $kilometraje     = $_POST['kilometraje'];
        $max_combustible = $_POST['max_combustible'];

        

        if($this->model->update(['id'=>$id, 'marca'=>$marca, 'modelo'=>$modelo, 'patente'=>$patente, 'nro_chasis'=>$nro_chasis, 'nro_motor'=>$nro_motor, 'anio_fabricacion'=>$anio_fabricacion, 'service'=>$service, 'kilometraje'=>$kilometraje, 'max_combustible'=>$max_combustible])){

            $vehiculo = new Vehiculo();
            $vehiculo->id = $id;
            $vehiculo->marca = $marca;
            $vehiculo->modelo = $modelo;
            $vehiculo->patente = $patente;
            $vehiculo->nro_chasis = $nro_chasis;
            $vehiculo->nro_motor = $nro_motor;
            $vehiculo->anio_fabricacion = $anio_fabricacion;
            $vehiculo->service = $service;
            $vehiculo->kilometraje = $kilometraje;
            $vehiculo->max_combustible = $max_combustible;

            $this->view->vehiculo = $vehiculo;
            $this->view->mensaje = "vehiculo actualizado correctamente";
        }else{
            $this->view->mensaje = "no se pudo actualizar";
        }
        header('location:http://localhost/tpFinal/encargado');   //cambiar por la URL que tengan
            exit();
    }

    function eliminarVehiculo($param = null){
        $id = $param[0];

        if($this->model->delete($id)){
            $this->view->mensaje = "Vehiculo eliminado correctamente";
        }else{
            $this->view->mensaje = "no se pudo eliminar";
        }
        $this->render();
    }

    function agregarVehiculo(){

        $this->view->render('encargado/agregarVehiculo');
    }

     function cargarVehiculo(){
        
       $marca = $_POST['marca'];
       $modelo= $_POST['modelo'];
       $patente= $_POST['patente'];
       $nro_chasis = $_POST['nro_chasis'];
       $nro_motor= $_POST['nro_motor'];
       $anio_fabricacion= $_POST['anio_fabricacion'];
       $service = $_POST['service'];
       $kilometraje= $_POST['kilometraje'];
       $max_combustible= $_POST['max_combustible'];

       $mensaje = "";
    
       if($this->model->insertVehiculo(['marca' => $marca, 'modelo' => $modelo, 'patente' => $patente, 'nro_chasis' => $nro_chasis, 'nro_motor' => $nro_motor, 'anio_fabricacion' => $anio_fabricacion, 'service' => $service, 'kilometraje' => $kilometraje, 'max_combustible' => $max_combustible])){
            $mensaje = "registro exitoso";
       }else{
            $mensaje = "error";
       }

       $this->view->mensaje = $mensaje;
       $this->render();

    }

    function verPosicion(){
        
        $empleados = $this->model->getChoferesEnViaje();

       
        
        $this->view->empleados = $empleados;
        $this->view->mensaje = "";
        $this->view->render('encargado/mostrarPosision');
    }

     function generarQr($param = null){
        $id_chofer = $param[0];
        $datos = $this->model->getdatosByChofer($id_chofer);
       
        $latitud = $datos[0];
        $longitud = $datos[1];

        include_once("phpqrcode/qrlib.php");

        
        QRcode::png("https://maps.google.com/maps?q=".$latitud.",".$longitud);
        
        
        
        $this->view->render('encargado/generarQr');
    }

    function verCalendario(){
        
        $vehiculos = $this->model->getVehiculos();

       
        
        $this->view->vehiculos = $vehiculos;
        $this->view->render('encargado/calendario');
    }
    function realizarService(){
        
        $vehiculos = $this->model->getVehiculos();

       
        
        $this->view->vehiculos = $vehiculos;
        $this->view->render('encargado/service');
    }
   
}

?>