<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{
    public $email;
    public $nombre;
    public $token;

public function __construct($email, $nombre, $token)
{
    $this->email = $email;
    $this->nombre = $nombre;
    $this->token = $token;
}

public function enviarConfirmacion(){
    //crear el onjeto de email// isEMTP--protocolole hizo 
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = '3f599bc81d2b7b';
$mail->Password = 'cac7f117619f58';

$mail->setFrom('cuentas@appsalon.com');
$mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
$mail->Subject = 'confirma tu cuenta';
//set HTML
$mail->isHTML(TRUE);
$mail->CharSet = 'UTF-8';

$contenido = '<html>';
$contenido .= "<p><strong>Hola " . $this->email . "</strong> Has creado tu cueta en APPSALON, confirmar en el siguiente enlace</p>";
$contenido .= "<p>presiona aqui: <a href='http://localhost:3000/confirmar-cuenta?token="
. $this->token . "'>confirmar cuenta</a> </p>";
$contenido .= "<p>si no solicitaste este cambio, puesde ignorar el mensaje</p>";
$contenido .= '</html>';
$mail->Body = $contenido;
//enviar email

$mail->send();

}
  public function enviarInstrucciones(){
    $mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = '3f599bc81d2b7b';
$mail->Password = 'cac7f117619f58';

$mail->setFrom('cuentas@appsalon.com');
$mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
$mail->Subject = 'Restablece tu password';
//set HTML
$mail->isHTML(TRUE);
$mail->CharSet = 'UTF-8';

$contenido = '<html>';
$contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu password, sigue el siguente enlace para hacerlo</p>";
$contenido .= "<p>presiona aqui: <a href='http://localhost:3000/recuperar?token="
. $this->token . "'>Restablecer Password</a> </p>";
$contenido .= "<p>si no solicitaste este cambio, puesde ignorar el mensaje</p>";
$contenido .= '</html>';
$mail->Body = $contenido;
//enviar email

$mail->send();
  }
}