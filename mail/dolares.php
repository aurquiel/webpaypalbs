<?php
// Check for empty fields
if(empty($_POST['namePaypal'])  		||
   empty($_POST['emailPaypal']) 		||
   empty($_POST['dolaresPaypal'])	||
   !filter_var($_POST['emailPaypal'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$namePaypal = $_POST['namePaypal'];
$emailPaypal = $_POST['emailPaypal'];
$dolaresPaypal = $_POST['dolaresPaypal'];
$paypalComision = ($dolaresPaypal*0.054)+0.3; 
$nuestraComisionPaypal = $dolaresPaypal*0.007;
$dolaresConvertir = ($dolaresPaypal - $paypalComision - $nuestraComisionPaypal);
$bolivares =  $dolaresConvertir * 261000;
	
// Create the email and send the message
$to = 'void@localhost'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Nueva Cotizacion Paypal de:  $namePaypal";
$email_body = "Tienes una nueva cotizacion para cambiar dolares de Paypal.\n\n"."Estos son los detalles:\n\nNombre: $namePaypal\n\nEmail: $emailPaypal\n\nNeto Dolares: $dolaresPaypal $\n\nComision Paypal: $paypalComision\n\nComision Nuestra: $nuestraComisionPaypal\n\nSubtotal Dolares: $dolaresConvertir\n\nBolivares: $bolivares\n\n";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $emailPaypal";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>
