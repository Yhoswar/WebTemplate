<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/loadpage.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/bat/php-mailer/PHPMailer.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/bat/php-mailer/POP3.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/bat/php-mailer/SMTP.php';
	
// **************** DATA *******************
$to         = "yhoswarperez@gmail.com";
$name_to    = utf8_decode("Nombre de la web");
$web        = utf8_decode("Nombre de la web");
$copyServer = "admin.protiendas.net";

$_Host      = "smtp.ionos.es";					      
$_Username  = "ssmtp@protiendas.net";             
$_Password  = "hjyeed34Cvssw";	 			   

$_FromMail  = "no-reply@protiendas.net";
$_FromName  = "Protiendas";	  		            	
// *****************************************

$alea    = (string) utf8_decode($_POST['alea']);
$name    = (string) utf8_decode($_POST['name']);
$email   = (string) utf8_decode($_POST['email']);
$phone   = (string) utf8_decode($_POST['phone']);
$message = (string) nl2br(utf8_decode($_POST['message']));

if ($_SESSION['Alea'] != $alea) HTTP_ERR_RETURN('400',$__['ContactMailNOK']);

$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->IsSMTP();                                        // send via SMTP
$mail->SMTPAuth = true;    								// turn on SMTP authentication		
$mail->Host     = $_Host;					            // SMTP servers
$mail->Username = $_Username;                           // SMTP username
$mail->Password = $_Password;	 		            	// SMTP password
$mail->SMTPSecure = 'tls';	 		            	    // SMTP SMTP
$mail->Port       = '587';	 		            	    // SMTP Port

$mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true));

$mail->From     = $_FromMail;    
$mail->FromName = $_FromName;   
$mail->AddAddress($to,$name_to);  // S'en poden afegir tants com es vulguin
$mail->AddReplyTo($email,$name);  // S'en poden afegir tants com es vulguin
 
$mail->WordWrap = 50;                    			          // Caracters per línia del mail
$mail->IsHTML(true);                                 		  // send as HTML



// Subjecte
$mail->Subject = "Nuevo mensaje de la web $web";

$body  = "Mensaje recibido por la web <br> <br> ";
$body .= "<b>Nombre</b> : $name <br>";
$body .= "<b>Correo</b> : $email <br>";
$body .= utf8_decode("<b>Teléfono</b> : $phone <br>");
$body .= "<b>Idioma</b> : $_Lang <br>";
$body .= "<b>Mensaje</b> : <br><br> $message";

$mail->Body = $body;

require_once $_SERVER['DOCUMENT_ROOT'].'/bat/MailHandlerCopy.php';

if ($mail->Send()) HTTP_ERR_RETURN('200',$__['ContactMailOK']);
else               HTTP_ERR_RETURN('400',$__['ContactMailNOK']);

?>