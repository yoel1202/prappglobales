<?php
             
  session_start();
  $record_ventas = "0";
    
   

                 if(isset($_SESSION['nombre'])){
              $nombre=$_SESSION['nombre'];
          
       echo ("<div id=nam style='display: none;'> ".$nombre." </div>");
     }
     if (isset($_GET['product'])) {
      require_once("conexion.php"); $conexion = new Conexion();
       
      $conexion->consulta (" SELECT id_tbl_see FROM  tbl_see where id_tbl_productos='".$_GET['product']."'");
      $row2 = $conexion->extraer_registro();
      if ($row2>0) {
        $conexion->consulta (" SELECT MAX(visitas) FROM  tbl_see where id_tbl_productos='".$_GET['product']."'");
     $row = $conexion->extraer_registro();
     $count=$row[0]+1;
      $conexion->consulta (" UPDATE tbl_see SET visitas='".$count."' WHERE id_tbl_see='".$row2[0]."' ");
      }else{
     $conexion->consulta (" INSERT INTO tbl_see(visitas,id_tbl_productos) VALUES('1','".$_GET['product']."')");
    }
     $record_ventas = "0";
     
     $conexion->consulta ("SELECT * FROM  tbl_productos inner join tbl_photo on tbl_photo.tbl_productos_idtbl_productos = tbl_productos.idtbl_productos inner join tbl_seller on tbl_seller.idtbl_vendedor = tbl_productos.tbl_vendedor_idtbl_vendedor WHERE tbl_productos.idtbl_productos = " . $_GET['product'] .' group by tbl_photo.idtbl_photo DESC');
                while($row = $conexion->extraer_registro()){
                  //datos del producto
                  $precio_envio = $row['8'];
                  $cantidad_disponible = $row['9'];
                  $precio_producto = $row['11'];
                  $nombre_producto = $row['12'];
                  $garantia_producto = $row['13'];
                  $descripcion_producto = $row['14'];
                  $idfoto_producto = $row['15']; 
                  $foto_producto = $row['16'];   
                  //datos del vendedor
                  $id_vendedor = $row['18'];   
                  $nombre_vendedor = $row['20'];   
                  $correo_vendedor = $row['23'];   
                  $cedulaj_vendedor = $row['24']; 
                  $foto_vendedor = $row['26'];   
                  $telefono_vendedor = $row['24'];     
                }
      $conexion->consulta ("SELECT count(*) FROM  tbl_record_seller WHERE tbl_vendedor_idtbl_vendedor = " . $id_vendedor);
                while($row = $conexion->extraer_registro()){
                  //datos del producto
                  $record_ventas = $row['0'];    
                } 

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
  <link href="css/stylebuy.css" rel="stylesheet">
     <script src="js/funciones.js"></script>
        <script src="js/funcionesbuy.js"></script>
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

                                <input type="text" id="search" class="  search-query form-control" placeholder="Buscar" />
                                <span class="input-group-btn">
                                    <button id="find" class="btn btn-danger" type="button" ">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </span>
                            </div>
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
   <br>

     <div class="container" id="principal">
          <div class="row">
          <div class="col-xs-5">

                    <?php
echo '<div class="col-5 "><img id="picture" height="300px" width="350px;" src="'.$foto_producto.'" /></div><div class="col-2">';
                         $conexion->consulta ("SELECT * FROM  tbl_photo WHERE tbl_productos_idtbl_productos = " . $_GET['product']);
                          while($row = $conexion->extraer_registro()){
                            echo '<img onclick="ponerfotoproducto(\'' . $row['1'] .  '\')" style="border:1px solid gray; cursor:pointer;" height="80px" width="100px;" src="'.$row['1'].'" />';
                
                          }
                    
                          echo '</div>';
                    ?>
                </div>
                <div class="col-xs-5" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3><?php echo $nombre_producto;?></h3>    
                    <h5 style="color:#337ab7">Vendido por <a style="color:#337ab7" href="#"><?php echo $nombre_vendedor;?></a> · <small style="color:#337ab7">(<?php echo $record_ventas;?> ventas exitosas)</small></h5>
                    <img height="100" width="100" src="<?php echo $foto_vendedor;?>">
        
                    <!-- Precios -->
                    <h6 class="title-price"><small>PRECIO OFERTA</small></h6>
                    <h3 style="margin-top:0px;">₡ <?php echo $precio_producto;?></h3>
        
                    <!-- Detalles especificos del producto -->
  <!--                   <div class="section">
                        <h6 class="title-attr" style="margin-top:15px;" ><small>COLOR</small></h6>                    
                        <div>
                            <div class="attr" style="width:25px;background:#5a5a5a;"></div>
                            <div class="attr" style="width:25px;background:white;"></div>
                        </div>
                    </div>
                    <div class="section" style="padding-bottom:5px;">
                        <h6 class="title-attr"><small>CAPACIDAD</small></h6>                    
                        <div>
                            <div class="attr2">16 GB</div>
                            <div class="attr2">32 GB</div>
                        </div>
                    </div>  -->  
                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>CANTIDAD</small></h6>                   
                        <div>
                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                            <input id="cantidadp" value="1" max="10"/>
                            <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                        </div>
                    </div>                
        
                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                    <?php
                          if (isset($_SESSION['id'])) {
                                            echo '<a onclick="agregarcarrito('.$_GET['product'].',0)" class="btn btn-primary">Agregar al carrito!</a><br>';                                         
                                          }
                                          else
                                          {
                                            echo '<a href="login.php" class="btn btn-primary">Agregar al carrito!</a> <br>';
                                          }
                                        ?>
                        <h6><a href="#"><span class="glyphicon glyphicon-heart-empty" style="cursor:pointer;"></span> Agregar a lista de deseos</a></h6>
                    </div>                                        
                </div>                              
              
                <div class="col-xs-9 container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a style="color: black;" data-toggle="tab" href="#menu1">Detalle del producto</a></li>
                        <li><a style="color: black;" data-toggle="tab" href="#menu2">Garantía</a></li>
                        <li><a style="color: black;" data-toggle="tab" href="#menu3">Vendedor</a></li>
                        <li><a style="color: black;" data-toggle="tab" href="#menu4">Envío</a></li>
                    </ul>
                    <div class="tab-content">
                    <div style="width:100%;border-top:1px solid silver" id="menu1" class="tab-pane fade in active">
                       <p style="padding:15px;">
                            <p>
                              <?php echo $descripcion_producto;?>
                            </p>
                        </p>
                     </div>
                      <div style="width:100%;border-top:1px solid silver" id="menu2" class="tab-pane fade">
                       <p style="padding:15px;">
                            <p>
                            Queremos que compres en Watcher con seguridad y certeza. Por ello, nos aseguraremos de que recuperas tu dinero si el artículo que has pedido no te llega, si es muy distinto de su descripción o si tienes algún problema con el reembolso de la devolución. Recuerda que la Garantía al cliente de Watcher solo cubre las compras realizadas a través de PayPal.
                              <?php echo "El tiempo establecido para la garantía de este producto es de: <strong>" . $garantia_producto.'.</strong>';?>
                            </p>
                        </p>
                     </div>
                      <div style="width:100%;border-top:1px solid silver" id="menu3" class="tab-pane fade">
                       <p style="padding:15px;">
                            <div class="row">
                              <div class="col-md-3">
                                <img height="100" width="100" src="<?php echo $foto_vendedor;?>">
                              </div>
                              <div class="col-md-9">
                                 <p>
                                  <ul>
                                    <li>Nombre del vendedor: &nbsp;&nbsp;&nbsp;<?php echo $nombre_vendedor;?></li>
                                    <li>Cédula jurídica:  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cedulaj_vendedor;?></li>
                                    <li>Correo electrónico: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $correo_vendedor;?></li>
                                    <li>Teléfono:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $telefono_vendedor;?></li>

                                  </ul>
                                </p>
                              </div>
                            </div>
                       
                           
                        </p>
                     </div>
                      <div style="width:100%;border-top:1px solid silver" id="menu4" class="tab-pane fade">
                       <p style="padding:15px;">
                            <p>
                            Cuando el vendedor haya enviado nuestro pedido, este pasará a la lista de pedidos enviados, y el vendedor adjuntará un número de seguimiento que podremos ver en el detalle del pedido. 

                            El precio de envío para este producto a cualquier parte del país de Costa Rica es de: ₡ <?php echo '<strong class="">'.$precio_envio.'</strong>';?>
                            </p>
                        </p>
                     </div>
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