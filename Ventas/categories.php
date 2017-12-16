<?php
             require_once("conexion.php"); $conexion = new Conexion();
  session_start();
require_once("conexion.php"); $conexion = new Conexion();
                 if(isset($_SESSION['nombre'])and isset($_SESSION['tipo']) ){
                $nombre=$_SESSION['nombre'];
                  $tipo=$_SESSION['tipo'];
                if ($tipo=='administrador') {
           echo ("<div id=tip style='display: none;'>".$tipo."</div>");
       echo ("<div id=nam style='display: none;'> ".$nombre." </div>");
 
                }else{

                   header("location: index.php");
                }
          
     } else{
     
        header("location: login.php");

     }
  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
     <script src="js/jquery-2.0.3.js"></script>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/funciones.js"></script>
    <script src="js/cargarcategorias.js"></script>
 <link rel="stylesheet" href="css/font-awesome.min.css">
 <link rel="stylesheet" href="css/profile.css">
<link href="css/stylemenu.css" rel="stylesheet">
</head>
<body>

<div id="flipkart-navbar">
    <div class="container">
        <div class="row row1">
          <br>
        </div>
        <div class="row row2">
            <div class="col-sm-2">
                <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()">☰ Watcher</span></h2>
                <h1 style="margin:0px;"><span class="largenav"> <a   href="index.php"><img  src="img/logo/logo.png" height="90" width="120" style="margin-top:-30px; margin-left: -80px;"></a></span></h1>
            </div>
            <div class="flipkart-navbar-search smallsearch col-sm-6 col-xs-11" style="color:black;">
                <div class="row">
                    <input class="flipkart-navbar-input col-xs-11" type=""  id="search" placeholder="Buscar productos" name="">
                    <button class="flipkart-navbar-button col-xs-1" id="find">
                       <span class="fa fa-search"></span>
                    </button>
                </div>
            </div>
            <div class="cart largenav col-sm-4">
             <ul class="largenav pull-right" id="inicio">
      
  
  <li class="upper-links"><a  id="nom" href="profile.php"  class="fa fa-user" ></a></li>
  <?php  
 if(isset($_SESSION['id'])){
  if ($_SESSION['tipo']=="user") {
    
$conexion->consulta ("SELECT count(idtbl_message) FROM `tbl_message` WHERE estado='no leido' and tbl_user_idtbl_usuario='".$_SESSION['id']."' and tipo_usuario   not in(SELECT tipo_usuario from tbl_message where  tipo_usuario='".$_SESSION['tipo']."')"); 
  }else{

    $conexion->consulta ("SELECT count(idtbl_message) FROM `tbl_message` WHERE estado='no leido' and tbl_vendedor_idtbl_vendedor='".$_SESSION['id']."' and tipo_usuario   not in(SELECT tipo_usuario from tbl_message where  tipo_usuario='".$_SESSION['tipo']."')"); 
  }
  

   if(!$row = $conexion->extraer_registro()) {
              echo ' <li  class="upper-links"><a href="inbox.php" class="fa fa-envelope" ></a></li>';
              }else{

                echo ' <li  class="upper-links"><a href="inbox.php" class="fa fa-envelope" ><span
                class="badge"> '.$row['0'].'</span></a> </li> ';
                }
}else{
  echo ' <li  class="upper-links"><a href="inbox.php" class="fa fa-envelope" ></a></li>';
}

                 ?>

  
   <li class="upper-links">

   <?php     if(isset($_SESSION['id'])){
  echo '<a href="checkout.php" class="fa fa-shopping-cart" >&nbsp;<span id="cantidadcarrito" class="badge">';
              $conexion->consulta ("SELECT (SUM(quantity)) FROM  tbl_cart where id_user = ". $_SESSION['id']);
                while($row = $conexion->extraer_registro()){
                  echo $row['0'];
               }
               echo '</span></a>';
     }
   else{echo '<a href="login.php" class="fa fa-shopping-cart" >&nbsp;<span id="cantidadcarrito" class="badge"></span></a>';}?></li>  
                </ul>

            </div>
        </div>
    </div>
</div>
<div id="mySidenav" class="sidenav">
    <div class="container" style="background-color: #1ab188; padding-top: 10px;">
        <span class="sidenav-heading">Watcher</span>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    </div>
      
  
  <li class="lower-links"><a  id="nom" href="profile.php"  class="fa fa-user" ></a></li>
  <?php  
 if(isset($_SESSION['id'])){
  $conexion->consulta ("SELECT count(idtbl_message) FROM `tbl_message` WHERE estado='no leido' and tbl_user_idtbl_usuario='".$_SESSION['id']."' and tipo_usuario   not in(SELECT tipo_usuario from tbl_message where  tipo_usuario='".$_SESSION['tipo']."')");  if(!$row = $conexion->extraer_registro()) {
              echo ' <li  class="lower-links"><a href="inbox.php" class="fa fa-envelope" ></a></li>';
              }else{

                echo ' <li  class="lower-links"><a href="inbox.php" class="fa fa-envelope" ><span
                class="badge"> '.$row['0'].'</span></a> </li> ';
                }
}else{
  echo ' <li  class="upper-links"><a href="login.php" class="fa fa-envelope" ></a></li>';
}

                 ?>

  
   <li class="lower-links">

   <?php     if(isset($_SESSION['id'])){
  echo '<a href="checkout.php" class="fa fa-shopping-cart" >&nbsp;<span id="cantidadcarrito" class="badge">';
              $conexion->consulta ("SELECT (SUM(quantity)) FROM  tbl_cart where id_user = ". $_SESSION['id']);
                while($row = $conexion->extraer_registro()){
                  echo $row['0'];
               }
               echo '</span></a>';
     }
   else{echo '<a href="login.php" class="fa fa-shopping-cart" >&nbsp;<span id="cantidadcarrito" class="badge"></span></a>';}?></li>  
</div>


<div class="container" id="principal">
    <h2>Categorias</h2>
    <div id="categoria" class="row form-group product-chooser">
    
    	
    	
    	
    
    	
    </div>
</div>


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
        <li><a href="#">Acerca de</a></li>
        <li><a href="#">Contactenos</a></li>
       
      </ul>
    </div>
  </div>
</div>
<style type="text/css">

	div.clear
{
    clear: both;
}

div.product-chooser{
    
}

    div.product-chooser.disabled div.product-chooser-item
	{
		zoom: 1;
		filter: alpha(opacity=60);
		opacity: 0.6;
		cursor: default;
	}

	div.product-chooser div.product-chooser-item{
		padding: 11px;
		border-radius: 6px;
		cursor: pointer;
		position: relative;
		border: 1px solid #efefef;
		margin-bottom: 10px;
        margin-left: 10px;
        margin-right: 10x;
	}
	
	div.product-chooser div.product-chooser-item.selected{
		border: 4px solid #428bca;
		background: #efefef;
		padding: 8px;
		filter: alpha(opacity=100);
		opacity: 1;
	}
	
		div.product-chooser div.product-chooser-item img{
			padding: 0;
		}
		
		div.product-chooser div.product-chooser-item span.title{
			display: block;
			margin: 10px 0 5px 0;
			font-weight: bold;
			font-size: 12px;
		}
		
		div.product-chooser div.product-chooser-item span.description{
			font-size: 12px;
		}
		
		div.product-chooser div.product-chooser-item input{
			position: absolute;
			left: 0;
			top: 0;
			visibility:hidden;
		}
</style>

</body>
</html>