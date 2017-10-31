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
            <li class="active">
                <a href="#mail-inbox.html">
                    <i class="fa fa-user "></i>Perfil <span class="label pull-right"></span>
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
            <li class="">
                <a href="productstosell.php">
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
       
        
        <!-- tabs -->
        <div class="card">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Informacion de la empresa</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Direccion</a></li>
            
            </ul>
    
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <!--<h2 class="page-header">Search Results</h2>-->
                    <section class="comment-list">
                      <!-- First Comment -->
                      <article class="row">
                        <h1 class="page-header">Editar perfl</h1>
  <div class="row">
    <!-- 
    left column -->
   
      
        <?php 
   $conexion->consulta ("SELECT  nombre,nombre_usuario, cedula_juridica, correo, password, telefono, foto from tbl_seller where idtbl_vendedor=". $_SESSION['id']."");
                while($row = $conexion->extraer_registro()){ 

    echo'<form class="form-horizontal"  action="subirimagenseller.php" method="post" enctype="multipart/form-data" id="form">
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
      <h3>Informacion de la empresa</h3>
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
          <label class="col-lg-3 control-label">Cedula Juridica:</label>
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
          <label class="col-md-3 control-label">Contraeña:</label>
          <div class="col-md-8">
            <input class="form-control" name="pass" value="'.$row['4'].'" type="password">
          </div>
        </div>  
        <div class="form-group">
          <label class="col-md-3 control-label">Confirmar Contraña:</label>
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
             <input class="btn btn-default" value="Actualizar cambios" type="reset">
           
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