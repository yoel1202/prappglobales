<?php
 

foreach ($_FILES["foto"]["error"] as $key => $error) {
   if ($error == UPLOAD_ERR_OK) {
       
       
        $temporal = $_FILES['foto']['tmp_name'][$key];
        $nombre = $_FILES['foto']['name'][$key];
        $tipo = $_FILES['foto']['type'][$key];
       subirimagen($nombre,$temporal,$tipo);
   }
}


   header("location: productstosell.php");



function subirimagen($nombre,$temporal,$tipo){
  session_start();
  require_once("conexion.php"); $conexion = new Conexion();
  $array_nombre = explode('.', $nombre);
$extension = array_pop($array_nombre);

$array = glob("img/productos/".$array_nombre[0]."*.".$extension);
$cantidad = count($array);

$nombre_final = $array_nombre[0].$cantidad.".".$extension;

if($tipo=='image/jpeg'){

  $original = imagecreatefromjpeg($temporal);
}elseif ($tipo=='image/png') {
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

 imagejpeg($copia,"img/productos/".$nombre_final,100);
   $conexion->consulta("SELECT max(idtbl_productos) from tbl_productos");
$row= $conexion->extraer_registro();
 $conexion->consulta("CALL Actualizarfoto(' img/productos/".$nombre_final."','".$row[0]."')");
}

?>