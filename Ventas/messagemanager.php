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
    <hr>
    <hr>
    <?php 

require_once("conexion.php"); $conexion = new Conexion();
if (isset($_POST['mensaje']) and isset($_POST['email'])) {
$conexion->consulta("CALL EnviarMensajeAdmi('".$_POST['mensaje']."','".$_POST['email']."')");

echo '<div >

  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          
           
        </div>
        <div class="modal-body">
            
            <!-- content goes here -->
            <form>
            <h3>Mensaje enviado</h3>
             <p>
               Muchas gracias por contactarnos en cuanto podamos leer su mensaje nos podremos en contacto con usted
            
            </form>

        </div>
     
    </div>
  </div>
</div>';
$_POST['mensaje']="";
$_POST['email']="";
}else{

  echo '<div >

  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          
           
        </div>
        <div class="modal-body">
            
            <!-- content goes here -->
            <form>
            <h3>Mensaje no fue enviado</h3>
             <p>
              Error al enviar mensaje lamentamos que halla ocurrido un error
            
            </form>

        </div>
     
    </div>
  </div>
</div>';
}


 ?>



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
        <li><a data-toggle="modal" data-target="#Acerca">Acerca de</a></li>
        <li><a  data-toggle="modal" data-target="#Contactenos" >Contactenos</a></li>
          <li><a  data-toggle="modal" data-target="#Ayuda"  >Ayuda</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="modal fade" id="Ayuda" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
             <img  src="img/logo/logo.png" height="40" width="40" style="margin-top:8px">
            <h3 class="modal-title" id="lineModalLabel">Ayuda Watcher</h3>
        </div>
        <div class="modal-body">
            
            <!-- content goes here -->
            <form>
            <h4>Busqueda de productos</h4>
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
             <h4>Envios</h4>
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
             <img  src="img/logo/logo.png" height="40" width="40" style="margin-top:8px">
            <h3 class="modal-title" id="lineModalLabel">Contactar Watcher</h3>
        </div>
        <div class="modal-body">
            
            <!-- content goes here -->
            <form>
            <h4>Contactenos</h4>
             <p>
               Si usted desea desea informacion  acerca de nuestra pagina  puede contactarnos gracias por usar nuestro sitio web.
             </p>
       
         
              <div class="row">
    <div class="col-sm-4 col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">                
                    <form accept-charset="UTF-8" action="enviarmanager.php" method="POST">
                        <textarea class="form-control counted" name="mensaje" placeholder="Escriba su mensaje" rows="5" style="margin-bottom:10px;"></textarea>
                        <h6 class="pull-right" id="counter">320 Caracteres maximos</h6>
                        <button class="btn btn-info" type="submit">Envia mensaje</button>
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
             <img  src="img/logo/logo.png" height="40" width="40" style="margin-top:8px">
            <h3 class="modal-title" id="lineModalLabel">Acerca de Watcher</h3>
        </div>
        <div class="modal-body">
            
            <!-- content goes here -->
            <form>
            <h4>Acerca de</h4>
             <p>
               Watcher es una aplicacion web la cual permite que usuario compre articulos asi mismo que los vendores pueden publicar su productos y estos ser 
               vendidos.Nuestro objetivo como tienda online es que cliente se sienta complacido con las compras que realiza en nuestro sitio, dandole seguridad y confianza.
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

</body>
</html>