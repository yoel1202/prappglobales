<?php 
session_start();
    require_once("conexion.php");

    
    $conexion = new Conexion();

    if ($_POST['key']=='quitarproducto') {
      eliminardelcarrito($_POST['producto'], $conexion);
    }

if ($_POST['key']=='producto') {
      agregarcarrito($_POST['producto'], $conexion, $_POST['quantity']);
    }

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
   $id=$_POST['idproduct'];

        if ($id != 0) {
       updateproduct($conexion,$id,$subcategoria,$cantidad,$tama,$price,$shipping,$weight,$width,$height,$title,$warranty,$description,$color);
        }else{
       insertproduct($conexion,$subcategoria,$vendedor,$cantidad,$tama,$price,$shipping,$weight,$width,$height,$title,$warranty,$description,$estados,$color);
    }
    }
        if ($_POST['key']=='busqueda') {
         $word= $_POST['words'];
      search($conexion,$word);
    
    }

  if ($_POST['key']=='insertshipping') {
        
         $firstname = $_POST['firstname'];
         $lastname= $_POST['lastname'];
         $address1 = $_POST['address1'];
         $address2 = $_POST['address2'];  
         $city = $_POST['city'];   
         $state = $_POST['state'];   
         $district= $_POST['district'];   
         $zip = $_POST['zip'];  
         $country = $_POST['country'];   
         $users = $_POST['users']; 
      insertshipping($conexion,$firstname,$lastname,$address1,$address2,$city,$state,$district,$zip,$country,$users);
    }

if ($_POST['key']=='registrar') {
        
         $user = $_POST['user'];
         $email= $_POST['email'];
         $nom = $_POST['nom'];
         $tel = $_POST['tel'];  
         $pass = $_POST['pass'];   
         $ced = $_POST['ced'];
      registrar($conexion,$user,$email,$nom,$tel,$pass,$ced);
    }
    if ($_POST['key']=='deleteemail') {
        
         $data = $_POST['data'];
        
      deleteemail($conexion,$data);
    }

      if ($_POST['key']=='deletemsg') {
        
         $data = $_POST['data'];
        
      deletemsg($conexion,$data);
    }

    function deletemsg($conexion,$data){
if($conexion->consulta("DELETE FROM tbl_message WHERE idtbl_message='$data' ")){

      echo "se ha  efectuado correctamente";
    }else{
      echo "error ha efectuar cambios posiblemente correo ya existe o nombre el nombre de u suario";
    }

}

function deleteemail($conexion,$data){
if($conexion->consulta("UPDATE tbl_message SET estado='borrado' WHERE idtbl_message='$data' ")){

      echo "se ha  efectuado correctamente";
    }else{
      echo "error ha efectuar cambios posiblemente correo ya existe o nombre el nombre de u suario";
    }

}

function registrar($conexion,$user,$email,$nom,$tel,$pass,$ced){
if($conexion->consulta(" INSERT INTO tbl_user(idtbl_usuario,nombre_usuario,nombre,cedula,correo,password,telefono,foto,estado,tbl_contract_idtbl_contract) VALUES('','$user','$nom','$ced','$email','$pass','$tel','1','img/Usuario/profile.png','1')")){

      echo "se ha  registrado correctamente";
    }else{
      echo "error ha efectuar cambios posiblemente correo ya existe o nombre el nombre de u suario";
    }

}

function insertshipping($conexion,$firstname,$lastname,$address1,$address2,$city,$state,$district,$zip,$country,$users){
$conexion->consulta("select * from  tbl_shipping where id_user='".$users."'");
$row= $conexion->extraer_registro();
   if($row>0){
if($conexion->consulta("CALL Actualizarshiipinguser('$firstname','$lastname','$address1','$address2','$city','$state','$district','$zip','$country','".$row['0']."')")){

      echo "Se ha efectuado los cambios correctamente";
    }else{
      echo "error a efectuar cambios";
    }
  
   }else{
   if($conexion->consulta("CALL insertshipping('$firstname','$lastname','$address1','$address2','$city','$state','$district','$zip','$country','".$users."')")){

      echo "Se ha efectuado los cambios correctamente";
    }else{
      echo "error ha efectuar cambios";
    }
  }
}



    function search($conexion,$word){
 

 if($conexion->consulta("CALL search('$word')")){
  $search=array();
$i=0;
while($row = $conexion->extraer_registro()){
      $search[$i] = $row;
      $i++;
}
echo json_encode($search);
    }else{

      echo "error";
    }


    }

 function insertproduct($conexion,$subcategoria,$vendedor,$cantidad,$tama,$precio,$envio,$peso,$anchura,$altura,$titulo,$garantia,$descripcion,$estados,$color){

    if($conexion->consulta("CALL insertar('$vendedor','$subcategoria','$peso','$color','$anchura','$altura','$estados','$envio','$cantidad','$tama','$precio','$titulo','$garantia','$descripcion')")){

      echo "Se ha insertado correctamente";
    }

   
   }
   function updateproduct($conexion,$id,$subcategoria,$cantidad,$tama,$precio,$envio,$peso,$anchura,$altura,$titulo,$garantia,$descripcion,$color){

    if($conexion->consulta("CALL Actualizarproducto('$id','$subcategoria','$peso','$color','$anchura','$altura','$envio','$cantidad','$tama','$precio','$titulo','$garantia','$descripcion')")){

      echo "Se actualizado correctamente";
    }

   
   }

        function cargarsubcategorias($conexion,$id)
    { 
     
        $conexion->consulta("SELECT * FROM  tbl_subcategories WHERE   tbl_categorias_idtbl_categorias='".$id."'");
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
       $conexion->consulta ("SELECT * FROM  tbl_categories ");
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
  $result=$conexion->consulta("SELECT * FROM tbl_seller WHERE nombre_usuario='".$nombre."'   and password='".$pass."'");
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

function agregarcarrito($id_producto,$conexion, $cant){
  $id_cart="";
  $conexion->consulta ("SELECT id_cart FROM tbl_cart where id_user = ". $_SESSION['id'].' AND id_product = '. $id_producto);
                while($row = $conexion->extraer_registro()){
                  $id_cart = $row['0'];      
                }
if($id_cart==""){
  $result=$conexion->consulta("INSERT INTO tbl_cart (id_product, id_user, quantity) VALUES (".$id_producto.",".$_SESSION['id'].",'".$cant."')");
}
else{
  $result=$conexion->consulta("UPDATE tbl_cart set quantity =(quantity+".$cant.") WHERE tbl_cart.id_product= ".$id_producto);
}

  $conexion->consulta ("SELECT (SUM(quantity)) FROM  tbl_cart where id_user = ". $_SESSION['id']);
                while($row = $conexion->extraer_registro()){
                  echo $row['0'];
                }
}

function eliminardelcarrito($id_producto,$conexion){

  $result=$conexion->consulta("DELETE FROM tbl_cart WHERE tbl_cart.id_product= ".$id_producto);


}


 ?>