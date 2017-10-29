<?php
             
  session_start();

                 if(isset($_SESSION['nombre'])and isset($_SESSION['tipo']) ){
             	$nombre=$_SESSION['nombre'];
             	$tipo=$_SESSION['tipo'];
              
          echo ("<div id=tip style='display: none;'>".$tipo."</div>");
       echo ("<div id=nam style='display: none;'> ".$nombre." </div>");
       
     }


      require_once("conexion.php"); $conexion = new Conexion();
  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	  
   <script src="js/jquery-2.0.3.js"></script>
 <link rel="stylesheet" href="css/bootstrap.min.css">
   <script src="js/funciones.js"></script>
    <script src="js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/stylemenu.css" rel="stylesheet">

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

                                <input type="text" id="search" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button id="find" class="btn btn-danger" type="button" ">
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
   <?php 
   $conexion->consulta ("SELECT * FROM  tbl_categories");
                while($row = $conexion->extraer_registro()){
       echo '<li><a href="#">'.$row['1'].'</a></li>';}
   ?>
   
   
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div>
                        </div>


                        <div class="col-md-3 move ">
                                   <ul class="nav navbar-nav" id="inicio">
      
  
  <li ><a  id="nom" href="profile.php"  class="fa fa-user" ></a></li>
   <li  ><a href="message.php" class="fa fa-envelope" ></a></li>
   <li   >

   <?php       if(isset($_SESSION['id'])){
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

    </nav>


 <div class="container " id="principal">

          <div class="row">

  
            <div class="col-md-12">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="img/productos/xbox360.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/productos/xbox360.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/productos/xbox360.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3 id="titulo">Articulos recientes</h3>
            </div>
        </div>
      
        <div class="row text-center">
        <?php 

               $conexion->consulta ("SELECT * FROM  tbl_productos inner join tbl_photo on tbl_photo.tbl_productos_idtbl_productos = tbl_productos.idtbl_productos inner join tbl_seller on tbl_seller.idtbl_vendedor = tbl_productos.tbl_vendedor_idtbl_vendedor WHERE tbl_productos.cantidad > 0 AND tbl_productos.estado = '1' group by tbl_productos.idtbl_productos");
                while($row = $conexion->extraer_registro()){
                      echo '<div class="col-md-3 col-sm-6 hero-feature">
                                <div class="thumbnail">
                                       <div class="row">
                                <div class="col-xs-12  col-sm-12">
                            <div id="progreso" class="progress-radial progress">
                                <div class="overlay">
                                    <a href="buy.php?product='.$row[0].'"><img  width="256" height="256" class="img-responsive img-circle" src="'.$row['16'].'" alt=""></a>
                                   
                                    <div class="clearfix"></div>
                                </div>
                           </div>
                             </div>
                                        </div>
                                    <div class="caption">
                                        <h3>'.$row['12'].'</h3>
                                        <p>'.$row['20'].'</p>
                                        <p>';
                                      
                                          if (isset($_SESSION['id'])) {
                                            echo '<a onclick="agregarcarrito('.$row['0'].',1)" class="btn btn-primary">Agregar al carrito!</a><br> <a href="buy.php?product='.$row[0].'" class="btn btn-default">Mas Informacion </a>';                                         
                                          }
                                          else
                                          {
                                            echo '<a href="login.php" class="btn btn-primary">Agregar al carrito!</a> <br><a href="buy.php?product='.$row[0].'" class="btn btn-default">Mas Informacion </a>';
                                          }
                                        ?>

                                        </p>
                                    </div>

                                </div>
                            </div>
                    <?php 
                }



        ?>



        </div>
      

        <hr>

      

    </div>
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
      <p>© <?php echo date('Y');?> - Todos los derechos reservados</p>
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