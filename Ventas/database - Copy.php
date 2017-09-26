<?php
session_start();

    require_once("conexion.php");

    
    $conexion = new Conexion();

if ($_POST['key']=='login') {
        
         $pass = $_POST['pass'] ;
        $nombre = $_POST['user'];
     
        //invocamos la funcion insertar
       login($nombre,$pass);
    
    }

    if ($_POST['key']=='close') {
        
        
     
     close();
    
    }
  if ($_POST['key']=='cargarcategorias') {
        
      cargarcategorias();
    

    }

      if ($_POST['key']=='cargarsubcategorias') {
         $id = $_POST['id'];
      cargarsubcategorias($id);
    
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
           $estado = $_POST['estado'];
     $color = $_POST['color'];
     // insertproduct($subcategoria,$vendedor,$cantidad,$tama,$price,$shipping,$weight,$width,$height,$title,$warranty,$description,$estado,$color);
    }

   
//     function insertproduct($subcategoria,$vendedor,$cantidad,$tama,$precio,$envio,$peso,$anchura,$altura,$titulo,$garantia,$descripcion,$estado,$color){
//      include("conexion.php");
// $dbs = new BaseDatos();

//    if( $dbs->consulta("CALL insertarproductos($vendedor,$subcategoria,$peso,$color,$anchura,$altura,$estado,$envio,$cantidad,$tama,$precio,$titulo,$garantia,$descripcion)")){

//  echo "Se ha insertado correctamente";
//  }

// $dbs->desconectar();
//     }

    function cargarsubcategorias($id)
    { 
     
       $result=$db->consulta("SELECT * FROM  tbl_subcategorias WHERE   tbl_categorias_idtbl_categorias='".$id."'");
$categoria= array();
$i = 0;
while($row=mysqli_fetch_array($result)){
      $categoria[$i] = $row;
    
$i++; 

}

    }

    function cargarcategorias()
    {
       $conexion->consulta ("SELECT * FROM  tbl_categorias ");
$categoria= array();
$i = 0;
while($row=mysqli_fetch_array($result)){
      $categoria[$i] = $row;
    
$i++; 

echo json_encode($categoria);

    }



function close(){

	session_destroy();
}

function login($nombre,$pass){

$result=mysqli_query(con(),"SELECT * FROM tbl_user WHERE nombre_usuario='".$nombre."'   and password='".$pass."'");
$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
// If result matched $username and $password, table row  must be 1 row
if($row>0)
{
$_SESSION['id']=$row["idtbl_usuario"];
$_SESSION['nombre']=$nombre;
$_SESSION['tipo']="user";
echo "se ha iniciado correctamente";

}else{
$result=mysqli_query(con(),"SELECT * FROM tbl_vendedor WHERE nombre_usuario='".$nombre."'   and password='".$pass."'");
$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
// If result matched $username and $password, table row  must be 1 row
if($row>0)
{
$_SESSION['id']=$row["idtbl_vendedor"];
$_SESSION['nombre']=$nombre;
$_SESSION['tipo']="administrador";
echo "se ha iniciado correctamente";

}

}


mysqli_close(con());
}



  ?>