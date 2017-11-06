<?php

foreach ($_FILES["foto"]["error"] as $key => $error) {
      if ($_FILES['foto']['name'][$key]!="") {

          $temporal = $_FILES['foto']['tmp_name'][$key];
          $nombre = $_FILES['foto']['name'][$key];
          $tipo = $_FILES['foto']['type'][$key];

        if ($_POST['srcfoto'.($key+1)]!="") {
          actualizar($nombre,$temporal,$tipo,$_POST['srcfoto'.($key+1)]);
        }
        else
        {
         insertar($nombre,$temporal,$tipo);
        } 
      }
  }
    



  header("location: productstosell.php");

function insertar($nombre,$temporal,$tipo){
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
  die("No se puedo subir archivo formato incompatible");
}

$ancho_original = imagesx($original);

$alto_original = imagesy($original);
$ancho_nuevo =500;
$alto_nuevo = 375;
$copia = imagecreatetruecolor($ancho_nuevo,$alto_nuevo);
 
 imagecopyresampled($copia, $original, 0, 0, 0, 0,$ancho_nuevo, $alto_nuevo, $ancho_original, $alto_original);

 imagejpeg($copia,"img/productos/".$nombre_final,100);

 $conexion->consulta("INSERT INTO tbl_photo(picture_code,tbl_productos_idtbl_productos) VALUES('img/productos/".$nombre_final."',".$_POST['iddelproducto'].")");
}

function actualizar($nombre,$temporal,$tipo,$idfoto){
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
  die("No se puedo subir archivo formato incompatible");
}

$ancho_original = imagesx($original);

$alto_original = imagesy($original);
$ancho_nuevo =500;
$alto_nuevo = 375;
$copia = imagecreatetruecolor($ancho_nuevo,$alto_nuevo);
 
 imagecopyresampled($copia, $original, 0, 0, 0, 0,$ancho_nuevo, $alto_nuevo, $ancho_original, $alto_original);

 imagejpeg($copia,"img/productos/".$nombre_final,100);
   
 $conexion->consulta("UPDATE tbl_photo SET picture_code='img/productos/".$nombre_final."' WHERE idtbl_photo=".$idfoto);
}

?>