<?php

	// Opción 4

	$to = "destinatario@dominio.es";
	$subject = "Testeando mail";
	$message = "Hello! This is a simple email message.";
	$from = "remitente@dominio.es";
	$headers = "From:" . $from;

	mail($to, $subject, $message, $headers);
	echo "Mail Sent to destinatario@dominio.es.";
	exit("Fin");


	// Opción 3

	$mail = "Prueba de mensaje";
	//Titulo
	$titulo = "Título";
	//cabecera
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	//dirección del remitente
	$headers .= "From: Geeky < remitente@dominio.es >\r\n";
	//Enviamos el mensaje a tu_dirección_email
	$bool = mail("destinatario@dominio.es",$titulo,$mail,$headers);
	if($bool){
	    echo "Mensaje enviado";
		}else{
		    echo "Mensaje no enviado";
		}


	// Opción 2

	$to = "destinatario@dominio.es, destinatario2@dominio.es, destinatario3@dominio.es";
	$subject = "Asunto del email";
	$message = "Envío de email con PHP";
	$headers = "From: remitente@dominio.es" . "\r\n" . "CC: remitente2@dominio.es";

	mail($to, $subject, $message, $headers);



	// Opción 1

	// Género un randomke
	$random_key = generate_random_key();
	$validated = 0;
	$email = "kodeispoetry@gmail.com";

	// Enviar un mensaje para confirmar la dirección de email introducida
	mail($email,"Activación de la cuenta",
				     "Gracias por registrarse en nuestro sitio.
				     Su cuenta ha sido creada, y debe ser activada antes de poder ser utilizada.
				     Para activar la cuenta, haga click en el siguiente enlace o copielo en la
				     barra de direcciones del navegador:
				     http://activate.php?activation=".$random_key);



	function generate_random_key() {
	    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";

	    $new_key = "";
	    for ($i = 0; $i < 32; $i++) {
	        $new_key .= $chars[rand(0,35)];
	    }
	    return $new_key;
	}

?>
