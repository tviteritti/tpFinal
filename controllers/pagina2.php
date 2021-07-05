<?php
        
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

class Pagina2 extends Controller{
    
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
        $this->view->render('pagina2/index');
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

        $mail = new PHPMailer(true);

        try {
            
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'tviteritti@gmail.com';                     //SMTP username
            $mail->Password   = '';                               //SMTP password
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
        }

       if($this->model->insert(['dni' => $dni, 'nombre' => $nombre,'apellido' => $apellido, 'fecha_nac' => $fecha_nac, 'usuario' => $usuario, 'password' => $password, 'email' => $email, 'hash' => $hash])){
            $mensaje = "registro exitoso";
       }else{
            $mensaje = "ya existe";
       }

       $this->view->mensaje = $mensaje;
       $this->render();
        
    }
}

?>