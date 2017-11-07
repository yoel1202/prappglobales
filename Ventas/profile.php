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
        <a href="" class="btn btn-danger btn-block btn-compose-email">Actividades</a>
        <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
            <li class="active">
                <a>
                    <i class="fa fa-user "></i>Perfil <span class="label pull-right"></span>
                </a>
            </li>
            <li>
              
            </li>
            <li>
                <a href="#"><i class="fa fa-envelope"></i>Mensajes</a>
            </li>
            <li>
                <a href="productbuy.php">
                   <?php 
                    $conexion->consulta ("select distinct( idtbl_productos) from tbl_sales ts inner join tbl_productos  on  ts.tbl_productos_idtbl_productos=idtbl_productos
 inner join tbl_user on tbl_usuario_idtbl_usuario='". $_SESSION['id']."' inner join tbl_photo tph on tph.tbl_productos_idtbl_productos=idtbl_productos group by idtbl_productos");
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
       
        
        <!-- tabs -->
        <div class="card">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Informacion Personal</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Direccion</a></li>
            
            </ul>
    
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <!--<h2 class="page-header">Search Results</h2>-->
                    <section class="comment-list">
                      <!-- First Comment -->
                      <article class="row">
                        <h1 class="page-header">Editar mi perfil</h1>
  <div class="row">
    <!-- 
    left column -->
   
      
        <?php 
   $conexion->consulta ("SELECT  nombre,nombre_usuario, cedula, correo, password, telefono, foto from tbl_user where idtbl_usuario=". $_SESSION['id']."");
                while($row = $conexion->extraer_registro()){ 

    echo'<form class="form-horizontal"  action="subirimagen.php" method="post" enctype="multipart/form-data" id="form">
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="'.$row['6'].'" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Subir Foto...</h6>
        <input type="file" class="text-center center-block well well-sm"  name="archivo" id="file-5" class="inputfile inputfile-4">
        
      </div>
    </div>
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
    <!--     <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
      
      </div> -->
      <h3>Informacion personal</h3>
               <div class="form-group">
          <label class="col-lg-3 control-label">Nombre:</label>
          <div class="col-lg-8">
            <input class="form-control" name="nombre" value="'.$row['0'].'" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Nombre usuario:</label>
          <div class="col-lg-8">
            <input class="form-control" name="usuario" value="'.$row['1'].'" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Cedula:</label>
          <div class="col-lg-8">
            <input class="form-control" name="cedula" value="'.$row['2'].'" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Correo:</label>
          <div class="col-lg-8">
            <input class="form-control" name="correo" value="'.$row['3'].'" type="text">
          </div>
        </div>

           <div class="form-group">
          <label class="col-lg-3 control-label">Telefono:</label>
          <div class="col-lg-8">
            <input class="form-control" name="telefono" value="'.$row['5'].'" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Contraseña:</label>
          <div class="col-md-8">
            <input class="form-control" name="pass" value="'.$row['4'].'" type="password">
          </div>
        </div>  
        <div class="form-group">
          <label class="col-md-3 control-label">Confirmar Contraseña:</label>
          <div class="col-md-8">
            <input class="form-control" value="'.$row['4'].'" type="password">
          </div>
        </div>

         <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Guardar cambios" type="submit">
            <span></span>
           
          </div>
        </div>
      </form>';

      }
   ?>
      
       
    </div>
  </div>
                      </article>      
                    </section>
                </div>




                <div role="tabpanel" class="tab-pane" id="profile">
                    

                     <div class="row">
                     <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
      <div id="mensaje">Puede modificar su direccion de envio de los paquetes</div>
      </div> 
                       <?php
                      $conexion->consulta (" SELECT name, last_name, firts_adress, second_adress, province, canton, district, zip, country FROM 
 tbl_shipping inner join  tbl_user on idtbl_usuario=id_user where id_user=". $_SESSION['id']."");
                      $row= $conexion->extraer_registro();
                      if ($row<=0) {
                        echo '<div class="col-xs-6">
                <div class="form-group">
                    <label for="firstname">Nombre</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Nombre" required="" >
                </div>
                <div class="form-group">
                    <label for="lastname">Apellido</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Apellidos" required="" >
                </div>
                
                                <div class="form-group">
                    <label for="AddressLine1">Primera direccion </label>
                    <input type="text" class="form-control" id="AddressLine1" placeholder="Primera Direccion" required="" >
                </div>
                <div class="form-group">
                    <label for="Address Line 1">Segunda direccion 2</label>
                    <input type="text" class="form-control" id="AddressLine2" placeholder="Segunda Direccion" required="" >
                </div>
                
            
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="city">Provincia</label>
                    <input type="text" class="form-control" id="city" placeholder="Provincia" required="" >
                </div>
                <div class="form-group">
                    <label for="State">Canton</label>
                    <input type="text" class="form-control" id="state" placeholder="Canton" required="" >
                </div>   <div class="form-group">

                    <label for="State">Distrito</label>
                    <input type="text" class="form-control" id="district" placeholder="Distrito" required="" >
                </div>

                
                 <div class="form-group">
                    <label for="zip">Zip / Codigo Postal</label>
                    <input type="text" class="form-control" id="zip" placeholder="Codigo Postal" required="" >
                </div>
                <div class="form-group">
                <label for="pais">Pais</label>
                    <input type="text" class="form-control" id="country" placeholder="pais" required="" >
                </div> 
                    <div class="col-md-12">
            <input class="btn btn-primary"  value="Guardar cambios" onclick="guardardireccion('.$_SESSION['id'].')" type="submit">
            <span></span>
             
           
          </div>

            </div>
        ';
                      }
                while($row){ 
       
     echo' 
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="firstname">Nombre</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Nombre" required="" value="'.$row['0'].'">
                </div>
                <div class="form-group">
                    <label for="lastname">Apellido</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Apellidos" required="" value="'.$row['1'].'">
                </div>
                
                                <div class="form-group">
                    <label for="AddressLine1">Primera direccion </label>
                    <input type="text" class="form-control" id="AddressLine1" placeholder="Primera Direccion" required="" value="'.$row['2'].'">
                </div>
                <div class="form-group">
                    <label for="Address Line 1">Segunda direccion 2</label>
                    <input type="text" class="form-control" id="AddressLine2" placeholder="Segunda Direccion" required="" value="'.$row['3'].'">
                </div>
                
            
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="city">Provincia</label>
                    <input type="text" class="form-control" id="city" placeholder="Provincia" required="" value="'.$row['4'].'">
                </div>
                <div class="form-group">
                    <label for="State">Canton</label>
                    <input type="text" class="form-control" id="state" placeholder="Canton" required="" value="'.$row['5'].'">
                </div>   <div class="form-group">

                    <label for="State">Distrito</label>
                    <input type="text" class="form-control" id="district" placeholder="Distrito" required="" value="'.$row['6'].'">
                </div>

                
                 <div class="form-group">
                    <label for="zip">Zip / Codigo Postal</label>
                    <input type="text" class="form-control" id="zip" placeholder="Codigo Postal" required="" value="'.$row['7'].'">
                </div>
                <div class="form-group">
                <label for="pais">Pais</label>
                    <input type="text" class="form-control" id="country" placeholder="Codigo Postal" required="" value="'.$row['8'].'">
                </div> 
                    <div class="col-md-12">
            <input class="btn btn-primary"  value="Guardar cambios" onclick="guardardireccion('.$_SESSION['id'].')" type="submit">
            <span></span>
            
           
          </div>

            </div>
        ';
  if ($row>1) {
            $row=false;
         }
               }
   ?>

    </div>
                </div>






            
            </div>
        </div>
        <!-- tabs -->
        
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

</body>
</html>