<?php

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
