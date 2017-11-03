<?php
             
  session_start();
                 if(isset($_SESSION['nombre'])and isset($_SESSION['tipo']) ){
                $nombre=$_SESSION['nombre'];
                $tipo=$_SESSION['tipo'];
              
          echo ("<div id=tip style='display: none;'>".$tipo."</div>");
       echo ("<div id=nam style='display: none;'> ".$nombre." </div>");
       
     }

           require_once("conexion.php"); $conexion = new Conexion();
     $total="";
  ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
 <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-2.0.3.js"></script>
     <script src="js/bootstrap.min.js"></script>
  <link href="css/stylemenu.css" rel="stylesheet">
  <link href="css/stylecheckout.css" rel="stylesheet">
  <link href="css/stylebuy.css" rel="stylesheet">
     <script src="js/funciones.js"></script>
        <script src="js/funcionesbuy.js"></script>
        <link rel="stylesheet" href="css/font-awesome.min.css">
             <script src="js/funcionescheckout.js"></script>
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
   <li  ><a href="login.php" class="fa fa-envelope" ></a></li>
 
                </ul>
                        </div>
          
</div>
           
         
     
   
          
            </div>
            
        </div>

    </nav>
   

<div class="container wrapper" id="principal">
    
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Tu carrito <div class="pull-right"><small><a class="afix-1" href="#">Editar Carrito</a></small></div>
                        </div>
                        <div class="panel-body ">
                        <?php
                                $conexion->consulta ("SELECT * FROM  tbl_cart inner join tbl_productos on tbl_cart.id_product = tbl_productos.idtbl_productos inner join tbl_photo on tbl_photo.tbl_productos_idtbl_productos = tbl_productos.idtbl_productos inner join tbl_seller on tbl_seller.idtbl_vendedor = tbl_productos.tbl_vendedor_idtbl_vendedor where tbl_cart.id_user = ". $_SESSION['id'] . ' group by id_cart DESC');
                        while($row = $conexion->extraer_registro()){
                            echo '<div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <a href="buy.php?product='.$row['1'].'"><img class="img-responsive" src="'.$row['20'].'" /></a>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <a style="color:black" href="buy.php?product='.$row['1'].'"><div class="col-xs-12">'.$row['16'].'</div></a>
                                    <div class="col-xs-12"><small><div class="section" style="background-color:transparent">
                                        <h6 class=" title-attr"><small>CANTIDAD</small></h6>                   
            
                                            <input type="number" min="1" max="'.$row['13'].'" value="'.$row['2'].'">
                                       
                                    </div></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6><span>₡</span>'.$row['15'].'</h6>
                                     <a data-toggle="modal" data-target="#quitar'.$row['1'].'" style="color:black;cursor:pointer">Quitar del carrito</a>
                                    
                                </div>
                            </div>';
                            $total = $total+$row['15'];
                            echo '<div class="modal fade" id="quitar'.$row['1'].'" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h3 class="modal-title" id="lineModalLabel">Seguro que desea quitar este producto del carrito?</h3>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                        <div class="modal-footer">
                                            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                                <div class="btn-group" role="group">
                                                    <button onclick="eliminardelcarrito('.$row['1'].')" type="button" class="btn btn-default"  role="button">Quitar</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Cancelar</button>
                                                </div>
                                              
                                             
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>';
                        }
                            ?>

                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <small>Envío</small>
                                    <div class="pull-right"><small>En los primeros 3 meses de suscripción, no se cobrará costos de envío.</small></div>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Orden Total</strong>
                                    <div class="pull-right"><span>₡</span><span><?php echo $total;?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Direccion de envio
                        <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span></div>

                        <div  id="close"  class="panel-body panel-collapsed" >
                               <?php
                      $conexion->consulta (" SELECT name, last_name, firts_adress, second_adress, province, canton, district, zip, country,telefono FROM 
 tbl_shipping inner join  tbl_user on idtbl_usuario=id_user where id_user=". $_SESSION['id']."");
                      $row= $conexion->extraer_registro();

                      if ($row<=0) {
                        echo '
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>Nombre:</strong>
                                    <input type="text" name="first_name" class="form-control" value="" />
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Appelido:</strong>
                                    <input type="text" name="last_name" class="form-control" value="" />
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="col-md-12"><strong>Primera direccion</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" />
                                </div>
                            </div>
                         
                            <div class="form-group">
                                <div class="col-md-12"><strong>Segunda direccion</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" />
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <div class="col-md-12"><strong>Provincia:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="state" class="form-control" value="" />
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="col-md-12"><strong>Canton:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" class="form-control" value="" />
                                </div>
                            </div>
                              <div class="form-group">
                                <div class="col-md-12"><strong>Distrito:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Codigo postal:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zip_code" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Numero telefono:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Pais:</strong></div>
                                <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="" /></div>
                            </div>';
                      }else{

                        echo '
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>Nombre:</strong>
                                    <input type="text" name="first_name" class="form-control" value="'.$row[0].'" />
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Apelido:</strong>
                                    <input type="text" name="last_name" class="form-control" value="'.$row[1].'" />
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="col-md-12"><strong>Primera direccion</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="'.$row[2].'" />
                                </div>
                            </div>
                         
                            <div class="form-group">
                                <div class="col-md-12"><strong>Segunda direccion</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="'.$row[3].'" />
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <div class="col-md-12"><strong>Provincia:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="state" class="form-control" value="'.$row[4].'" />
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="col-md-12"><strong>Canton:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" class="form-control" value="'.$row[5].'" />
                                </div>
                            </div>
                              <div class="form-group">
                                <div class="col-md-12"><strong>Distrito:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" class="form-control" value="'.$row[6].'" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Codigo postal:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zip_code" class="form-control" value="'.$row[7].'" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Numero telefono:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="'.$row[9].'" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Pais:</strong></div>
                                <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="'.$row[8].'" /></div>
                            </div>';
                      }
                       ?>
                            
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
                    <div class="panel panel-info">
                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Pago seguro</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12"><strong>Tipo de tarjeta:</strong></div>
                                <div class="col-md-12">
                                    <select id="CreditCardType" name="CreditCardType" class="form-control">
                                        <option value="5">Visa</option>
                                        <option value="6">MasterCard</option>
                                        <option value="7">American Express</option>
                                        <option value="8">Discover</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Número de tarjeta:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="car_number" value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Número CVV:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="car_code" value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>Fecha de expiración</strong>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="">
                                        <option value="">Mes</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="">
                                        <option value="">Año</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <span>Pago seguro utilizando tu tarjeta:</span>
                                </div>
                                <div class="col-md-12">
                                    <ul class="cards">
                                        <li class="visa hand">Visa</li>
                                        <li class="mastercard hand">MasterCard</li>
                                        <li class="amex hand">Amex</li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-submit-fix">Realizar pago</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT END-->
                </div>
                
                </form>
            </div>
            <div class="row cart-footer">
        
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
          <p>Nuevo descuentos electrodomesticos <span>Septiembre , <?php echo date("Y");  ?> </span></p>
         
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
      <p>© <?php echo date("Y"); ?> - Todos los derechos reservados</p>
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