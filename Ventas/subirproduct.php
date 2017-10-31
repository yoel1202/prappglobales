<?php
  session_start();
  require_once("conexion.php"); $conexion = new Conexion();
foreach ($_FILES["foto"]["error"] as $key => $error) {
   if ($error == UPLOAD_ERR_OK) {
       echo"$error_codes[$error]";
       
        $temporal = $_FILES['foto']['tmp_name'][$key],
        $nombre = $_FILES['foto']['name'][$key]
       subirimagen($nombre,$temporal);
   }
}

 

// $nombre = $_POST['nombre'];
// $usuario = $_POST['usuario'];
// $cedula = $_POST['cedula'];
// $correo = $_POST['correo'];
// $telefono = $_POST['telefono'];
// $pass = $_POST['pass'];


  
// if($conexion->consulta("CALL Actualizarperfiluser('".$_SESSION['id']."','".$usuario."','".$nombre."','".$cedula."','".$correo."','".$pass."','".$telefono."','"."img/Usuario/".$nombre_final.
// "')")){
//   echo '<script language="javascript">alert("Se han guardado los cambios correctamente");</script>'; 

//    header("location: profile.php");
//   }else{
//   echo '<script language="javascript">alert( "Se ha producido un error");</script>';
//    header("location: profile.php");
// }
  
//     }
//   }else{
//   	$nombre = $_POST['nombre'];
// $usuario = $_POST['usuario'];
// $cedula = $_POST['cedula'];
// $correo = $_POST['correo'];
// $telefono = $_POST['telefono'];
// $pass = $_POST['pass'];

	
//  if($conexion->consulta("CALL Actualizarperfilusertexto('".$_SESSION['id']."','".$usuario."','".$nombre."','".$cedula."','".$correo."','".$pass."','".$telefono."')")){
//   echo '<script language="javascript">alert("Se han guardado los cambios correctamente");</script>'; 

//    header("location: profile.php");
//   }else{
//   echo '<script language="javascript">alert( "Se ha producido un error");</script>';
//    header("location: profile.php");
// }
// }

function subirimagen($nombre,$temporal){

  $array_nombre = explode('.', $nombre);
$extension = array_pop($array_nombre);

$array = glob("img/Vendedor/".$array_nombre[0]."*.".$extension);
$cantidad = count($array);

$nombre_final = $array_nombre[0].$cantidad.".".$extension;

if($_FILES['foto']['type']=='image/jpeg'){

  $original = imagecreatefromjpeg($temporal);
}elseif ($_FILES['foto']['type']=='image/png') {
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
   $result=$conexion->consulta("SELECT max(idtbl_productos) from tbl_productos");
$row= $conexion->extraer_registro();
 $conexion->consulta("CALL Actualizarfoto(,' img/Vendedor/".$nombre_final."','".$row[0]."')")
}

?>