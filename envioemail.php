
<?php



	// Opción 6

		$to = "destinatario@dominio.es";
		$subject = "Activación";
		$body = "<html><head><title>Clave de activación. </title></head>";
		$body .= "<body>Su clave de activación es $claveactiva . <br><br>";
		$body .= "Cualquier problema envíe un email soporte@dominio.es</body></html>";
		$header = "MIME-Version: 1.0\n";
		$header .= "Content-type: text/html; charset=iso-8859-1\n";
		$header .= "From: Hola <remitente@dominio.es>\r\n";
		mail($to, $subject, $body, $header);

	// Opción 5

	function sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject, $template){
		require 'PHPMailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->isSMTP();                            // Establecer el correo electrónico para utilizar SMTP
		$mail->Host = 'smtp.gmail.com';             // Especificar el servidor de correo a utilizar 
		$mail->SMTPAuth = true;                     // Habilitar la autenticacion con SMTP
		$mail->Username = $mail_username;          	// Correo electronico saliente ejemplo: tucorreo@gmail.com
		$mail->Password = $mail_userpassword; 		// Tu contraseña de gmail
		$mail->SMTPSecure = 'tls';                  // Habilitar encriptacion, `ssl` es aceptada
		$mail->Port = 587;                          // Puerto TCP  para conectarse 
		$mail->setFrom($mail_setFromEmail, $mail_setFromName);//Introduzca la dirección de la que debe aparecer el correo electrónico. Puede utilizar cualquier dirección que el servidor SMTP acepte como válida. El segundo parámetro opcional para esta función es el nombre que se mostrará como el remitente en lugar de la dirección de correo electrónico en sí.
		$mail->addReplyTo($mail_setFromEmail, $mail_setFromName);//Introduzca la dirección de la que debe responder. El segundo parámetro opcional para esta función es el nombre que se mostrará para responder
		$mail->addAddress($mail_addAddress);   // Agregar quien recibe el e-mail enviado
		$message = file_get_contents($template);
		$message = str_replace('{{first_name}}', $mail_setFromName, $message);
		$message = str_replace('{{message}}', $txt_message, $message);
		$message = str_replace('{{customer_email}}', $mail_setFromEmail, $message);
		$mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML
		
		$mail->Subject = $mail_subject;
		$mail->msgHTML($message);
		if(!$mail->send()) {
			echo '<p style="color:red">No se pudo enviar el mensaje..';
			echo 'Error de correo: ' . $mail->ErrorInfo;
			echo "</p>";
		} else {
			echo '<p style="color:green">Tu mensaje ha sido enviado!</p>';
		}
	}


	// Opción 4

	$to = "destinatario@dominio.es";
	$subject = "Testeando mail";
	$message = "Hola! Esto es un simple mensaje de ejemplo.";
	$from = "remitente@dominio.es";
	$headers = "From:" . $from;

	mail($to, $subject, $message, $headers);
	echo "Mail enviado a destinatario@dominio.es.";
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

	// Genero un randomke
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
