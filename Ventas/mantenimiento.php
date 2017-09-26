<?php 
function con()
{
	include("conexion.php");

	return $con;
}
   if ($_POST['key']=='insertcate') {
         $id = $_POST['id'] ;
          $name = $_POST['name'] ;
           $description= $_POST['description'] ;
           
         insertcate($id,$name,$description);
    
    }



if ($_POST['key']=='cargaradmi') {
        
         cargaradmi();
    
    }
    if ($_POST['key']=='editaradmi') {
         $id = $_POST['id'] ;
          $name = $_POST['name'] ;
           $page= $_POST['page'] ;
            $pass = $_POST['pass'] ;
             $id2 = $_POST['id2'] ;
         editadmi($id,$name,$page,$pass,$id2);
    
    }

   
      if ($_POST['key']=='insertadmi') {
         $id = $_POST['id'] ;
          $name = $_POST['name'] ;
           $page= $_POST['page'] ;
            $pass = $_POST['pass'] ;
         insertaradmi($id,$name,$page,$pass);
    
    }

      if ($_POST['key']=='cleanadmi') {
         $id = $_POST['id'] ;
          
         cleanadmi($id);
    
    }

      if ($_POST['key']=='cleandeal') {
         $id = $_POST['id'] ;
          
         cleandeal($id);
    
    }

     if ($_POST['key']=='buscaradmi') {
         $dato = $_POST['dato'] ;
          
         buscaradmi($dato);
    
    }
    if ($_POST['key']=='cargarcontrato') {
        
         cargarcontrato();
    
    }

  if ($_POST['key']=='editarcontrato') {
         $id = $_POST['id'] ;
          $page = $_POST['page'] ;
           $agree= $_POST['agree'] ;
            $help = $_POST['help'] ;
             $id2 = $_POST['id2'] ;
         editarcontrato($id,$page,$agree,$help,$id2);
    
    }
     if ($_POST['key']=='insertdeal') {
         $id = $_POST['id'] ;
          $page = $_POST['page'] ;
           $agree= $_POST['agree'] ;
            $help = $_POST['help'] ;
         insertardeal($id,$page,$agree,$help);
    
    }
     if ($_POST['key']=='buscardeal') {
         $dato = $_POST['dato'] ;
          
         buscardeal($dato);
    
    } 
    if ($_POST['key']=='cargarcate') {
        
         cargarcate();
    
    }
      if ($_POST['key']=='editcategories') {
         $id = $_POST['id'] ;
          $name = $_POST['name'] ;
           $description= $_POST['description'] ;
          
             $id2 = $_POST['id2'] ;
         editcategories($id,$name,$description,$id2);
    
    }
       if ($_POST['key']=='deletecategorie') {
         $id = $_POST['id'] ;
          
         deletecategorie($id);
    
    }
    if ($_POST['key']=='searchcategorie') {
         $dato = $_POST['dato'] ;
          
         searchcategorie($dato);
    
    } 
       if ($_POST['key']=='loadcomment') {
        
         loadcomment();
    
    }
       if ($_POST['key']=='key') {
        
         cargarcombox("SELECT idtbl_usuario From tbl_user","idtbl_usuario");
    
    }
       if ($_POST['key']=='key2') {
        
         cargarcombox("SELECT  idtbl_vendedor From tbl_vendedor","idtbl_vendedor");
    
    }
     if ($_POST['key']=='insertcomments') {
         $id = $_POST['id'] ;
          $comment = $_POST['comment'] ;
           $key1= $_POST['key1'] ;
            $key2 = $_POST['key2'] ;
            
         insert("INSERT INTO tbl_comments(idtbl_comments,comments,tbl_user_idtbl_usuario,tbl_vendedor_idtbl_vendedor) VALUES('".$id."','".$comment."','".$key1."','".$key2."')");
   }

        if ($_POST['key']=='editcomments') {
         $id = $_POST['id'] ;
          $comments = $_POST['comments'] ;
           $key1= $_POST['key1'] ;
            $key2 = $_POST['key2'] ;
              $id2 = $_POST['id2'] ;
         edit("UPDATE tbl_comments SET idtbl_comments='".$id."',comments='".$comments."',tbl_user_idtbl_usuario='".$key1."',tbl_vendedor_idtbl_vendedor='".$key2."' WHERE idtbl_comments='".$id2."' ");
   }
     if ($_POST['key']=='deletecomments') {
         $id = $_POST['id'] ;
          
         delete("DELETE FROM tbl_comments WHERE idtbl_comments='".$id."' ");
    
    }

    if ($_POST['key']=='searchcomments') {
         $dato = $_POST['dato'] ;
          
         searchcomments($dato);
    
    }
function searchcomments($dato)
    {
      
   $output = '';  
 $sql = "SELECT * From  tbl_comments where idtbl_comments Like '%".$dato."%' OR comments LIKE '%".$dato."%' ";  
 $result = mysqli_query(con(), $sql);  

 if(mysqli_num_rows($result) > 0)  
 {  

   $output .= '  
      <div class="table-responsive">  
           <table id="mytable" class="table table-bordred">
                   
                    <thead>             
                   <th>idtbl_comments</th>
                    <th>comments</th>
                     <th>usuario</th>
                     <th>vendedor</th>
                       <th>Editar</th>
                       <th>Eliminar</th>
                       <th>Añadir</th>
                   </thead>';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
               <tr>
    <td class="id"  >'.$row["idtbl_comments"].'</td>
    <td class="comments"  >'.$row["comments"].'</td>
    <td class="tbl_user_idtbl_usuario"     >'.$row["tbl_user_idtbl_usuario"].'</td>
    <td class="tbl_vendedor_idtbl_vendedor"  >'.$row["tbl_vendedor_idtbl_vendedor"].'</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button id="btn_edit" data-id5="'.$row["idtbl_comments"].'" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>

    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btn_delete" data-id6="'.$row["idtbl_comments"].'" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
 </tr>  
           ';  
      }  
   $output .= '</table>  
      </div>'; 
 } else  
 {  
      echo 'No se ha encontrado informacion';  
 }  
 
  
 echo $output;  
    }
  function delete($sql)
    {
     if(mysqli_query(con(),$sql) ){

echo "Se ha Eliminado correctamente ";

}else{

echo "Se ha producido un error";

}
}
   function edit($sql)
{
       
   if(mysqli_query(con(),$sql) ){

echo "Se ha modificado correctamente ";

}else{

echo "Se ha producido un error";

}

}
function insert($sql)
{ 
    
   if(mysqli_query(con(),$sql) ){

echo "Se ha insertado correctamente ";

}else{

echo "error";
 

}

}

     function cargarcombox($sql,$elemento){

$result=mysqli_query(con(),$sql) or die("error");

while($row=mysqli_fetch_array($result)){
   
   echo '<option >'.$row["$elemento"].'</option>';
}

}
    function loadcomment()
{


  
   $output = '';  
 $sql = "SELECT * From tbl_comments";  
 $result = mysqli_query(con(), $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table id="mytable" class="table table-bordred">
                   
                   <thead>             
                   <th>idtbl_comments</th>
                    <th>comments</th>
                     <th>usuario</th>
                     <th>vendedor</th>
                       <th>Editar</th>
                       <th>Eliminar</th>
                       <th>Añadir</th>
                   </thead>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
               <tr>
    <td class="id"  >'.$row["idtbl_comments"].'</td>
    <td class="comments"  >'.$row["comments"].'</td>
    <td class="tbl_user_idtbl_usuario"     >'.$row["tbl_user_idtbl_usuario"].'</td>
    <td class="tbl_vendedor_idtbl_vendedor"  >'.$row["tbl_vendedor_idtbl_vendedor"].'</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button id="btn_edit" data-id5="'.$row["idtbl_comments"].'" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>

    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btn_delete" data-id6="'.$row["idtbl_comments"].'" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
 </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
               
                 <th></th>
                    <th></th>
                     <th></th>
                     <th></th>
                      <th></th>
                     <th></th>
                 
                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btn_add"  class="btn btn-xs btn-success" data-title="Delete" data-toggle="modal" data-target="#insert" ><span class="glyphicon glyphicon-plus"></span></button></p></td>
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= ' <tr>  
                <th></th>
                    <th></th>
                     <th></th>
                     <th></th>
                      <th></th>
                     <th></th>
                 
                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btn_add" class="btn btn-xs btn-success" data-title="Delete" data-toggle="modal" data-target="#insert" ><span class="glyphicon glyphicon-plus"></span></button></p></td> 
           </tr>   ';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 
}
    function searchcategorie($dato)
    {
      
   $output = '';  
 $sql = "SELECT * From  tbl_categorias where idtbl_categorias Like '%".$dato."%' OR nombre_categoria LIKE '%".$dato."%' ";  
 $result = mysqli_query(con(), $sql);  

 if(mysqli_num_rows($result) > 0)  
 {  

   $output .= '  
      <div class="table-responsive">  
           <table id="mytable" class="table table-bordred">
                   
                    <thead>             
                   <th>idtbl_categorias</th>
                    <th>nombre_categoria</th>
                     <th>descripion</th>
                       <th>Editar</th>
                       <th>Eliminar</th>
                       <th>Añadir</th>
                   </thead>';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
               <tr>
     <td class="id"   >'.$row["idtbl_categorias"].'</td>
    <td class="name"  >'.$row["nombre_categoria"].'</td>
    <td class="descripcion"   >'.$row["descripcion"].'</td>
  
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button id="btn_edit" data-id5="'.$row["idtbl_categorias"].'" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>

    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btn_delete" data-id6="'.$row["idtbl_categorias"].'" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
 </tr>  
           ';  
      }  
   $output .= '</table>  
      </div>'; 
 } else  
 {  
      echo 'No se ha encontrado informacion';  
 }  
 
  
 echo $output;  
    }

  function deletecategorie($id)
    {
     if(mysqli_query(con(),"DELETE FROM tbl_categorias WHERE idtbl_categorias='".$id."'") ){

echo "Se ha Eliminado correctamente ";

}else{

echo "Se ha producido un error";

}
}
function editcategories($id,$name,$description,$id2)
{
       
   if(mysqli_query(con(),"UPDATE tbl_categorias SET idtbl_categorias='".$id."',nombre_categoria='".$name."',descripcion='".$description."' WHERE idtbl_categorias='".$id2."' ") ){

echo "Se ha modificado correctamente ";

}else{

echo "Se ha producido un error";

}

}

      function insertcate($id,$name,$description)
{ 

   if(mysqli_query(con()," INSERT INTO  tbl_categorias(idtbl_categorias,nombre_categoria,descripcion) VALUES('".$id."','".$name."','".$description."')") ){

echo "Se ha insertado correctamente ";

}else{

echo $id;
 

}

}

 function buscardeal($dato)
    {
      
   $output = '';  
 $sql = "SELECT * From tbl_agreement where idtbl_agreement Like '%".$dato."%' OR agreement LIKE '%".$dato."%' ";  
 $result = mysqli_query(con(), $sql);  

 if(mysqli_num_rows($result) > 0)  
 {  

   $output .= '  
      <div class="table-responsive">  
           <table id="mytable" class="table table-bordred">
                   
                    <thead>             
                   <th>idtbl_agreement</th>
                    <th>tbl_page_idtbl_page</th>
                     <th>agreement</th>
                     <th>help</th>
                       <th>Editar</th>
                       <th>Eliminar</th>
                       <th>Añadir</th>
                   </thead>';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
               <tr>
    <td class="id" data-id1="'.$row["idtbl_agreement"].'"  >'.$row["idtbl_agreement"].'</td>
    <td class="nombre" data-id2="'.$row["tbl_page_idtbl_page"].'" >'.$row["tbl_page_idtbl_page"].'</td>
    <td class="page" data-id3="'.$row["agreement"].'"    >'.$row["agreement"].'</td>
    <td class="pass" data-id4="'.$row["help"].'"     >'.$row["help"].'</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button id="btn_edit" data-id5="'.$row["idtbl_agreement"].'" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>

    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btn_delete" data-id6="'.$row["idtbl_agreement"].'" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
 </tr>  
           ';  
      }  
   $output .= '</table>  
      </div>'; 
 } else  
 {  
      echo 'No se ha encontrado informacion';  
 }  
 
  
 echo $output;  
    }

  function insertardeal($id,$page,$agree,$help)
{ 

   if(mysqli_query(con()," INSERT INTO tbl_agreement(idtbl_agreement,tbl_page_idtbl_page,agreement,help) VALUES('".$id."','".$page."','".$agree."','".$help."')") ){

echo "Se ha insertado correctamente ";

}else{

echo $id;
     echo  $agree;

}

} 
    function buscaradmi($dato)
    {
    	
   $output = '';  
 $sql = "SELECT * From tbl_administrador where idtbl_administrador Like '%".$dato."%' OR nombre LIKE '%".$dato."%' ";  
 $result = mysqli_query(con(), $sql);  

 if(mysqli_num_rows($result) > 0)  
 {  

 	 $output .= '  
      <div class="table-responsive">  
           <table id="mytable" class="table table-bordred">
                   
                   <thead>             
                   <th>idtbl_administrador</th>
                    <th>nombre</th>
                     <th>tbl_page_idtbl_page</th>
                     <th>password</th>
                       <th>Editar</th>
                       <th>Eliminar</th>
                       <th>Añadir</th>
                   </thead>';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
               <tr>
    <td class="id" data-id1="'.$row["idtbl_administrador"].'"  >'.$row["idtbl_administrador"].'</td>
    <td class="nombre" data-id2="'.$row["nombre"].'" >'.$row["nombre"].'</td>
    <td class="page" data-id3="'.$row["tbl_page_idtbl_page"].'"    >'.$row["tbl_page_idtbl_page"].'</td>
    <td class="pass" data-id4="'.$row["password"].'"     >'.$row["password"].'</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button id="btn_edit" data-id5="'.$row["idtbl_administrador"].'" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>

    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btn_delete" data-id6="'.$row["idtbl_administrador"].'" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
 </tr>  
           ';  
      }  
   $output .= '</table>  
      </div>'; 
 } else  
 {  
      echo 'No se ha encontrado informacion';  
 }  
 
  
 echo $output;  
    }



    function cleandeal($id)
    {
     if(mysqli_query(con(),"DELETE FROM  tbl_agreement WHERE idtbl_agreement='".$id."' ") ){

echo "Se ha Eliminado correctamente ";

}else{

echo "Se ha producido un error";

}



    }
function cleanadmi($id)
{
	 if(mysqli_query(con(),"DELETE FROM tbl_administrador WHERE idtbl_administrador='".$id."' ") ){

echo "Se ha Eliminado correctamente ";

}else{

echo "Se ha producido un error";

}
}

function cargaradmi()
{


  
   $output = '';  
 $sql = "SELECT * From tbl_administrador";  
 $result = mysqli_query(con(), $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table id="mytable" class="table table-bordred">
                   
                   <thead>             
                   <th>idtbl_administrador</th>
                    <th>nombre</th>
                     <th>tbl_page_idtbl_page</th>
                     <th>password</th>
                       <th>Editar</th>
                       <th>Eliminar</th>
                       <th>Añadir</th>
                   </thead>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
               <tr>
    <td class="id" data-id1="'.$row["idtbl_administrador"].'"  >'.$row["idtbl_administrador"].'</td>
    <td class="nombre" data-id2="'.$row["nombre"].'" >'.$row["nombre"].'</td>
    <td class="page" data-id3="'.$row["tbl_page_idtbl_page"].'"    >'.$row["tbl_page_idtbl_page"].'</td>
    <td class="pass" data-id4="'.$row["password"].'"     >'.$row["password"].'</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button id="btn_edit" data-id5="'.$row["idtbl_administrador"].'" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>

    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btn_delete" data-id6="'.$row["idtbl_administrador"].'" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
 </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
               
                 <th></th>
                    <th></th>
                     <th></th>
                     <th></th>
                      <th></th>
                     <th></th>
                 
                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btn_add"  class="btn btn-xs btn-success" data-title="Delete" data-toggle="modal" data-target="#insert" ><span class="glyphicon glyphicon-plus"></span></button></p></td>
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= ' <tr>  
                <th></th>
                    <th></th>
                     <th></th>
                     <th></th>
                      <th></th>
                     <th></th>
                 
                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btn_add" class="btn btn-xs btn-success" data-title="Delete" data-toggle="modal" data-target="#insert" ><span class="glyphicon glyphicon-plus"></span></button></p></td> 
           </tr>   ';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 
}
function editadmi($id,$nombre,$page,$password,$id2)
{
       
   if(mysqli_query(con(),"UPDATE tbl_administrador SET idtbl_administrador='".$id."',nombre='".$nombre."',tbl_page_idtbl_page='".$page."',password='".$password."' WHERE idtbl_administrador='".$id2."' ") ){

echo "Se ha modificado correctamente ";

}else{

echo "Se ha producido un error";

}

}


function insertaradmi($id,$nombre,$page,$password)
{ 

	 if(mysqli_query(con()," INSERT INTO tbl_administrador(idtbl_administrador,nombre,tbl_page_idtbl_page,password) VALUES('".$id."','".$nombre."','".$page."','".$password."')") ){

echo "Se ha insertado correctamente ";

}else{

echo "Se ha producido un error";

}

}

function cargarcate()
{
  $output = '';  
 $sql = "SELECT * From  tbl_categorias";  
 $result = mysqli_query(con(), $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table id="mytable" class="table table-bordred">
                   
                   <thead>             
                   <th>idtbl_categorias</th>
                    <th>nombre_categoria</th>
                     <th>descripion</th>
                       <th>Editar</th>
                       <th>Eliminar</th>
                       <th>Añadir</th>
                   </thead>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
               <tr>
    <td class="id"   >'.$row["idtbl_categorias"].'</td>
    <td class="name"  >'.$row["nombre_categoria"].'</td>
    <td class="descripcion"   >'.$row["descripcion"].'</td>
  
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button id="btn_edit" data-id5="'.$row["idtbl_categorias"].'" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>

    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btn_delete" data-id6="'.$row["idtbl_categorias"].'" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
 </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
               
                 <th></th>
                    <th></th>
                     <th></th>
                     <th></th>
                      <th></th>
                     <th></th>
                 
                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btn_add"  class="btn btn-xs btn-success" data-title="Delete" data-toggle="modal" data-target="#insert" ><span class="glyphicon glyphicon-plus"></span></button></p></td>
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= ' <tr>  
                <th></th>
                    <th></th>
                     <th></th>
                     <th></th>
                      <th></th>
                     <th></th>
                 
                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btn_add" class="btn btn-xs btn-success" data-title="Delete" data-toggle="modal" data-target="#insert" ><span class="glyphicon glyphicon-plus"></span></button></p></td> 
           </tr>   ';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 
}

function cargarcontrato()
{
  $output = '';  
 $sql = "SELECT * From tbl_agreement";  
 $result = mysqli_query(con(), $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table id="mytable" class="table table-bordred">
                   
                   <thead>             
                   <th>idtbl_agreement</th>
                    <th>tbl_page_idtbl_page</th>
                     <th>agreement</th>
                     <th>help</th>
                       <th>Editar</th>
                       <th>Eliminar</th>
                       <th>Añadir</th>
                   </thead>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
               <tr>
    <td class="id"   >'.$row["idtbl_agreement"].'</td>
    <td class="page"  >'.$row["tbl_page_idtbl_page"].'</td>
    <td class="agree"   >'.$row["agreement"].'</td>
    <td class="help" >'.$row["help"].'</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button id="btn_edit" data-id5="'.$row["idtbl_agreement"].'" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>

    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btn_delete" data-id6="'.$row["idtbl_agreement"].'" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
 </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
               
                 <th></th>
                    <th></th>
                     <th></th>
                     <th></th>
                      <th></th>
                     <th></th>
                 
                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btn_add"  class="btn btn-xs btn-success" data-title="Delete" data-toggle="modal" data-target="#insert" ><span class="glyphicon glyphicon-plus"></span></button></p></td>
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= ' <tr>  
                <th></th>
                    <th></th>
                     <th></th>
                     <th></th>
                      <th></th>
                     <th></th>
                 
                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button id="btn_add" class="btn btn-xs btn-success" data-title="Delete" data-toggle="modal" data-target="#insert" ><span class="glyphicon glyphicon-plus"></span></button></p></td> 
           </tr>   ';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 
}
function editarcontrato($id,$page,$agree,$help,$id2)
{
if(mysqli_query(con(),"UPDATE tbl_agreement SET idtbl_agreement='".$id."',tbl_page_idtbl_page='".$page."',agreement='".$agree."',help='".$help."' WHERE idtbl_agreement='".$id2."' ") ){

echo "Se ha modificado correctamente ";

}else{

echo "Se ha producido un error";

}
}
 ?>