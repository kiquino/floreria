<?
Error_Reporting(E_ALL & ~E_NOTICE);

 while ($request = current($_REQUEST)) {
 	if (key($_REQUEST)!='recipient') {
		$pre_array=split ("&777&",  $request);
		$post_vars[key($_REQUEST)][0]=$pre_array[0];
		$post_vars[key($_REQUEST)][1]=$pre_array[1];
	}
	next($_REQUEST);
}



reset($post_vars);
$subject="From ".$post_vars['your_name'][0] ;
// $headers= "From: ".$post_vars['your_email'][0] ."\n";
$headers= "From: correos@novoflor.com.ar\n";
 $headers.='Content-type: text/html; charset=iso-8859-1';
 $message='';
  while ($mess = current($post_vars)) {
  	if ((key($post_vars)!="i") && (key($post_vars)!="your_name")) {

	 	$message.="<strong>".$mess[1]."</strong>&nbsp;&nbsp;&nbsp;".$mess[0]."<br>";
	}
	next($post_vars);
 }

mail($_REQUEST['recipient'], $subject,  "Pedido recibido desde la Web
<html>
<head>
 <title>Novoflor</title>
</head>
<body>
<br>
  ".$message."
</body>
</html>" , $headers);
echo ("Su mensaje fue enviado con éxito! Confirmaremos su pedido a la brevedad");

?>
<script>
	resizeTo(300, 300);
</script>
