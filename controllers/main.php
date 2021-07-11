<?php

include_once'models/empleado.php';

class Main extends Controller{

    function __construct(){
        parent::__construct(); 
        $this->view->mensajeIS = "";       
    }

    function render(){
         if( isset($_SESSION["encargado"]) ){
            header('location:http://localhost/tpFinal/encargado'); 
            exit();
         }else if( isset($_SESSION["supervisor"]) ){
            header('location:http://localhost/tpFinal/supervisor'); 
            exit();
         }else if( isset($_SESSION["administrador"]) ){
            header('location:http://localhost/tpFinal/administrador'); 
            exit();
         }else if( isset($_SESSION["chofer"]) ){
            header('location:http://localhost/tpFinal/chofer'); 
            exit();
         }else{
            $this->view->render('main/index');
         }
    }

    function inicioSesion(){
       $usuario = $_POST['user'];
       $password = $_POST['password'];

       $empleado = $this->model->getByUser($usuario);

       if($empleado->password == ""){
             header('location:http://localhost/tpFinal/main');      //cambiar por la URL que tengan
            exit();
       }

       
    
        if($empleado->password == $password){
            $rol = $empleado->rol;
            switch($rol){
                case "chofer":
                    $_SESSION["chofer"] = $empleado->id;
                    header('location:http://localhost/tpFinal/chofer');      //cambiar por la URL que tengan
                    exit();
                    break;
                case "supervisor":
                    $_SESSION["supervisor"] = $empleado->id;
                    header('location:http://localhost/tpFinal/supervisor');      //cambiar por la URL que tengan
                    exit();
                    break;
                case "encargado":
                    $_SESSION["encargado"] = $empleado->id;
                    header('location:http://localhost/tpFinal/encargado');      //cambiar por la URL que tengan
                    exit();
                    break;
                case "administrador":                  
                    $_SESSION["administrador"] = $empleado->id;
                    header('location:http://localhost/tpFinal/administrador');      //cambiar por la URL que tengan
                    exit();
                    break;
                case "mecanico":
                    $_SESSION["mecanico"] = $empleado->id;
                    header('location:http://localhost/tpFinal/mecanico');      //cambiar por la URL que tengan
                    exit();
                    break;
                default:
                    header('location:http://localhost/tpFinal/main');      //cambiar por la URL que tengan
                    exit();
                    break;
             }
            $_SESSION["usuario"] = $usuario;
            $this->view->render('ayuda/index');
            exit();
        }else{
             header('location:http://localhost/tpFinal/main');      //cambiar por la URL que tengan
            exit();
        }

       

    }

    function registrarse(){

       

        include("Mailer/src/PHPMailer.php");
        include("Mailer/src/SMTP.php");
        include("Mailer/src/Exception.php");

        try {

            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fecha_nac = $_POST['fecha_nac'];
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $hash = md5( rand(0,1000) );

            $fromemail = "ejemploPW2@outlook.com";
            $fromname = "tomas";
            $host = "smtp.office365.com";
            $Port = "587";
            $SMTPAuth = true;
            $SMTPSecure = "tls";
            $password = "123456789ASD";

            $mail = new PHPMailer\PHPMailer\PHPMailer();

        
            $mail->isSMTP();
            $mail->SMTPDebug = 1;
            $mail->Host       = $host;   
            $mail->Port       = $Port;
            $mail->SMTPAuth   = $SMTPAuth;
            $mail->SMTPSecure = $SMTPSecure;
            $mail->Username   = $fromemail;
            $mail->Password   = $password;
            

            $mail->setFrom($fromemail, $fromname);
            $mail->addAddress($email);     //Add a recipient

         

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Signup | Verification';
            $mail->Body    = '
                
                Gracias por registrarte!
                Tu cuenta ha sido creada, activala utilizando el enlace de la parte inferior.
                
                ------------------------
                Username: '.$usuario.'
                ------------------------
                
                Por favor haz clic en este enlace para activar tu cuenta:
                location:http://localhost/tpFinal/main/verificarEmail/'.$email.'/'.$hash.'
                ';
            

            $mail->send();
            echo 'correctamente';
        } catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }

       if($this->model->insert(['dni' => $dni, 'nombre' => $nombre,'apellido' => $apellido, 'fecha_nac' => $fecha_nac, 'usuario' => $usuario, 'password' => $password, 'email' => $email, 'hash' => $hash])){
            $mensaje = "registro exitoso";
       }else{
            $mensaje = "ya existe";
       }

       $this->view->mensaje = $mensaje;
        header('location:http://localhost/tpFinal/main');      //cambiar por la URL que tengan
        exit();
        
    }

    function verificarEmail($param = null){
            $email = $param[0];
            $hash = $param[1];
            $mensaje= "";
            $empleado = new Empleado();
            $empleado = $this->model->verificarHash($email, $hash);

            if($this->model->activarEmpleado($empleado->id)){
              $mensaje = "registro exitoso";
            }else{
            $mensaje = "ya existe";
            }
         
         header('location:http://localhost/tpFinal/main');      //cambiar por la URL que tengan
        exit();
    }

}

?>