<?php
  session_start();
  require_once("conexion.php"); $conexion = new Conexion();
 
if ( isset( $_FILES['archivo'] ) && !empty( $_FILES['archivo']['tmp_name']) ) {
    if ( is_uploaded_file( $_FILES['archivo']['tmp_name']) && $_FILES["archivo"]["error"] === 0 ) {


      
$temporal = $_FILES['archivo']['tmp_name'];
$nombre = $_FILES['archivo']['name'];
$array_nombre = explode('.', $nombre);
$extension = array_pop($array_nombre);

$array = glob("img/Vendedor/".$array_nombre[0]."*.".$extension);
$cantidad = count($array);

$nombre_final = $array_nombre[0].$cantidad.".".$extension;

if($_FILES['archivo']['type']=='image/jpeg'){

	$original = imagecreatefromjpeg($temporal);
}elseif ($_FILES['archivo']['type']=='image/png') {
	$original = imagecreatefrompng($temporal);
}else
{
	die("no se puedo subir archivo extentension incompatible");
}

$ancho_original = imagesx($original);

$alto_original = imagesy($original);
$ancho_nuevo =500;
$alto_nuevo = 375;
$copia = imagecreatetruecolor($ancho_nuevo,$alto_nuevo);
 
 imagecopyresampled($copia, $original, 0, 0, 0, 0,$ancho_nuevo, $alto_nuevo, $ancho_original, $alto_original);

 imagejpeg($copia,"img/Vendedor/".$nombre_final,100);
 

$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$cedula = $_POST['cedula'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$pass = $_POST['pass'];


  
if($conexion->consulta("CALL Actualizarconfotovendedor('".$_SESSION['id']."','".$usuario."','".$nombre."','".$cedula."','".$correo."','".$pass."','".$telefono."','"."img/Vendedor/".$nombre_final.
"')")){
  echo '<script language="javascript">alert("Se han guardado los cambios correctamente");</script>'; 

   header("location: profileadmi.php");
  }else{
  echo '<script language="javascript">alert( "Se ha producido un error");</script>';
   header("location: profileadmi.php");
}
  
    }
  }else{
  	$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$cedula = $_POST['cedula'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$pass = $_POST['pass'];

	
 if($conexion->consulta("CALL Actualizarvendedortexto('".$_SESSION['id']."','".$usuario."','".$nombre."','".$cedula."','".$correo."','".$pass."','".$telefono."')")){
  echo '<script language="javascript">alert("Se han guardado los cambios correctamente");</script>'; 

   header("location: profileadmi.php");
  }else{
  echo '<script language="javascript">alert( "Se ha producido un error");</script>';
   header("location: profileadmi.php");
}
}



?>