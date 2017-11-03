<?php 

require_once("conexion.php"); $conexion = new Conexion();
if (isset($_POST['mensaje']) and isset($_POST['email'])) {
$conexion->consulta("CALL EnviarMensajeAdmi('".$_POST['mensaje']."','".$_POST['email']."')");
}


 ?>