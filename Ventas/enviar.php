<?php
	
	$destino= $_POST["emailEmp"];
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$email = $_POST["email"];
	$mensaje = $_POST["mensaje"];
	$contenido = "Nombre: " . $nombre . "\nApellido: " . $apellido . "\nEmail: " . $email . "\nMensaje: " . $mensaje; 
	mail($destino,"Mensaje Nuevo", $contenido);
	
	header("Location: message.php");
	
?>