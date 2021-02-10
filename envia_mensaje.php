<?
// definimos el mensaje
$mensaje="";
$mensaje.="Nombre: ".$_POST['nombre_contacto']."\n";
$mensaje.="E-mail: ".$_POST['email_contacto']."\n";
$mensaje.="Teléfono: ".$_POST['telefono_contacto']."\n";
$mensaje.="Mensaje: ".$_POST['mensaje_contacto']."\n";
// definimos a quien se lo enviamos
$email_destiny="kiquino@gmail.com";
$subject="Mensaje desde la Web Novoflor.com.ar ";
// verificamos si se envió
if (mail($email_destiny,$subject,$mensaje,"From: ".$_POST['nombre_contacto']."<".$_POST['email_contacto'].">")) {
    echo '<p align="center"><b>Mensaje enviado con éxito</b></p>';
} else {
    echo '<p align="center">Error, su mensaje no pudo ser enviado.</p>';
}
?>