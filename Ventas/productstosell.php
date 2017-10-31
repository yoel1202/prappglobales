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
            <div class="col-md-1 " id="logo" >

   <img  src="img/logo/logo.png" height="40" width="40" style="margin-top:8px">
</div>
  <div class="col-md-1 " id="logotipo"  >

    <a  class="navbar-brand" href="index.php">Watcher   </a>
</div>

<div class="col-md-6 " id="buscador">
      <div id="custom-search-input ">
                            <div class="input-group col-md-12">

                                <input type="text" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button" onclick="window.location.href='find.php'">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                         </div>

                        <div class="col-md-1  " id="cb">
                                       <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Categorias
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="#">Ropa</a></li>
    <li><a href="#">Electrodomesticos</a></li>
    <li><a href="#">tecnologia</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
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

    </nav>

<div class="container"  id="principal">
<div class="row">
    <div class="col-sm-3">
        <a href="mail-compose.html" class="btn btn-danger btn-block btn-compose-email">Actividades</a>
        <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
            <li >
                <a href="profileadmi.php">
                    <i class="fa fa-user "></i>Perfil <span class="label pull-right">7</span>
                </a>
            </li>
            <li>
              
            </li>
            <li>
                <a href="#"><i class="fa fa-envelope"></i>Mensajes</a>
            </li>
                        <li class="">
                <a href="categories.php">
                 <i class="fa fa-shopping-cart"></i> Vender
                 
                     
                </a>
            </li>
            <li class="">
                <a href="productseller.php">
                  <?php 
   $conexion->consulta ("select distinct( idtbl_productos) from tbl_sales ts inner join tbl_productos  on  ts.tbl_productos_idtbl_productos=idtbl_productos
 inner join tbl_seller on tbl_vendedor_idtbl_vendedor='". $_SESSION['id']."' inner join tbl_photo tph on tph.tbl_productos_idtbl_productos=idtbl_productos group by idtbl_productos");
   
  if(!$row = $conexion->extraer_registro()) {
 echo ' <i class="fa fa-shopping-cart"></i>Productos Vendidos<span class="label label-info pull-right inbox-notification">0</span> ';
   }else{
 
                 
                echo ' <i class="fa fa-shopping-cart"></i>Productos Vendidos<span class="label label-info pull-right inbox-notification">'.$row['0'].'</span> ';
              
     }
                 
                     ?>
                </a>
            </li>
            <li class="active">
                <a href="#">
                  <?php 
   $conexion->consulta ("select distinct(idtbl_productos) from tbl_productos inner join tbl_seller on tbl_vendedor_idtbl_vendedor='". $_SESSION['id']."' inner join tbl_photo tph on tph.tbl_productos_idtbl_productos=idtbl_productos group by idtbl_productos");
   
  if(!$row = $conexion->extraer_registro()) {
 echo ' <i class="fa fa-shopping-cart"></i>Productos en Venta<span class="label label-info pull-right inbox-notification">0</span> ';
   }else{
 
                 
                echo ' <i class="fa fa-shopping-cart"></i>Productos en Venta<span class="label label-info pull-right inbox-notification">'.$row['0'].'</span> ';
              
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
   $conexion->consulta ("select  titulo, precio, cantidad, tbl_productos.descripcion,picture_code, idtbl_categorias, idtbl_productos from tbl_productos inner join tbl_subcategories on tbl_subcategories.idtbl_subcategorias = tbl_productos.tbl_subcategorias_idtbl_subcategorias inner join tbl_categories on tbl_subcategories.tbl_categorias_idtbl_categorias = tbl_categories.idtbl_categorias inner join tbl_seller on   tbl_vendedor_idtbl_vendedor='". $_SESSION['id']."' inner join tbl_photo tph on tph.tbl_productos_idtbl_productos=idtbl_productos group by idtbl_productos");
                while($row = $conexion->extraer_registro()){ 
        echo '  <div class="row">
            <div class="col-xs-2"><img class="img-responsive" src="'.$row['4'].'">
            </div>
            <div class="col-xs-4">
              <h4 class="product-name"><strong>'.$row['0'].'</strong></h4><h4><small>'.$row['3'].'</small></h4>
            </div>
            <div class="col-xs-6">
              <div class="col-xs-6 text-right">
                <h6><strong>Precio: ₡ '.$row['1'].' <span class="text-muted"></span></strong></h6>
              </div>
              <div class="col-xs-4">
              <h6><strong>Cantidad: '.$row['2'].'<span class="text-muted"></span></strong></h6>
              </div>
              <div class="col-xs-2">
               <a style="color:blue" href="insertproduct.php?categoria='.$row['5'].'&id_producto='.$row['5'].'">Editar</a>
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
                
                
                
           
                
                
       

</body>
</html>