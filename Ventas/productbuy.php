<?php
             
  session_start();
        
                 if(isset($_SESSION['nombre']) and isset($_SESSION['tipo'])){
                $nombre=$_SESSION['nombre'];
                    $tipo=$_SESSION['tipo'];
             echo ("<div id=tip style='display: none;'>".$tipo."</div>");
       echo ("<div id=nam style='display: none;'> ".$nombre." </div>");
        echo ("<div id=tip style='display: none;'>".$tipo."</div>");
     }else{
        header("location: login.php");

     }
      require_once("conexion.php"); $conexion = new Conexion();
  ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
      <script src="js/jquery-2.0.3.js"></script>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/funciones.js"></script>
 <link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/stylemenu.css" rel="stylesheet">
<link href="css/profile.css" rel="stylesheet">
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
  $conexion->consulta ("SELECT count(idtbl_message) FROM `tbl_message` WHERE estado='no leido' and tbl_user_idtbl_usuario='".$_SESSION['id']."' and tipo_usuario   not in(SELECT tipo_usuario from tbl_message where  tipo_usuario='".$_SESSION['tipo']."')");  if(!$row = $conexion->extraer_registro()) {
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

<div class="container"  id="principal">
<div class="row">
    <div class="col-sm-3">
        <a class="btn btn-primary btn-block btn-compose-email">Actividades</a>
        <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
            <li >
                <a href="profile.php">
                    <i class="fa fa-user "></i>Perfil <span class="label pull-right">7</span>
                </a>
            </li>
            <li>
              
            </li>
            <li>
                <a href="messagepanel.php"><i class="fa fa-envelope"></i>Mensajes</a>
            </li>
            <li class="active">
                <a href="#">
                  <?php 
   $conexion->consulta ("select count(idtbl_ventas) from tbl_sales ts inner join tbl_productos  on  ts.tbl_productos_idtbl_productos=idtbl_productos where
tbl_usuario_idtbl_usuario ='". $_SESSION['id']."'");
   
  if(!$row = $conexion->extraer_registro()) {
 echo ' <i class="fa fa-shopping-cart"></i>Historial de compra<span class="label label-info pull-right inbox-notification">0</span> ';
   }else{
 
                 
                echo ' <i class="fa fa-shopping-cart"></i>Historial de compra<span class="label label-info pull-right inbox-notification">'.$row['0'].'</span> ';
              
     }
                 
                     ?>
                </a>
            </li>
           
        </ul><!-- /.nav -->

      
    </div>
    <div class="col-sm-9">

        <!--  statitics -->
       
         <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">
            <div class="row">
              <div class="col-xs-8">
                <h5><span class="glyphicon glyphicon-shopping-cart"></span>Listas de productos</h5>
              </div>
              <div class="col-xs-4">
                  <select name="paymentmethodparent" id="paymentmethodparent" class="selectpicker form-control" data-live-search="true">
                 <!--   <option data-tokens="" value="">30 dias</option>
                  <option data-tokens="" value="">60 dias</option> -->
                  <option data-tokens="bank" value="bankchooser">2017</option>
              
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-body">

        <?php 
   $conexion->consulta ("select  titulo, precio, ts.cantidad, descripcion,picture_code,idtbl_productos from tbl_sales ts inner join tbl_productos  on  ts.tbl_productos_idtbl_productos=idtbl_productos
 inner join tbl_user on tbl_usuario_idtbl_usuario='". $_SESSION['id']."' inner join tbl_photo tph on tph.tbl_productos_idtbl_productos=idtbl_productos group by idtbl_productos");
                while($row = $conexion->extraer_registro()){ 
        echo '  <div class="row">
            <div class="col-xs-2"><img class="img-responsive" src="'.$row['4'].'">
            </div>
            <div class="col-xs-4">
              <h4 class="product-name"><strong>'.$row['0'].'</strong></h4><h4><small>'.$row['3'].'</small></h4>
            </div>
            <div class="col-xs-6">
              <div class="col-xs-6 text-right">
                <h6><strong>₡ '.$row['1'].' <span class="text-muted">x</span></strong></h6>
              </div>
              <div class="col-xs-4">
              <h6><strong>'.$row['2'].'<span class="text-muted"></span></strong></h6>
              </div>
              <div class="col-xs-2">
              <a href="invoice.php?item='.$row['5'].'" class="btn btn-link btn-xs">   <span class="fa fa-file-text-o"> </span></a> 
                
              </div>
            </div>
          </div>
          <hr>';
   }
   ?>
          <hr>
      
        </div>
      
      </div>
    </div>
  </div>
      
        <!-- tabs -->
        
    </div>
</div>
</div>
<hr>
<hr>
<footer id="final">
  <div class="container">
    <div class="row" >
      <div class="col-md-4 col-sm-6 footerleft ">
        <div class="logofooter">Watcher</div>

        <p>Somos una empresa dedicada a las ventas a nivel nacional, con el fin de que todos los clientes tengan sus productos en puerta de su casa, sin necesidad de salir de su casa o trabajo</p>
        <p><i class="fa fa-map-pin"></i>  Osa, Ciudad Cortes, Puntarenas-61003, Costa Rica</p>
        <p><i class="fa fa-phone"></i> Telefono (Costa Rica) : +506 87109682 : +506 83137757</p>
        <p><i class="fa fa-envelope"></i> E-mail : watcher@hotmail.com</p>
        
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
                
                
                
           
                
                
       

</body>
</html>