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
                    <input class="flipkart-navbar-input col-xs-10" type=""  id="search" placeholder="Buscar productos" name="">
                    <button class="flipkart-navbar-button col-xs-1" id="find">
                       <span class="fa fa-search"></span>
                    </button>
                     <div class="col-xs-1">
  <div class="collapse navbar-collapse js-navbar-collapse">
    <ul class="nav navbar-nav">
      <li class="dropdown dropdown-large">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias <b class="caret"></b></a>
        <div class="container" id="width">
        <div class="row">
        <div class="col-sm-6">
        <ul class="dropdown-menu dropdown-menu-large row">
          
            <?php 
require_once("conexion.php"); $con = new Conexion();
 $conexion->consulta ("SELECT * FROM    tbl_categories Limit 8 ");
                while($row = $conexion->extraer_registro()){
                 
                  echo '<li class="col-sm-3">
                 <ul>
              <li href="#" class="dropdown-header"><a href="#"></a>'. $row['1'].'</li>
           '
              ;
 $con->consulta ("SELECT * FROM    tbl_subcategories WHERE tbl_categorias_idtbl_categorias= '". $row['0']."' limit 4");
while($row2 = $con->extraer_registro()){
            echo '  <li><a href="showcategories.php?subcategories='.$row2['1'].'">'. $row2['1'].'</a></li>   
            <li class="divider"></li>';
            
          }
           echo ' </ul>
          </li> ' ;
               }
              
           ?>
            
          
         
        </ul>
        </div>
        </div>
        </div>
      </li>
    </ul>
    
  </div><!-- /.nav-collapse -->


</div>
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

    
       

     <div class="col-lg-12">
                <h2 id="titulo center">&nbsp;&nbsp;Artículos en oferta</h2>
            </div>
       
  <div class="col-md-12">
               <section class="section-feedback">
    <div class="feedback-slider">
     <?php 

   $conexion->consulta ("SELECT idtbl_productos,picture_code,titulo,precio,discount FROM `tbl_productos` INNER join tbl_photo on idtbl_productos=tbl_productos_idtbl_productos inner join tbl_discount on idtbl_productos=  tbl_discount.id_product GROUP by idtbl_productos ORDER BY  idtbl_productos DESC LIMIT 8 ");
   $i=0;
                while($row = $conexion->extraer_registro()){
 if($i==0){
       echo '<figure class="slide">
        <div class="feedback-image-wrapper w-hidden-small w-hidden-tiny">
        <a href="buy.php?product='.$row[0].'">
          <div class="feedback-image-bg" ></div>
         
         <style>.feedback-image-bg { background-image: url("'.$row[1].'");} </style>
        </div> </a>
        <div class="feedback-image-wrapper-mobile w-hidden-main w-hidden-medium">
          <div class="feedback-image-bg"></div>
        </div>

        <div class="slide-content-wrapper">
          <div class="slide-text-wrapper">
            <div class="w-embed">
              <p class="feedback-text">Aprovecha las nuevas ofertas a solo un click &nbsp<i class="em em-dog"></i> <br> y estaran a la puerta de tu casa!</p>
              <h3 style="color:white; text-shadow: black 0.1em 0.1em 0.2em;">'.$row['2'].'</h3>
         <strike style="color:white; text-shadow: black 0.1em 0.1em 0.2em">₡'.$row[3].'</strike><p  style="color:white;"> -'.$row[4].'%   <h2  style="color:white;">₡'.($row[3]-($row[3]*$row[4]/100)).'</h2></p>
            </div>
            <div class="feedback-name"></div>
            <div class="feedback-job"></div>
          </div>
        </div>
      </figure>
                                ';
}else{
   echo '<figure class="slide">
        <div class="feedback-image-wrapper w-hidden-small w-hidden-tiny">
        <a href="buy.php?product='.$row[0].'">
          <div class="feedback-image-bg-'.$i.'" ></div>
         
         <style>.feedback-image-bg-'.$i.' { background-image: url("'.$row[1].'");} </style>
        </div> </a>
        <div class="feedback-image-wrapper-mobile w-hidden-main w-hidden-medium">
          <div class="feedback-image-bg-'.$i.'"></div>
        </div>

        <div class="slide-content-wrapper">
          <div class="slide-text-wrapper">
            <div class="w-embed">
              <p class="feedback-text">Aprovecha las nuevas ofertas a solo un click &nbsp<i class="em em-dog"></i> <br> y estaran a la puerta de tu casa!</p>
              <h3 style="color:white; text-shadow: black 0.1em 0.1em 0.2em;">'.$row['2'].'</h3>
         <strike style="color:white; text-shadow: black 0.1em 0.1em 0.2em">₡'.$row[3].'</strike><p  style="color:white;"> -'.$row[4].'%   <h2  style="color:white;">₡'.($row[3]-($row[3]*$row[4]/100)).'</h2></p>
            </div>
            <div class="feedback-name"></div>
            <div class="feedback-job"></div>
          </div>
        </div>
      </figure>
                                ';
}
$i++;
                              }
   ?>
     
    
      <div class="feedback-slider-nav-wrapper">
        <ul id="slider-dots" class="feedback-slider-nav w-list-unstyled">
          <li class="feedback-slider-nav-dot-wrapper">
            <div class="feedback-slider-nav-dot">
              <div class="feedback-slider-nav-dot-anim"></div>
            </div>
          </li>
          <li class="feedback-slider-nav-dot-wrapper">
            <div class="feedback-slider-nav-dot">
              <div class="feedback-slider-nav-dot-anim"></div>
            </div>
          </li>
          <li class="feedback-slider-nav-dot-wrapper">
            <div class="feedback-slider-nav-dot">
              <div class="feedback-slider-nav-dot-anim"></div>
            </div>
          </li>
          <li class="feedback-slider-nav-dot-wrapper">
            <div class="feedback-slider-nav-dot">
              <div class="feedback-slider-nav-dot-anim"></div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
  </div>
       
 <div class="container " id="principal">

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
           <hr>
                <h3 id="titulo">Artículos recientes</h3>
            </div>
        </div>








      
        <div class="row text-center">
        <?php 
               $conexion->consulta ("SELECT * FROM  tbl_productos inner join tbl_photo on tbl_photo.tbl_productos_idtbl_productos = tbl_productos.idtbl_productos inner join tbl_seller on tbl_seller.idtbl_vendedor = tbl_productos.tbl_vendedor_idtbl_vendedor WHERE tbl_productos.cantidad > 0 AND tbl_productos.estado = 'activo' group by tbl_productos.idtbl_productos DESC LIMIT 8");
                while($row = $conexion->extraer_registro()){
                  
    
                      echo '<div class="col-md-3 col-sm-6 hero-feature">
                                <div class="thumbnail">
                                       <div class="row">
                                <div class="col-xs-12  col-sm-12">
                            <div id="progreso" class="progress-radial progress">
                                <div class="overlay">
                                    <a href="buy.php?product='.$row[0].'"><img  width="260" height="260" class="img-responsive img-circle" src="'.$row['16'].'" alt=""></a>
                                    <img style="position:absolute; z-index:200; top:200px" width="160" height="160" class="img-responsive img-circle" src="img/oferta.png" alt="">
                                    <div class="clearfix"></div>
                                </div>
                           </div>
                             </div>
                                        </div>
                                    <div class="caption">
                                        <h3>'.$row['12'].'</h3>
                                        <p>'.$row['20'].'</p>';

                                        '<p>';


                                      
                                          if (isset($_SESSION['id'])) {
                                            echo '<a onclick="agregarcarrito('.$row['0'].',1,'.$_SESSION['id'].', '.$row['1'].')" class="btn btn-primary">Agregar al carrito!</a><br> <a href="buy.php?product='.$row[0].'" class="btn btn-default">Mas Informacion </a>';                                         
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
        <p><i class="fa fa-envelope"></i> E-mail : watcher@hotmail.com</p>
        
      </div>
      <div class="col-md-2 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">ENLACES GENERALES</h6>
        <ul class="footer-ul">
         <!--  <li><a href="#"> Centro Resoluciones</a></li> -->
          <li><a href="#"> Politicas de Privacidad</a></li>
          <li><a href="" data-toggle="modal" data-target="#terminos"  > Terminos & Condiciones</a></li>
    
         <!--  <li><a href="#"> Preguntas frecuentes</a></li> -->
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">ULTIMOS POST</h6>
        <div class="post">
          <p>Nuevo descuentos electrodomesticos <span><?php echo date("M");  ?>, <?php echo date("d");  ?>, <?php echo date("Y");  ?></span></p>
         
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
        <li><a style="cursor:pointer" href="#">www.watcher.com</a></li>
        <li><a style="cursor:pointer" data-toggle="modal" data-target="#Acerca">Acerca de</a></li>
        <li><a style="cursor:pointer" data-toggle="modal" data-target="#Contactenos" >Contáctenos</a></li>
          <li><a style="cursor:pointer" data-toggle="modal" data-target="#Ayuda"  >Ayuda</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="modal fade" id="Ayuda" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
             
            <h3 class="modal-title" id="lineModalLabel">Ayuda Watcher</h3>
        </div>
        <div class="modal-body">
            
            <!-- content goes here -->
           <form>
            <h4>Búsqueda de productos</h4>
             <p>
               Si usted desea buscar un producto debe irse en la parte superior de la página ingresar el producto que desea buscar
               los productos que busque van a estar sujetos según los que vendan los vendedores registrados puede presentar que no se encuentre el producto que usted desea.

             </p>
              <h4>Pagar productos</h4>
             <p>
               Para pagar los productos solo necesitas poseer una tarjeta de tipo MasterCard o visa la cual te permita hacer compras.
               Una vez seleccionado el producto y teniendo el requisito de la tarjeta debes agregar los que va comprar al carrito, ahí directamente
               compras el producto y debes esperar que vendedor te lo envié.

             </p>
             <h4>Envíos</h4>
             <p>
               Cuando se realice la compra el vendedor proporcionara una fecha de envió la cual usted tendrá que esperar para poder hacer un reclamo una vez
               que se cumpla la fecha y el vendedor no ha enviado el producto deberá enviarle un mensaje y el vendedor tendrá 48 horas para responderle,
               en caso que el vendedor no se ponga en contacto con usted deberá enviar un mensaje al servicio técnico para resolver su problema.

             </p>
            </form>

        </div>
        <div class="modal-footer">
            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Cerrar</button>
                </div>
              
             
            </div>
        </div>
    </div>
  </div>
</div>
<div class="modal fade" id="Contactenos" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h3 class="modal-title" id="lineModalLabel">Contactar Watcher</h3>
        </div>
        <div class="modal-body">
            
            <!-- content goes here -->
            <form accept-charset="UTF-8" action="messagemanager.php" method="POST">
            <h4>Contáctenos</h4>
             <p>
               Si usted desea hacer alguna consulta acerca de nuestra aplicación puede contactarnos.
               Gracias por preferirnos.
             </p>
       
         
              <div class="row">
    <div class="col-sm-4 col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">                
                    <form accept-charset="UTF-8">
                     <input type="email"  name="email" placeholder="Correo electronico" class="form-control name" >
                     <hr>
                        <textarea class="form-control counted" name="mensaje" placeholder="Escriba su mensaje" rows="5" style="margin-bottom:10px;"></textarea>
                       

                        <h6 class="pull-right" id="counter">320 Caracteres maximos</h6>
                        <button class="btn btn-primary" type="submit">Envia mensaje</button>
                    </form>
                </div>
            </div>
        </div>
  </div>
            </form>

        </div>
        <div class="modal-footer">
            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Cerrar</button>
                </div>
              
             
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Acerca" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h3 class="modal-title" id="lineModalLabel">Acerca de Watcher</h3>
        </div>
        <div class="modal-body">
            
            <!-- content goes here -->
            <form>
            <h4>Acerca de</h4>
             <p>
               Watcher es una aplicación web la cual permite que usuario compre artículos asi mismo que los vendores pueden publicar su productos y estos ser 
               vendidos. Nuestro objetivo como tienda online es que cliente se sienta complacido con las compras que realiza en nuestro sitio, dandole seguridad y confianza.
             </p>
       
         
     
            </form>

        </div>
        <div class="modal-footer">
            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Cerrar</button>
                </div>
              
             
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="terminos" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h3 class="modal-title" id="lineModalLabel">Acerca de Watcher</h3>
        </div>
        <div class="modal-body">
            
            <!-- content goes here -->
                        <form>
            <h3>Términos y condiciones</h3>
            <?php echo nl2br(" Los siguientes términos del uso de sofware  según lo estipulado por watcher, y según lo permitan estas Condiciones de uso y los Términos del servicio. No puede incorporar ninguna porción del Software de Watcher en otros programas ni compilar ninguna parte de él en combinación con otros programas, ni copiar de otro modo (excepto para ejercer los derechos otorgados en esta sección), modificar, crear trabajos derivados de, distribuir, asignar ningún derechos de, o licencia del software de Watcher en su totalidad o en parte. Todo el software utilizado en cualquier Servicio de Watcher es propiedad de Watcher o sus proveedores de software y está protegido por las leyes de derechos de autor de los Estados Unidos e internacionales.

Uso de servicios de terceros. Cuando utiliza el software de Watcher, también puede estar utilizando los servicios de uno o más terceros, como un operador inalámbrico o un proveedor de software móvil. Su uso de estos servicios de terceros puede estar sujeto a las políticas, términos de uso y tarifas de estos terceros.

Sin ingeniería inversa. No puede realizar ingeniería inversa, descompilar o desensamblar, manipular o eludir ninguna seguridad asociada con el Software de Watcher, ya sea en su totalidad o en parte.

Actualizaciones Podemos ofrecerle actualizaciones automáticas o manuales del Software de Watcher en cualquier momento y sin previo aviso.
Usuarios finales del gobierno. Si usted es un usuario final del gobierno de los EE. UU., Le otorgamos la licencia del Software de Watcher como 'Artículo comercial', tal como se define en el Código de Regulaciones Federales de los EE. UU. (Ver 48 CFR § 2.101) y los derechos que le otorgamos. el Software de Watcher es el mismo que los derechos que otorgamos a todos los demás en virtud de estas Condiciones de uso.

Conflictos En caso de conflicto entre estas Condiciones de uso y cualquier otro término de Watcher o de terceros aplicable a cualquier parte del Software de Watcher, como los términos de la licencia de código abierto, dichos términos controlarán la parte del Software de Watcher y en la medida del conflicto.");?>
           
            
            </form>

        </div>
        <div class="modal-footer">
            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Cerrar</button>
                </div>
              
             
            </div>
        </div>
    </div>
  </div>
</div>

</body>
<style type="text/css">
  .carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img{
    max-height: 180px;
</style>

<script >//best viewed in google-chrome


// carousel 

var button = null;
var count = 0;
var counter;

carousel ();

function carousel (){
  
  var indexSlide = document.getElementsByClassName("slide");
    for (var i = 0; i < indexSlide.length; i++ ){
       indexSlide[i].classList.remove("active"); 
    };
  
  count++;
  
  if (count > indexSlide.length) {
    count = 1;
    
    indexSlide[count - 1].classList.add("active");
    } else {
    indexSlide[count - 1].classList.add("active");
  };
};

function newCarousel(button){
  
  var indexSlide = document.getElementsByClassName("slide");
    for (var i = 0; i < indexSlide.length; i++ ){
       indexSlide[i].classList.remove("active"); 
  };

  if( button !== null ) {
      indexSlide[button].classList.add("active");
  }
};


// bar - duration

var slideTime = 5; //seconds
var length = slideTime * 1000;
var progressTime = length / 100 ;



//progress bar 

  
window.onload = progressBar;

function progressBar(slideTime){ 

  var start = Date.now();

  var id =  window.setInterval(draw, progressTime);

  var target = document.getElementsByClassName("feedback-slider-nav-dot-anim")[count - 1];


  function draw() {
    var delta = 100 * (Date.now() - start) / length;

    if ( delta > 100 ){
        delta = 100;   
        target.style.width = 0 + "px";     
        clearInterval(id); 
    } else {        
      target.style.width = (Math.round(delta) + "%");    
    }
  };    
};


var reId;

function newProgressBar( slideTime, button){ 

  start = Date.now();
  
  reId =  window.setTimeout(reDraw, progressTime);
  

  var newTarget = document.getElementsByClassName("feedback-slider-nav-dot-anim")[button];
  var resetTarget = document.getElementsByClassName("feedback-slider-nav-dot-anim");

  function reDraw() {
    
    delta = 100 * (Date.now() - start) / length;
  
    if ( delta > 100 ){
      delta = 100;   
        newTarget.style.width = 0 + "px";  
        clearTimeout(reId); 
      } else {           
        for(var j = 0; j < resetTarget.length ; j++ ){          
        resetTarget[j].style.width =  0 + "%";
      }        
      newTarget.style.width = (Math.round(delta) + "%");
      requestAnimationFrame(reDraw);
      }
    };
};

// nav-dot click

function click(e) {

  if ( e.target && e.target.nodeName == 'LI' ) {
      var click = document.getElementById('slider-dots');
      for (var h = 0, len = click.children.length; h < len; h++){
        (function(button){
          click.children[h].onclick = function(){
                count = button + 1;   
                stopLoop();                          
                newCarousel(button);                 
                clearTimeout(reId);
                newProgressBar(slideTime, button);          
                loop();                     
          };   
        })(h);
      }
  };
 
};
window.document.querySelector('.feedback-slider-nav-wrapper').addEventListener( 'click', click, true);
// window.document.querySelector('.feedback-slider-nav-wrapper').removeEventListener( 'click', click, true);

var set;
function loop(){
  set = window.setTimeout( function ouy (){
      carousel();
      progressBar(slideTime);
      set = setTimeout(ouy, length);       
    },length);
  };
loop();

function stopLoop() {
    clearTimeout(set);
};
//  // get browser width
 
//# sourceURL=pen.js
</script>
</html>