<?php
/**
 * Envio de correo mediante un servidor SMTP
 */
namespace PHPMailer\PHPMailer;

require "PHPMailer/PHPMailer.php";
require "PHPMailer/Exception.php";
require "PHPMailer/SMTP.php";

$mensaje.="Nombre: ".$_POST['nombre_contacto']."\n";
$mensaje.="E-mail: ".$_POST['email_contacto']."\n";
$mensaje.="Teléfono: ".$_POST['telefono_contacto']."\n";
$mensaje.="Mensaje: ".$_POST['mensaje_contacto']."\n";

$smtp=new PHPMailer();

// Indicamos que vamos a utilizar un servidor SMTP
$smtp->IsSMTP();

// Definimos el formato del correo con UTF-8
$smtp->CharSet="UTF-8";

// autenticación contra nuestro servidor smtp
$smtp->SMTPDebug = 2;                         // Enable verbose debug output
$smtp->SMTPAuth   = true;						// enable SMTP authentication
$smtp->Host       = "novoflor.com.ar";			// sets MAIL as the SMTP server
$smtp->Username   = "info@novoflor.com.ar";	// MAIL username
$smtp->Password   = "novoFlor18";		// MAIL password
//$smtp->SMTPAutoTLS = false;
$smtp->SMTPSecure = 'tls';                    // Enable TLS encryption, `ssl` also accepted
$smtp->Port       = 465;                       // TCP port to connect to

// datos de quien realiza el envio
$smtp->From       = "no-reply@novoflor.com.ar"; // from mail
$smtp->FromName   = "Novoflor"; // from mail name

// Indicamos las direcciones donde enviar el mensaje con el formato
//   "correo"=>"nombre usuario"
// Se pueden poner tantos correos como se deseen
$mailTo=array(
    "info@novoflor.com.ar"=>"Novoflor"
);

// establecemos un limite de caracteres de anchura
$smtp->WordWrap   = 50; // set word wrap

// NOTA: Los correos es conveniente enviarlos en formato HTML y Texto para que
// cualquier programa de correo pueda leerlo.

// Definimos el contenido HTML del correo
$contenidoHTML="<head>";
$contenidoHTML.="<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">";
$contenidoHTML.="</head><body>";
$contenidoHTML.= $mensaje;
$contenidoHTML.="</body>\n";

// Definimos el contenido en formato Texto del correo
$contenidoTexto="$mensaje";

// Definimos el subject
$smtp->Subject="Mensaje desde Novoflor.com.ar";

// Adjuntamos el archivo "leameLWP.txt" al correo.
// Obtenemos la ruta absoluta de donde se ejecuta este script para encontrar el
// archivo leameLWP.txt para adjuntar. Por ejemplo, si estamos ejecutando nuestro
// script en: /home/xve/test/sendMail.php, nos interesa obtener unicamente:
// /home/xve/test para posteriormente adjuntar el archivo leameLWP.txt, quedando
// /home/xve/test/leameLWP.txt
//$rutaAbsoluta=substr($_SERVER["SCRIPT_FILENAME"], 0, strrpos($_SERVER["SCRIPT_FILENAME"], "/"));
//$smtp->AddAttachment($rutaAbsoluta."/leameLWP.txt", "LeameLWP.txt");

// Indicamos el contenido
$smtp->AltBody=$contenidoTexto; //Text Body
$smtp->MsgHTML($contenidoHTML); //Text body HTML

foreach ($mailTo as $mail=>$name) {
    $smtp->ClearAllRecipients();
    $smtp->AddAddress($mail, $name);

    if (!$smtp->Send()) {
        echo "<br>Error (".$mail."): ".$smtp->ErrorInfo;
    } else {
        echo "<br>Envio realizado a ".$name." (".$mail.")";
    }
}
?>
