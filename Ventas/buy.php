<?php
             
  session_start();
  $record_ventas = "0";
    
                 if(isset($_SESSION['nombre'])and isset($_SESSION['tipo']) ){
              $nombre=$_SESSION['nombre'];
              $tipo=$_SESSION['tipo'];
              
          echo ("<div id=tip style='display: none;'>".$tipo."</div>");
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
                  $color =  $row['4']; 
                  $peso =  $row['3'];
                  $ancho =  $row['5'];
                  $alto =  $row['6']; 
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
                                    <button id="find" class="btn btn-primary" type="button" ">
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
                         $conexion->consulta ("SELECT * FROM  tbl_photo WHERE tbl_productos_idtbl_productos = " . $_GET['product'] . " order by idtbl_photo DESC LIMIT 4");
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
                                            echo '<a onclick="agregarcarrito('.$_GET['product'].',0,'.$_SESSION['id'].', '.$id_vendedor.')" class="btn btn-primary">Agregar al carrito!</a><br>';                                         
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
                            <p>
                              Color: <?php echo $color;?>
                            </p>
                            <p>
                              Peso: <?php echo $peso;?>
                            </p>

                            <p>
                              Ancho: <?php echo $ancho;?>
                            </p>
                            <p>
                              Altura: <?php echo $alto;?>
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

</body>
</html>


