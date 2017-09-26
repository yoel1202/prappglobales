<?php 
session_start();
    require_once("conexion.php");

    
    $conexion = new Conexion();

if ($_POST['key']=='login') {
        
         $pass = $_POST['pass'] ;
        $nombre = $_POST['user'];
     
        //invocamos la funcion insertar
       login($conexion,$nombre,$pass);
    
    }
     if ($_POST['key']=='close') {
        
        
     
     close();
    
    }

    if ($_POST['key']=='cargarcategorias') {
        
      cargarcategorias($conexion);
    

    }

      if ($_POST['key']=='cargarsubcategorias') {
         $id = $_POST['id'];
      cargarsubcategorias($conexion,$id);
    
    }
  if ($_POST['key']=='insertproduct') {
        
         $subcategoria = $_POST['subcategoria'];
         $vendedor= $_POST['vendedor'];
         $cantidad = $_POST['cantidad'];
         $tama = $_POST['tama'];  
         $price = $_POST['price'];   
         $shipping = $_POST['shipping'];   
         $weight= $_POST['weight'];   
         $width = $_POST['width'];  
         $height = $_POST['height'];   
         $title = $_POST['title'];   
         $warranty = $_POST['warranty'];
           $description = $_POST['description'];
           $estados = $_POST['estado'];
     $color = $_POST['color'];
      insertproduct($conexion,$subcategoria,$vendedor,$cantidad,$tama,$price,$shipping,$weight,$width,$height,$title,$warranty,$description,$estados,$color);
    }

 function insertproduct($conexion,$subcategoria,$vendedor,$cantidad,$tama,$precio,$envio,$peso,$anchura,$altura,$titulo,$garantia,$descripcion,$estados,$color){

    if($conexion->consulta("CALL insertar('$vendedor','$subcategoria','$peso','$color','$anchura','$altura','$estados','$envio','$cantidad','$tama','$precio','$titulo','$garantia','$descripcion')")){

      echo "ok";
    }

   
   }

        function cargarsubcategorias($conexion,$id)
    { 
     
        $conexion->consulta("SELECT * FROM  tbl_subcategorias WHERE   tbl_categorias_idtbl_categorias='".$id."'");
$subcategoria= array();
$i = 0;
while($row = $conexion->extraer_registro()){
      $subcategoria[$i] = $row;
    
$i++; 

}
echo json_encode($subcategoria);
    }


        function cargarcategorias($conexion)
    {
       $conexion->consulta ("SELECT * FROM  tbl_categorias ");
$categoria= array();
$i = 0;
while($row = $conexion->extraer_registro()){
      $categoria[$i] = $row;
    
$i++; 
}
echo json_encode($categoria);

    
  }



    function close(){
 
  session_destroy();


}

function login($conexion,$nombre,$pass){
$result=$conexion->consulta("SELECT * FROM tbl_user WHERE nombre_usuario='".$nombre."'   and password='".$pass."'");
$row= $conexion->extraer_registro();
   if($row>0)
{
  $_SESSION['id']=$row[0];
  $_SESSION['nombre']=$nombre;
  $_SESSION['tipo']="user";
echo "se ha iniciado correctamente";
}else{
  $result=$conexion->consulta("SELECT * FROM tbl_vendedor WHERE nombre_usuario='".$nombre."'   and password='".$pass."'");
$row= $conexion->extraer_registro();
if($row>0)
 {
 $_SESSION['id']=$row[0];
 $_SESSION['nombre']=$nombre;
 $_SESSION['tipo']="administrador";
 echo "se ha iniciado correctamente";

 }
}
}


 ?>