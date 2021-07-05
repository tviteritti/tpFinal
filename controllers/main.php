<?php

class Main extends Controller{

    function __construct(){
        parent::__construct(); 
        $this->view->mensajeIS = "";       
    }

    function render(){
        $this->view->render('main/index');
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

       

        require 'phpmailer/Exception.php';
        require 'phpmailer/PHPMailer.php';
        require 'phpmailer/SMTP.php';

        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha_nac = $_POST['fecha_nac'];
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $hash = md5( rand(0,1000) );

       /* $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'tviteritti@gmail.com';                     //SMTP username
            $mail->Password   = 'fedetomas';                               //SMTP password
            $mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('tviteritti@gmail.com', 'tomas');
            $mail->addAddress($email);     //Add a recipient

         

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Signup | Verification';
            $mail->Body    = '
                
                Gracias por registrarte!
                Tu cuenta ha sido creada, activala utilizando el enlace de la parte inferior.
                
                ------------------------
                Username: '.$usuario.'
                Password: '.$password.'
                ------------------------
                
                Por favor haz clic en este enlace para activar tu cuenta:
                http://aquivaelnombrededominio.com/php/activar.php?email='.$email.'&hash='.$hash.'
                ';
            

            //$mail->send();
            echo 'correctamente';
        } catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }*/

       if($this->model->insert(['dni' => $dni, 'nombre' => $nombre,'apellido' => $apellido, 'fecha_nac' => $fecha_nac, 'usuario' => $usuario, 'password' => $password, 'email' => $email, 'hash' => $hash])){
            $mensaje = "registro exitoso";
       }else{
            $mensaje = "ya existe";
       }

       $this->view->mensaje = $mensaje;
        header('location:http://localhost/tpFinal/main');      //cambiar por la URL que tengan
        exit();
        
    }

}

?>