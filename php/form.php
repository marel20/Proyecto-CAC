<?php 
	$nombre = $_POST['name'];
	$email = $_POST['email'];
	$bussines = $_POST['bussines'];
	$affair = $_POST['affair'];
	$mensaje = "Nombre: ".$nombre."\nCompania: ".$bussines."\nEmail: ".$email."\nMensaje:\n\n".$_POST['message'];


	if(mail('info@mgsolutions.com.ar', $affair, $mensaje)){
		echo  '<script language="javascript"> alert ("Su consulta fue enviada. Responderemos en breve."); window.location.href="../#contact" </script>';
	} else {
        echo '<script language="javascript"> alert ("Ocurrio un error inesperado, intente de nuevo mas tarde"); window.location.href="../#contact" </script>';
}
 ?>



