<?php

class Consulta extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->empleados = [];
    }

    function render(){
        $empleados = $this->model->get();
        $this->view->empleados = $empleados; 
        $this->view->render('consulta/index');
    }

    function verEmpleado($param = null){
        $idEmpleado = $param[0];
        $empleado = $this->model->getById($idEmpleado);

       
        
        $this->view->empleado = $empleado;
        $this->view->mensaje = "";
        $this->view->render('consulta/detalle');
    }

    function actualizarEmpleado(){
        
        $id         = $_POST['id'];
        $dni        = $_POST['dni'];
        $nombre     = $_POST['nombre'];
        $apellido   = $_POST['apellido'];
        $fecha_nac  = $_POST['fecha_nac'];
        $usuario    = $_POST['usuario'];
        $password   = $_POST['password'];
        $email      = $_POST['email'];
        $rol        = $_POST['rol'];

        

        if($this->model->update(['id'=>$id, 'dni'=>$dni, 'nombre'=>$nombre, 'apellido'=>$apellido, 'fecha_nac'=>$fecha_nac, 'usuario'=>$usuario, 'password'=>$password, 'email'=>$email, 'rol'=>$rol])){

            $empleado = new Empleado();
            $empleado->id = $id;
            $empleado->dni = $dni;
            $empleado->nombre = $nombre;
            $empleado->apellido = $apellido;
            $empleado->fecha_nac = $fecha_nac;
            $empleado->usuario = $usuario;
            $empleado->password = $password;
            $empleado->email = $email;
            $empleado->rol = $rol;

            $this->view->empleado = $empleado;
            $this->view->mensaje = "empleado actualizado correctamente";
        }else{
            $this->view->mensaje = "no se pudo actualizar";
        }
        $this->view->render('consulta/detalle');
    }

    function eliminarEmpleado($param = null){
        $id = $param[0];

        if($this->model->delete($id)){
            $this->view->mensaje = "empleado eliminado correctamente";
        }else{
            $this->view->mensaje = "no se pudo eliminar";
        }
        $this->render();
    }
}

?>