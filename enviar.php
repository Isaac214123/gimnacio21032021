<?php
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

$body = "Nombre: ". $nombre  ."<br>Correo: " . $correo . 
"<br>Telefono: " . $telefono . "<br>Mensaje: " . $mensaje;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ijmoragui@gmail.com';                     //SMTP username
    $mail->Password   = 'lokitoisaac1998im';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('Isaacjehiel_1998@hotmail.com',$nombre, 'Isaac');
    $mail->addAddress('Isaacjehiel_1998@hotmail.com');     //Add a recipient
    

    //Permite que se use HTML
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Mi asunto dia 2';
    $mail->Body    = $body ;
    $mail->CharSet = 'UTF-8'; //ACEPTA TILDESS

    $mail->send();
    echo '<script>
    alert("El mensaje se envio correctamente ");
    window.history.go(-1);
    </script>';

} catch (Exception $e) {
    echo "Hubo error isaac: {$mail->ErrorInfo}";
}