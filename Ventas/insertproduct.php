<?php
        
         require_once("conexion.php"); $conexion = new Conexion();
   if (isset($_GET['categoria'])) {
 $Categoria= $_REQUEST['categoria'] ; $subcategoria=0;  $idproducto=0;

   }
         if (isset($_GET['id_producto'])) {
          $idproducto=$_GET['id_producto'];
      
           $conexion->consulta ("select * FROM tbl_productos WHERE idtbl_productos = ". $_GET['id_producto']);
           while($row = $conexion->extraer_registro()){
             $subcategoria = $row['2'];
            
             $cantidad = $row['9'];
             $color = $row['4'];
             $tamano = $row['10'];
             $precio = $row['11'];
             $peso = $row['3'];
             $titulo = $row['12'];
             $garantia = $row['13'];
             $descripcion = $row['14'];
             $ancho = $row['5'];
             $alto = $row['6'];
             $precioenvio = $row['8'];
           }
         }

              echo ("<div id=idproducto style='display: none;'> ".$idproducto." </div>");

  session_start();

                 if(isset($_SESSION['nombre'])and isset($_SESSION['tipo']) ){
                $nombre=$_SESSION['nombre'];
                $tipo=$_SESSION['tipo'];
                 $id=$_SESSION['id'];
                if ($tipo=='administrador') {
           echo ("<div id=tip style='display: none;'>".$tipo."</div>");
       echo ("<div id=nam style='display: none;'> ".$nombre." </div>");
 echo ("<div id=vendedor style='display: none;'> ".$id." </div>");
                }else{

                   header("location: index.php");
                }
          
     } else{
     
        header("location: login.php");

     }
   echo "<script>\n";
   echo "categoria='".$Categoria."' \n";
   echo " sub='".$subcategoria."'";
    echo "</script>";
   
   
  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-2.0.3.js"></script>
     <script src="js/bootstrap.min.js"></script>
  <link href="css/stylemenu.css" rel="stylesheet">
     <script src="js/funciones.js"></script>
          <script src="js/funcionesinsert.js"></script>
      <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
            </div>
        <div class="container">
     
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"  >

          <div class="row" >

  <div class="col-md-1 " id="logotipo"  >

    
        <a  class="navbar-brand" href="index.php"><img  src="img/logo/logo.png" height="80" width="120" style="margin-top:-23px; margin-left: -30px;"></a>
</div>

<div class="col-md-6 " id="buscador">
      <div id="custom-search-input ">
                            <div class="input-group col-md-12">

                                <input type="text" id="search" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                         </div>
                   

                        <div class="col-md-3 move ">
                                   <ul class="nav navbar-nav" id="inicio">
      
  
  <li ><a  id="nom" href="profile.php"  class="fa fa-user" ></a></li>
   <li  ><a href="login.php" class="fa fa-envelope" ></a></li>
   <li   ><a href="login.php" class="fa fa-shopping-cart" ></a></li>  
              
                </ul>
                        </div>
          
</div>
           
         
     
   
          
            </div>
            
        </div>
</div>
    </nav>
  
<div class="container" id="principal">

<div>
    <div class="Product_Button col-lg-offset-6">
        
    </div>
</div>
<div class="clearfix"></div>
	<div class="row">
		<div><ul class="nav nav-tabs col-lg-12" role="tablist">
            <li class="active  "><a href="#Product_main"  style="color:black" role="tab" data-toggle="tab">Principal</a></li>
            <li class=""><a href="#Product_Images" role="tab"  style="color:black" data-toggle="tab">Imagenes</a></li>
           
            <li class=""><a href="#Product_Desc" role="tab" style="color:black" data-toggle="tab">Descripcion</a></li>
          
        </ul></div> 
        <div class="clearfix"></div>
        <div class="Product_Content tab-content">
            <div id="Product_main" class="tab-pane active">
            <form class="form-horizontal" action='' method="POST">
  <fieldset>
  <br>
 
    <div class=" col-lg-12 form-group">
      <label class="col-lg-2" for="ProductType">Subcategoria</label>
      <div class="col-lg-4">
        <select id="subcategoria" name="ProductType" class="form-control product-type">
          
        </select>
      </div>
    </div>

        <div class="col-lg-12 form-group ">
      <label class="col-lg-2"  for="Name">Cantidad disponible</label>
      <div class="col-lg-4">
        <input type="text" id="quantity" name="Name" placeholder="" class="form-control name" value="<?php if (isset($_GET['id_producto'])) {echo $cantidad;}?>">
      </div>
    </div>
   
  
  
  
      <div class="col-lg-12 form-group">
      <label class="col-lg-2" for="ColorOptionPrompt">Color</label>
      <div class="col-lg-4">
        <input type="text" id="color" name="ColorOptionPrompt" placeholder="" class="form-control color-option-prompt" value="<?php if (isset($_GET['id_producto'])) {echo $color;}?>">
      </div>
    </div>
    <div class="col-lg-12 form-group">
      <label class="col-lg-2" for="SizeOptionPrompt">Tamaño</label>
      <div class="col-lg-4">
        <input type="text" id="size" name="SizeOptionPrompt" placeholder="" class="form-control size-option-prompt" value="<?php if (isset($_GET['id_producto'])) {echo $tamano;}?>">
      </div>
    </div>
     
    
    <h3>Informacion producto</h3>
    
     <div class="col-lg-12 form-group">
      <label class="col-lg-2" for="Price">Precio</label>
      <div class="col-lg-4">
        <input type="text" id="price" name="Price" placeholder="" class="form-control price" value="<?php if (isset($_GET['id_producto'])) {echo $precio;}?>">
      </div>
    </div>
        <div class="col-lg-12 form-group">
      <label class="col-lg-2"  for="RequiresTextField">Envio incluido</label>
      <div class="col-lg-4">
        <input id="opcion2" type="radio"  name="RequiresTextField" class="input-xlarge" <?php if (isset($_GET['id_producto'])) {if($precioenvio=='0'){echo "checked";}}?>><span>No</span>
         <input id="opcion" type="radio"  name="RequiresTextField"  class="input-xlarge" <?php if (isset($_GET['id_producto'])) {if($precioenvio!='0'){echo "checked";}}?>><span>Si</span>
      
      </div>

    </div>
      <div id="ocultar" class="col-lg-12 form-group  <?php if (isset($_GET['id_producto'])) {if($precioenvio=='0'){echo "hidden";}}else{echo "hidden";}?> ">
      <label class="col-lg-2" for="ColorOptionPrompt">Precio de envio</label>
      <div class="col-lg-4">
        <input type="text" id="shipping" name="ColorOptionPrompt" placeholder="" class="form-control color-option-prompt" value="<?php if (isset($_GET['id_producto'])) {if($precioenvio!='0'){echo $precioenvio;}}?>">
      </div>
    </div>
    <div class="col-lg-12 form-group">
      <label class="col-lg-2" for="Weight">Peso</label>
      <div class="col-lg-4">
        <input type="text" id="weight" name="Weight" placeholder="" class="form-control weight" value="<?php if (isset($_GET['id_producto'])) {echo $peso;}?>">
      </div>
    </div>
    <div class="col-lg-12 form-group">
      <label class="col-lg-2" for="Dimentions">Dimensiones(ancho x alto en centímetros)</label>
      <div class="col-lg-10">
        <div class="col-lg-3"><input type="text" id="width" name="DimentionsWidth" placeholder="" class="form-control dimentions-width" value="<?php if (isset($_GET['id_producto'])) {echo $ancho;}?>">  Ancho</div>
        <div class="col-lg-3"><input type="text" id="height" name="DimentionsHeight" placeholder="" class="form-control dimentions-height" value="<?php if (isset($_GET['id_producto'])) {echo $alto;}?>"> Altura</div>
       
      </div>
    </div>

  </fieldset>
</form>
            </div>    

            <div id="Product_Images" class="tab-pane"><div class="col-lg-12 form-group margin50">
  
   <form  action="subirproduct.php" method="post" enctype="multipart/form-data" name="formulario" id="formimagenes">
  </div>
              <div class="col-lg-12 form-group">
                <label class="col-sm-2"  for="exampleInputFile">Imagen</label>
                <div class="col-sm-4">
                <input name="foto[]" type="file"  id="file-5" class="inputfile inputfile-4>">
              </div>
              </div>
              
              <div class="col-lg-12 form-group">
                <label class="col-sm-2" for="exampleInputFile">Imagen</label>
                <div class="col-sm-4">
                <input name="foto[]" type="file" id="medium">
              </div>
              </div>
                <div class="col-lg-12 form-group">
                <label class="col-sm-2" for="exampleInputFile">Imagen</label>
                <div class="col-sm-4">
                <input name="foto[]" type="file" id="medium">
              </div>
              </div>
                <div class="col-lg-12 form-group">
                <label class="col-sm-2" for="exampleInputFile">Imagen</label>
                <div class="col-sm-4">
                <input name="foto[]" type="file" id="medium">
              </div>
              </div>

                <div class="col-lg-12 form-group">
                <label class="col-sm-2" for="exampleInputFile">Imagen</label>
                <div class="col-sm-4">
                <input type="file" id="medium">
              </div>
              </div>
              
              <div class="col-lg-12 form-group">
                <label class="col-sm-2" for="exampleInputFile">Imagen</label>
                <div class="col-sm-4">
                <input type="file" id="large">
              </div>
              </div>
              
    </form>           
    </div>
 

  <br>
            <div id="Product_Desc" class="tab-pane">
             <div class="col-lg-12 form-group margin50">
      <label class="col-lg-2" for="SizeOptionPrompt">Titulo</label>
      <div class="col-lg-4">
        <input type="text" id="title" name="SizeOptionPrompt" placeholder="" class="form-control size-option-prompt" value="<?php if (isset($_GET['id_producto'])) {echo $titulo;}?>">
      </div>
    </div>


    <div class=" col-lg-12 form-group">
      <label class="col-lg-2" for="ProductType">Garantia</label>
      <div class="col-lg-4">
        <input type="text" id="warranty" name="SizeOptionPrompt" placeholder="" class="form-control size-option-prompt" value="<?php if (isset($_GET['id_producto'])) {echo $garantia;}?>">
      </div>
    </div>

    <div class="col-lg-12 form-group margin50">
    <label class="col-sm-2" for="Description">Descripcion</label>

    <div class="col-sm-6">

     <textarea class="form-control description" id="description" name="Description" rows="4" cols="50" ><?php if (isset($_GET['id_producto'])) {echo $descripcion;}?></textarea>
    </div>

  </div>
     <div id="alert"  class="col-lg-6 form-group"> </div>
  <div class="col-sm-6 col-sm-offset-3" >
    <a id="save" class="btn btn-primary btn-lg " role="button">Guardar</a>


  </div>
            
    </div>
  </div>
</div>
        </div>
	</div>

</div>
<br>
<footer id="final">
  <div class="container">
    <div class="row" >
      <div class="col-md-4 col-sm-6 footerleft ">
        <div class="logofooter">Watcher</div>

        <p>Somos una empresa dedicada a las ventas a nivel nacional, con el fin de que todos los clientes tengan sus productos en puerta de su casa, sin necesidad de salir de su casa o trabajo</p>
        <p><i class="fa fa-map-pin"></i>  Osa, Ciudad Cortes, Puntarenas-61003, Costa Rica</p>
        <p><i class="fa fa-phone"></i> Telefono (Costa Rica) : +506 87109682 : +506 83137757</p>
        <p><i class="fa fa-envelope"></i> E-mail : yoel1202@hotmail.com</p>
        
      </div>
      <div class="col-md-2 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">ENLACES GENERALES</h6>
        <ul class="footer-ul">
          <li><a href="#"> Centro Resoluciones</a></li>
          <li><a href="#"> Politicas de Privacidad</a></li>
          <li><a href="#"> Terminos & Condiciones</a></li>
    
          <li><a href="#"> Preguntas frecuentes</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">ULTIMOS POST</h6>
        <div class="post">
          <p>Nuevo descuentos electrodomesticos <span>Septiembre 12,2017</span></p>
         
        </div>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook"><span class="fa fa-facebook-square">  Facebook</a>
            </blockquote>
             <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook"><span class="fa fa-instagram">  Instagram</a></blockquote>
              <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook"><span class="fa fa-twitter">  Twitter</a></blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>


<div class="copyright">
  <div class="container">
    <div class="col-md-6">
      <p>© 2017 - Todos los derechos reservados</p>
    </div>
    <div class="col-md-6">
      <ul class="bottom_ul">
        <li><a href="#">www.watcher.com</a></li>
        <li><a  data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block" >Acerca de</a></li>
        <li><a href="#">Contactenos</a></li>
       
      </ul>
    </div>
  </div>
</div>






</script>
<script type="text/javascript">
  
cargarsubcategorias(categoria,sub);
</script>
</body>
</html>