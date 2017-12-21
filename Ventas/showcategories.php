<?php
//prueba hola
 
  session_start();
   require_once("conexion.php"); $conexion = new Conexion();
     require_once("conexion.php"); $con = new Conexion();

                 if(isset($_SESSION['nombre'])and isset($_SESSION['tipo']) ){
              $nombre=$_SESSION['nombre'];
              $tipo=$_SESSION['tipo'];
              
          echo ("<div id=tip style='display: none;'>".$tipo."</div>");
       echo ("<div id=nam style='display: none;'> ".$nombre." </div>");
       
     }
     if(isset( $_GET['word']) and isset($_GET['page'] )){
 $word= $_GET['word'] ;
              $page= $_GET['page'] ;
      echo "<script>\n";
   echo "var word='".$word."' \n var allpages='".$page."' \n ";
   echo "</script>";
 }

 if (isset($_GET['subcategories'])) {
 
 }else{
   header("location: index.php");
 }
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
      <link rel="stylesheet" href="css/font-awesome.min.css">
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

  <div class="lightbox-blanket">
    <div class="pop-up-container">
      <div class="pop-up-container-vertical">
        <div class="pop-up-wrapper">
          <div class="go-back" onclick="GoBack();"><i class="fa fa-arrow-left"></i>
          </div>
          <div class="product-details">
            <div class="product-left">
              <div class="product-info">
                <div class="product-manufacturer">
                </div>
                <div class="product-tit">
                  LOUNGE CHAIR
                </div>
                <div class="product-pri" price-data="320.03">
                  $320<span class="product-price-cents">03</span>
                </div>
              </div>
              <div class="product-image">
                <img src="http://3.design-milk.com/images/2013/07/Karim-Rashid-1-ChateauDAx_nook_chair.jpg" />
              </div>
            </div>
            <div class="product-right">
              <div class="product-description">
                Designer Karim Rashid continues to put his signature spin on all genres of design through various collaborations with top-notch companies. Another one to add to the win column is his work with Italian manufacturer Chateau d’Ax.
              </div>
              <div class="product-available">
                en existencia. <span class="product-extended"><a href="#"></a></span>
              </div>
              <div class="product-rating">
                <i class="fa fa-star rating" star-data="1"></i>
                <i class="fa fa-star rating" star-data="2"></i>
                <i class="fa fa-star rating" star-data="3"></i>
                <i class="fa fa-star" star-data="4"></i>
                <i class="fa fa-star" star-data="5"></i>
                <div class="product-rating-details">(3.1 - <span class="rating-count">1203</span> reviews)
                </div>

              </div>
              <div class="product-quantity">
                <label for="product-quantity-input" class="product-quantity-label">Quantity</label>
                <div class="product-quantity-subtract">
                  <i class="fa fa-chevron-left"></i>
                </div>
                <div>
                  <input type="text" id="product-quantity-input" placeholder="0" value="0" />
                </div>
                <div class="product-quantity-add">
                  <i class="fa fa-chevron-right"></i>
                </div>
              </div>
            </div>
            <div class="product-bottom">
              <div class="product-checkout">
                Total Price
                <div class="product-checkout-total">
                  <i class="fa fa-usd"></i>
                  <div class="product-checkout-total-amount">
                    0.00
                  </div>
                </div>
              </div>
              <div class="product-checkout-actions">
               <a href="#" class="btn btn-default">Mas Informacion </a>
               <?php  
                 if (isset($_SESSION['id'])) {
                                            echo '<a onclick="agregarcarrito('.$row['0'].',1,'.$_SESSION['id'].', '.$row['1'].')" class="btn btn-primary">Agregar al carrito!</a>';                                         
                                          }
                                          else
                                          {
                                            echo '<a href="login.php" class="btn btn-primary">Agregar al carrito!</a>';
                                          }
               ?>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="random-background">


    <div class="itemlist"> 


    <div class="col-lg-12">
                <h3 id="titulo">&nbsp;&nbsp;Artículos de <?php if (isset($_GET['subcategories'])) {
                echo $_GET['subcategories'];
                }  ?> </h3>
            </div>

              <div class="row">
              <div class="col-lg-4">
    <div id="left" class="span3">
            <ul id="menu-group-1" class="nav menu">  
                <li class="item-1 deeper parent active">
                    <a class="" href="#">
                        <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-1" class="sign"><i class="fa fa-plus"></i></span>
                        <span class="lbl"><?php   if (isset($_GET['subcategories'])) {
                          
                         $conexion->consulta (" SELECT nombre_categoria from tbl_categories  INNER JOIN tbl_subcategories on tbl_categorias_idtbl_categorias=idtbl_categorias WHERE nombre_subcategoria='".$_GET['subcategories']."' ");
                while($row = $conexion->extraer_registro()){
                  echo $row['0'];
               }  } ?></span>                      
                    </a>
                    <ul class="children nav-child unstyled small collapse" id="sub-item-1">
                        <li class="item-2 deeper parent active">
                            <a class="" href="#">
                                <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-2" class="sign"><i class="fa fa-plus"></i></span>
                                <span class="lbl"><?php if (isset($_GET['subcategories'])) {
                echo $_GET['subcategories'];
                }  ?></span> 
                            </a>
                            <ul class="children nav-child unstyled small collapse" id="sub-item-2">
                                <li class="item-3 current active">
                                    <a class="" href="#">
                                        <span class="sign"><i class="icon-play"></i></span>
                                        <span class="lbl">Cualquiera</span> 
                                    </a>
                                </li>
                                <li class="item-4 ">
                                    <a class="" href="#">
                                        <span class="sign"><i class="icon-play"></i></span>
                                        <span class="lbl">Marca</span> 
                                    </a>
                                </li>  
                                  <li class="item-5 ">
                                    <a class="" href="#">
                                        <span class="sign"><i class="icon-play"></i></span>
                                        <span class="lbl">Color</span> 
                                    </a>
                                </li>
                                     <li class="item-6 ">
                                    <a class="" href="#">
                                        <span class="sign"><i class="icon-play"></i></span>
                                        <span class="lbl">Localizacion</span> 
                                    </a>
                                </li>  
                                     <li class="item-7 ">
                                    <a class="" href="#">
                                        <span class="sign"><i class="icon-play"></i></span>
                                        <span class="lbl">Precio</span> 
                                    </a>
                                </li>                                
                            </ul>
                        </li>

                        <?php  
                        if(isset($_GET['subcategories'])){
 $conexion->consulta ("SELECT * FROM    tbl_subcategories WHERE tbl_categorias_idtbl_categorias= (SELECT idtbl_categorias from tbl_categories  INNER JOIN tbl_subcategories on tbl_categorias_idtbl_categorias=idtbl_categorias WHERE nombre_subcategoria='".$_GET['subcategories']."' ) ");
 $i=8;
while($row = $conexion->extraer_registro()){

  
    if($_GET['subcategories']==$row['1']){

    }else{
        echo '      <li class="item-'. $i.' deeper parent">
                            <a class="" href="#">
                                <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-'. $i.'" class="sign"><i class="fa fa-plus"></i></span>
                                <span class="lbl">'.$row['1'].'</span> 
                            </a>
                            <ul class="children nav-child unstyled small collapse" id="sub-item-'. $i.'">
                                        <li class="item-'. $i++.'">
                                    <a class="" href="#">
                                        <span class="sign"><i class="icon-play"></i></span>
                                        <span class="lbl">Cualquiera</span>                                    
                                    </a>
                                </li>
                                <li class="item-'. $i++.'">
                                    <a class="" href="#">
                                        <span class="sign"><i class="icon-play"></i></span>
                                        <span class="lbl">Marca</span>                                    
                                    </a>
                                </li>
                                 <li class="item-'. $i++.'">
                                    <a class="" href="#">
                                        <span class="sign"><i class="icon-play"></i></span>
                                        <span class="lbl">Color</span>                                    
                                    </a>
                                </li>
                                 <li class="item-'. $i++.'">
                                    <a class="" href="#">
                                        <span class="sign"><i class="icon-play"></i></span>
                                        <span class="lbl">Localizacion</span>                                    
                                    </a>
                                </li>
                                 <li class="item-'. $i++.'">
                                    <a class="" href="#">
                                        <span class="sign"><i class="icon-play"></i></span>
                                        <span class="lbl">Precio</span>                                    
                                    </a>
                                </li>
                            </ul>
                        </li>';
    }

   $i++;
                      }
                      

}

 
                        ?>
                  
                    </ul>


                </li>

               
            </ul>          
    </div>
  </div>
  <div class="col-lg-8">
      <?php  

    if (isset($_GET['subcategories'] )) {
       $conexion->consulta ("SELECT titulo,precio,descripcion,picture_code,idtbl_productos FROM tbl_productos as tp
 INNER JOIN tbl_photo AS TPH ON TPH.tbl_productos_idtbl_productos=idtbl_productos  INNER JOIN tbl_subcategories as tsu on 
 tsu.idtbl_subcategorias =tp.tbl_subcategorias_idtbl_subcategorias   where tsu.nombre_subcategoria ='".$_GET['subcategories']."' 
 group by titulo order by tsu.idtbl_subcategorias ASC  limit 8 ; ");
       $i=0;
                while($row = $conexion->extraer_registro()){
     echo ' <div class="itemlist-item-wrapper" onclick="OpenProduct('.$row['4'].');">
        <div class="product-details "  >
        <div class="descripcion hide" item-data="'.$row['4'].'"  >'.$row['2'].' </div>
          <div class="">
            <div class="product-info">

              <div class="product-title" item-data="'.$row['4'].'">
               <h3>'.$row['0'].' </h3>
              </div>
              <div class="product-price" price-data="320.03" item-data="'.$i.'">
                  ₡<span class="product-price-cents">'.$row['1'].'</span>
              </div>
            </div>
            <div class="product-image" item-data="'.$row['4'].'">
              <img src=" '.$row['3'].'" />
            </div>
          </div>
        </div>
      </div>';
      $i++;
    }
    
    }

      ?>
       </div>
   </div>

     

    </div>
  </div>

  <div class="container">
   <div class="row">
        <div class="col-lg-12">
                <h3 id="titulo">&nbsp;&nbsp;Artículos más vistos</h3>
            </div>
      <div id="adv_team_4_columns_carousel" class="carousel slide four_shows_one_move team_columns_carousel_wrapper" data-ride="carousel" data-interval="2000" data-pause="hover">
         <!--========= Wrapper for slides =========-->
         <div class="carousel-inner" role="listbox">
            <!--========= 1st slide =========-->

                             <?php 

   $conexion->consulta ("SELECT idtbl_productos,picture_code,titulo,precio FROM `tbl_productos` INNER join tbl_photo on idtbl_productos=tbl_productos_idtbl_productos inner join tbl_see on idtbl_productos=  id_tbl_productos  INNER JOIN tbl_subcategories as tsu on 
 idtbl_subcategorias =tbl_subcategorias_idtbl_subcategorias   where nombre_subcategoria ='".$_GET['subcategories']."'  GROUP by idtbl_productos ORDER BY  visitas DESC LIMIT 4");
   $i=0;
                while($row = $conexion->extraer_registro()){
 if($i=0){
       echo ' <div class="item active ">
  <div class="col-xs-12 col-sm-6 col-md-3 team_columns_item_image >
                                    <a href="buy.php?product='.$row[0].'"><img class="slide-image center-block" src="'.$row[1].'" alt="slider 01"></a>
                                     <div class="team_columns_item_caption">
                     <h4>'.$row[2].'</h4>
                     <hr>
                     <h5> ₡ '.$row[3].'</h5>
                  </div>
                                </div>
                                  </div>
                                ';
}else{
 echo ' <div class="item active ">
  <div class="col-xs-12 col-sm-6 col-md-3 team_columns_item_image cloneditem-3">
                                    <a href="buy.php?product='.$row[0].'"><img class="slide-image center-block" src="'.$row[1].'" alt="slider 01"></a>
                                     <div class="team_columns_item_caption">
                     <h4>'.$row[2].'</h4>
                     <hr>
                     <h5> ₡ '.$row[3].'</h5>
                  </div>
                                </div>
                                  </div>
                                ';
}
$i++;
                              }
   ?>
       
      
   </div>
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
        <li><a style="cursor:pointer"  data-toggle="modal" data-target="#Contactenos" >Contáctenos</a></li>
          <li><a style="cursor:pointer"  data-toggle="modal" data-target="#Ayuda"  >Ayuda</a></li>
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
               Si usted desea buscar un producto debe irse en la parte superior de la pagina ingresar el producto que desea buscar
               los productos que busque van a estar sujetos segun los que vendan los vendedores registrados puede presentar que no se encuentre el producto que usted desea.
             </p>
              <h4>Pagar productos</h4>
             <p>
               Para pagar los productos solo necesitas poseer una tarjeta de tipo mastercard o visa la cual te permita hacer compras.
               Una vez seleccionado el producto y teniendo el requisito de la tarjeta debes agregar los que va comprar al carrito, ahi directamente
               compras el producto y debes esperar que vendedor te lo envie.
             </p>
             <h4>Envíos</h4>
             <p>
               Cuando se realize la compra el vendedor porpocionara una fecha de envio la cual usted tendra que esperar para poder hacer un reclamo una vez
               que se cumpla la fecha y el vendedor no ha enviado el producto debera enviarle un mensaje y el vendedor tendra 48 horas para responderle,
               en caso que el vendedor no se ponga en contacto con usted usted debera enviar un mensaje al servicio tecnico para resolver su problema.
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
               Si usted desea hacer alguna consulta acerca de nuestra aplicaión puede contactarnos.
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


<script type="text/javascript">
  
find(word);
$('#search').val(word);
</script>

</body>
<script 
<script >//Go Back
function OpenProduct(i){
  var img = $('.product-image[item-data="'+i+'"] img');
  var descripcion = $('.descripcion[item-data="'+i+'"]');
   var titulo = $('.product-title[item-data="'+i+'"] ');
    var precio = $('.product-price[item-data="'+i+'"] ');
  
  $('.product-right .product-description').text($(descripcion).text());
  $('.product-tit').text($(titulo).text());
  $('.product-pri').text($(precio).text());
  $('.product-checkout-actions a').attr('href','buy.php?product='+i+'');
  var lbi = $('.lightbox-blanket .product-image img');
  console.log($(i).attr("src"));

  $(lbi).attr("src", $(img).attr("src"));
 

 // var price =  $(i).attr("price-data");
 // var lbprice = $('.lightbox-blanket .product-info .product-price');
 // if(lbprice){
 //   price = price.split["."];
 //   $(lbprice).html("$" + price[0] + "<span class='product-price-cents'>"+price[1] +"</span>");
 //}
  
  $(".lightbox-blanket").toggle();
  
  
  $("#product-quantity-input").val("1");
  CalcPrice (1);
  
}
function GoBack(){
  $(".lightbox-blanket").toggle();
}
GoBack();
//Calculate new total when the quantity changes.
function CalcPrice (qty){
  var price = $(".product-price").attr("price-data");
  var total = parseFloat((price * qty)).toFixed(2);
  $(".product-checkout-total-amount").text(total);
}

//Reduce quantity by 1 if clicked
$(document).on("click", ".product-quantity-subtract", function(e){
  var value = $("#product-quantity-input").val();
  //console.log(value);
  var newValue = parseInt(value) - 1;
  if(newValue < 0) newValue=0;
  $("#product-quantity-input").val(newValue);
  CalcPrice(newValue);
});

//Increase quantity by 1 if clicked
$(document).on("click", ".product-quantity-add", function(e){
  var value = $("#product-quantity-input").val();
  //console.log(value);
  var newValue = parseInt(value) + 1;
  $("#product-quantity-input").val(newValue);
  CalcPrice(newValue);
});

$(document).on("blur", "#product-quantity-input", function(e){
  var value = $("#product-quantity-input").val();
  //console.log(value);
  CalcPrice(value);
});


function AddToCart(e){
  e.preventDefault();
  var qty = $("#product-quantity-input").val();
  if(qty === '0'){return;}
  var toast = '<div class="toast toast-success">Added '+ qty +' to cart.</div>';  
  $("body").append(toast);
  setTimeout(function(){ 
  $(".toast").addClass("toast-transition");
    }, 100);
  setTimeout(function(){      
    $(".toast").remove();
  }, 3500);
}
//# sourceURL=pen.js
!function ($) {
    
    // Le left-menu sign
    /* for older jquery version
    $('#left ul.nav li.parent > a > span.sign').click(function () {
        $(this).find('i:first').toggleClass("icon-minus");
    }); */
    
    $(document).on("click","#left ul.nav li.parent > a > span.sign", function(){     
    $(this).find('i:first').toggleClass("fa");     
        $(this).find('i:first').toggleClass("fa fa-minus");  

    }); 
    
    // Open Le current menu
    $("#left ul.nav li.parent.active > a > span.sign").find('i:first').addClass("fa fa-minus");
    $("#left ul.nav li.current").parents('ul.children').addClass("in");

}(window.jQuery);

</script>
<style class="cp-pen-styles">/* Using the ITCSS (http://itcss.io/) architecture for CSS */


/* 1. Settings - Preprocessors variables, fonts, imports, etc. */

@import url(https://fonts.googleapis.com/css?family=Poppins);
@import url(https://fonts.googleapis.com/css?family=Montserrat);





/* 5. Objects - wrappers, cards, etc. */


.itemlist{ 
  max-width:1524px;  
  
  padding:20px;
  display:flex;
  flex-wrap: wrap;
}

.itemlist-item-wrapper{width: calc(90% / 3); display:inline-block; font-size: 20px !important; margin:1% 0.5% 0.5% 0.5%; background-color:#f9f9f9; padding:10px;
box-sizing: content-box;}

@media(max-width: 800px){
  .itemlist{ width:auto; margin:auto; padding:0;}
  .itemlist-item-wrapper{width:48%; margin:auto; margin-bottom:0.5%; padding:30px;}
}

@media(max-width: 600px){
  .itemlist{ width:auto; margin:auto; padding:0;}
  .itemlist-item-wrapper{width:auto; margin:auto; margin-bottom:2%;}
}


.lightbox-blanket {
  background-color: rgba(30, 30, 30, 0.9);
  display: block;
  height: 100vh;
  position: fixed;
  overflow-y: scroll;
  top: 0;
  width: 100vw;
  z-index: 20;
}

.pop-up-container {
  height: 100%;
  width: auto;
  display: table;
  margin: auto;
  position: static;
}

@media (max-width:400px) {
  .pop-up-container {
    width: 96%;
    margin: 2%;
  }
}

.pop-up-container-vertical {
  height: 100%;
  vertical-align: middle;
  display: table-cell;
}

.pop-up-wrapper {
  -webkit-box-shadow: -45px 49px 83px 1px rgba(0, 0, 0, 0.45);
  -moz-box-shadow: -45px 49px 83px 1px rgba(0, 0, 0, 0.45);
  box-shadow: -45px 49px 83px 1px rgba(0, 0, 0, 0.45);
  display: block;
  margin: 20px auto;
  width: auto;
  position: relative;
}

.pop-up-wrapper {
  background-color: white;
  display: block;
  padding: 50px;
}

.go-back {
  position: absolute;
  left: 10px;
  top: 10px;
  color:#222;
  width: 0;
  height: 0;
  border-top: 60px solid #CAE00D;
  border-right: 60px solid transparent;
}

.go-back i {
  font-size:20px;
  position: relative;
  top: -52px;
  left: 10px;
}

.product-details {
  max-width: 600px;
}

.product-left {
  display: inline-block;
  padding-right: 4%;
  vertical-align: top;
  width: 46%;
}

.product-right {
  display: inline-block;
  vertical-align: top;
  width: 49%;
}

.product-bottom{border-top:1px solid #ccc; position:relative; padding-top:20px;}

@media (max-width:650px){
  .product-left, .product-right, .product-bottom{
    width:100%;}
  .product-left{padding-right:0;}
  .product-info{display:inline-block; width:60%; vertical-align:top;}
   .product-image{display:inline-block; width:39%; vertical-align:top;}
}

@media (max-width:512px){
  .product-info, .product-image{width:100%;}
}

.product-manufacturer {
  color:#222;
  font-size: 70px;
  font-weight: bold;
  line-height: 1;
  margin: -2px;
}

.product-title {
  font-size: 28px;
  color: black;
   font-family: "arial", serif;
}

.product-price {
  color:black;
  font-size: 20px;
  letter-spacing: 1px;
}

.product-price-cents {
  text-decoration: underline;
  vertical-align: top;
  padding-left:3px;
}

.product-image {
  padding: 10px 10px 0 10px;
}

.product-image img {
  width: 100%;
    height: 100%;
    object-fit: contain;
    height: 295px;
}

.product-description {line-height:1.5;}

.product-available {
  margin-top: 25px;
}

.product-rating{
  margin-top:25px;
}

i.fa-star{color:#aaa; display:inline-block;}
i.fa-star.rating{color: rgb(232, 217, 31);}
.product-rating-details{display:inline-block; padding-left: 10px;}
@media(max-width:515px){
  .product-rating-details{padding-left:0;}
}
.product-extended {
  color: #235ba8;
  padding-left: 5px;
}
.product-quantity{margin-top:25px;
  margin-bottom:25px;}

.product-checkout{position:absolute; left:0;font-size: 12px; text-transform: uppercase;}
.product-checkout-actions{position:absolute; right:0;}
.product-checkout-total, .product-checkout-total-amount{font-size: 20px; color: #C17A41;}
.product-checkout-total * {display:inline-block;}
.product-checkout-actions{}

/* 6. Components - buttons, menus, images, etc. */
.product-quantity-label{text-transform:uppercase;}
.product-quantity *{display:inline-block;}

#product-quantity-input{background-color: #eee;border: none; width:2.5em; text-align: center;}
.product-quantity-subtract, .product-quantity-add{margin-left: 20px; padding-left:5px; padding-right: 5px;}
.product-quantity-subtract{margin-right:20px;}


.toast{
  position: fixed;
  top: -50px;
  left: calc(50vw - 50px);
  z-index:25;
  padding:5px 10px;
  border-radius: 15px;
}

.toast-success{
  background-color: green;
  color:white;
  font-size: 9pt;
}

.toast-transition{
  top: calc(50px);
  transition:top 1s;
}


/* 7. Trumps - text helpers, often !important */

.hidden {
  display: none;
}
.team_columns_carousel_wrapper {
    padding: 25px;
    overflow: hidden
}
.team_columns_carousel_control_left,
.team_columns_carousel_control_right {
    top: 26px;
    z-index: 2;
    opacity: 1;
    width: 35px;
    height: 35px;
    border: 0;
    text-shadow: none;
    text-align: center;
    -webkit-transition: all ease-in-out .3s;
    transition: all ease-in-out .3s
}
.team_columns_carousel_control_icons {
    line-height: 35px;
    font-size: 20px!important;
    font-weight: normal!important;
    margin-top:8px;
}
.team_columns_carousel_control_left {
    left: 26px!important
}
.team_columns_carousel_control_right {
    left: 63px!important
}
.adv_left {
    left: 41px!important
}
.adv_right {
    left: 78px!important
}
.team_columns_item_image {
    padding-top: 60px;
    padding-bottom: 25px
}
.team_columns_item_image img {
    width: 100%;
    -webkit-filter: grayscale(70%);
    -moz-filter: grayscale(70%);
    -ms-filter: grayscale(70%);
    -o-filter: grayscale(70%);
    filter: grayscale(70%);
    -webkit-transition: all ease-in-out .3s;
    -moz-transition: all ease-in-out .3s;
    -ms-transition: all ease-in-out .3s;
    -o-transition: all ease-in-out .3s;
    transition: all ease-in-out .3s
}
.team_columns_item_image:hover img {
    -webkit-filter: grayscale(0%);
    -moz-filter: grayscale(0%);
    -ms-filter: grayscale(0%);
    -o-filter: grayscale(0%);
    filter: grayscale(0%)
}
.team_columns_item_caption {
    padding: 10px;
    text-align: center;
    padding-bottom: 30px
}
.team_columns_item_caption>hr {
    width: 15%
}
.team_columns_item_caption h4 {
    font-weight: 800;
    text-transform: uppercase;
    font-family: 'Open Sans', sans-serif
}
.team_columns_item_caption h5 {
    font-weight: 600;
    text-transform: uppercase;
    font-family: 'Open Sans', sans-serif
}
.team_columns_item_caption p {
    font-weight: 400;
    margin-top: 20px;
    font-family: 'Open Sans', sans-serif
}
.team_columns_item_caption p a,
.team_columns_item_caption p a:visited {
    text-decoration: none;
    -webkit-transition: all ease-in-out .3s;
    transition: all ease-in-out .3s
}
.team_columns_item_social a,
.team_columns_item_social a:visited {
    width: 25px;
    float: left;
    height: 25px;
    display: block;
    line-height: 25px;
    margin-right: 2px;
    text-decoration: none;
    -webkit-transition: background ease-in-out .3s;
    transition: background ease-in-out .3s
}
@media(min-width:768px) and (max-width:789px) {
    .adv_team_columns_item_social a, .adv_team_columns_item_social a:visited {
        margin-right: 0
    }
}
.team_columns_carousel_wrapper {
    background: #fff
}
.team_columns_carousel_control_left,
.team_columns_carousel_control_left:hover,
.team_columns_carousel_control_left:active,
.team_columns_carousel_control_left:focus,
.team_columns_carousel_control_right,
.team_columns_carousel_control_right:hover,
.team_columns_carousel_control_right:active,
.team_columns_carousel_control_right:focus {
    color: #fff;
    background: #feb600!important
}
.team_columns_item_caption {
    color: #fff;
    background: #171717
}
.team_columns_item_caption>hr {
    border-top: 2px solid #feb600
}
.team_columns_item_caption p a,
.team_columns_item_caption p a:visited {
    color: #feb600
}
.team_columns_item_caption p a:hover,
.team_columns_item_caption p a:active {
    color: #cb9200
}
.team_columns_item_social a,
.team_columns_item_social a:visited {
    color: #171717;
    background: #feb600
}
.team_columns_item_social a:hover,
.team_columns_item_social a:active {
    background: #cb9200
}
.four_shows_one_move .cloneditem-1,
.four_shows_one_move .cloneditem-2,
.four_shows_one_move .cloneditem-3 {
    display: none
}
@media all and (min-width: 768px) {
    .four_shows_one_move .carousel-inner>.active.left,
    .four_shows_one_move .carousel-inner>.prev {
        left: -50%
    }
    .four_shows_one_move .carousel-inner>.active.right,
    .four_shows_one_move .carousel-inner>.next {
        left: 50%
    }
    .four_shows_one_move .carousel-inner>.left,
    .four_shows_one_move .carousel-inner>.prev.right,
    .four_shows_one_move .carousel-inner>.active {
        left: 0
    }
    .four_shows_one_move .carousel-inner .cloneditem-1 {
        display: block
    }
}
@media all and (min-width: 768px) and (transform-3d),
all and (min-width: 768px) and (-webkit-transform-3d) {
    .four_shows_one_move .carousel-inner>.item.active.right,
    .four_shows_one_move .carousel-inner>.item.next {
        -webkit-transform: translate3d(50%, 0, 0);
        transform: translate3d(50%, 0, 0);
        left: 0
    }
    .four_shows_one_move .carousel-inner>.item.active.left,
    .four_shows_one_move .carousel-inner>.item.prev {
        -webkit-transform: translate3d(-50%, 0, 0);
        transform: translate3d(-50%, 0, 0);
        left: 0
    }
    .four_shows_one_move .carousel-inner>.item.left,
    .four_shows_one_move .carousel-inner>.item.prev.right,
    .four_shows_one_move .carousel-inner>.item.active {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
        left: 0
    }
}
@media all and (min-width: 992px) {
    .four_shows_one_move .carousel-inner>.active.left,
    .four_shows_one_move .carousel-inner>.prev {
        left: -25%
    }
    .four_shows_one_move .carousel-inner>.active.right,
    .four_shows_one_move .carousel-inner>.next {
        left: 25%
    }
    .four_shows_one_move .carousel-inner>.left,
    .four_shows_one_move .carousel-inner>.prev.right,
    .four_shows_one_move .carousel-inner>.active {
        left: 0
    }
    .four_shows_one_move .carousel-inner .cloneditem-2,
    .four_shows_one_move .carousel-inner .cloneditem-3 {
        display: block
    }
}
@media all and (min-width: 992px) and (transform-3d),
all and (min-width: 992px) and (-webkit-transform-3d) {
    .four_shows_one_move .carousel-inner>.item.active.right,
    .four_shows_one_move .carousel-inner>.item.next {
        -webkit-transform: translate3d(25%, 0, 0);
        transform: translate3d(25%, 0, 0);
        left: 0
    }
    .four_shows_one_move .carousel-inner>.item.active.left,
    .four_shows_one_move .carousel-inner>.item.prev {
        -webkit-transform: translate3d(-25%, 0, 0);
        transform: translate3d(-25%, 0, 0);
        left: 0
    }
    .four_shows_one_move .carousel-inner>.item.left,
    .four_shows_one_move .carousel-inner>.item.prev.right,
    .four_shows_one_move .carousel-inner>.item.active {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
        left: 0
    }
}
.thumbnail img{
  width: 200px;
  height: 200px;
}
  .pagination>li>a, .pagination>li>span { border-radius: 50% !important;margin: 0 5px;}
      h4{
      font-weight: 600;
  }
  p{
    font-size: 12px;
    margin-top: 5px;
  }
  .price{
    font-size: 30px;
      margin: 0 auto;
      color: #333;
  }
  .right{
    float:right;
    border-bottom: 2px solid #4B8E4B;
  }
  .thumbnail{
    opacity:0.70;
    -webkit-transition: all 0.5s; 
    transition: all 0.5s;
  }
  .thumbnail:hover{
    opacity:1.00;
    box-shadow: 0px 0px 10px #4bc6ff;
  }
  .line{
    margin-bottom: 5px;
  }
  @media screen and (max-width: 770px) {
    .right{
      float:left;
      width: 100%;
    }
  }
body{
   overflow-x: hidden;
}
/* MENU-LEFT
-------------------------- */
/* layout */
#left ul.nav {
    margin-bottom: 2px;
    font-size: 12px; /* to change font-size, please change instead .lbl */
}
#left ul.nav ul,
#left ul.nav ul li {
    list-style: none!important;
    list-style-type: none!important;
    margin-top: 1px;
    margin-bottom: 1px;
}
#left ul.nav ul {
    padding-left: 0;
    width: auto;
}
#left ul.nav ul.children {
    padding-left: 12px;
    width: auto;
}
#left ul.nav ul.children li{
    margin-left: 0px;
}
#left ul.nav li a:hover {
    text-decoration: none;
}

#left ul.nav li a:hover .lbl {
    color: #999!important;
}

#left ul.nav li.current>a .lbl {
    background-color: #999;
    color: #fff!important;
}

/* parent item */
#left ul.nav li.parent a {
    padding: 0px;
    color: #ccc;
}
#left ul.nav>li.parent>a {
    border: solid 1px #999;
    text-transform: uppercase;
}    
#left ul.nav li.parent a:hover {
    background-color: #fff;
    -webkit-box-shadow:inset 0 3px 8px rgba(0,0,0,0.125);
    -moz-box-shadow:inset 0 3px 8px rgba(0,0,0,0.125);
    box-shadow:inset 0 3px 8px rgba(0,0,0,0.125);    
}

/* link tag (a)*/
#left ul.nav li.parent ul li a {
    color: #222;
    border: none;
    display:block;
    padding-left: 5px;    
}

#left ul.nav li.parent ul li a:hover {
    background-color: #fff;
    -webkit-box-shadow:none;
    -moz-box-shadow:none;
    box-shadow:none;  
}

/* sign for parent item */
#left ul.nav li .sign {
    display: inline-block;
    width: 25px;
    padding: 5px 8px;
    background-color: transparent;
    color: #fff;
}
#left ul.nav li.parent>a>.sign{
    margin-left: 0px;
    background-color: #1ab188;
}

/* label */
#left ul.nav li .lbl {
    padding: 5px 12px;
    display: inline-block;
}
#left ul.nav li.current>a>.lbl {
    color: #fff;
}
#left ul.nav  li a .lbl{
    font-size: 12px;
}

/* THEMATIQUE
------------------------- */
/* theme 1 */
#left ul.nav>li.item-1.parent>a {
    border: solid 1px #1ab188;
}
#left ul.nav>li.item-1.parent>a>.sign,
#left ul.nav>li.item-1 li.parent>a>.sign{
    margin-left: 0px;
    background-color: #1ab188;
}
#left ul.nav>li.item-1 .lbl {
    color: black;
}
#left ul.nav>li.item-1 li.current>a .lbl {
    background-color: #1ab188;
    color: #fff!important;
}

/* theme 2 */
#left ul.nav>li.item-8.parent>a {
    border: solid 1px #1ab188;
}
#left ul.nav>li.item-8.parent>a>.sign,
#left ul.nav>li.item-8 li.parent>a>.sign{
    margin-left: 0px;
    background-color: #1ab188;
}
#left ul.nav>li.item-8 .lbl {
    color: black;
}
#left ul.nav>li.item-8 li.current>a .lbl {
    background-color: #1ab188;
    color: black !important;
}

/* theme 3 */
#left ul.nav>li.item-15.parent>a {
    border: solid 1px #1ab188;
}
#left ul.nav>li.item-15.parent>a>.sign,
#left ul.nav>li.item-15 li.parent>a>.sign{
    margin-left: 0px;
    background-color: #1ab188;
}
#left ul.nav>li.item-15 .lbl {
    color: #94cf00;
}
#left ul.nav>li.item-15 li.current>a .lbl {
    background-color: #1ab188;
    color: black!important;
}

/* theme 4 */
#left ul.nav>li.item-22.parent>a {
    border: solid 1px #ef409c;
}
#left ul.nav>li.item-22.parent>a>.sign,
#left ul.nav>li.item-22 li.parent>a>.sign{
    margin-left: 0px;
    background-color: #ef409c;
}
#left ul.nav>li.item-22 .lbl {
    color: #ef409c;
}
#left ul.nav>li.item-22 li.current>a .lbl {
    background-color: #ef409c;
    color: #fff!important;
}
</style>

</html>