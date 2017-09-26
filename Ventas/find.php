<?php
//prueba
  $word= $_REQUEST['word'] ;
             
  session_start();

                 if(isset($_SESSION['nombre'])){
              $nombre=$_SESSION['nombre'];
          
       echo ("<div id=nam style='display: none;'> ".$nombre." </div>");
     }
      echo "<script>\n";
   echo "var word='".$word."' \n";
   echo "</script>";
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

    <a  class="navbar-brand" href="index.html">Watcher   </a>
</div>

<div class="col-md-6 " id="buscador">
      <div id="custom-search-input ">
                            <div class="input-group col-md-12">

                                <input type="text"  id="search" class="search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button  id="find" class="btn btn-danger" type="button">
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
</div>
    </nav>
  

    <div class="container" id="principal">

          <div class="row">
       <div class="col-md-3">
 <div class="container">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-md-offset-3 col-lg-offset-0">
      <div class="well">
      <h3 align="center">Filtros de busqueda</h3>
        <form class="form-horizontal">
          <div class="form-group">
            <label for="location1" class="control-label">Localizacion</label>
            <select class="form-control" name="" id="location1">
              <option value="">Cualquiera</option>
              <option value="">Puntarenas</option>
              <option value="">San Jose</option>
               <option value="">Heredia</option>
                <option value="">Alajuela</option>
                 <option value="">Guanacaste</option>
                  <option value="">Limon</option>
            </select>
          </div>
        <div class="form-group">
            <label for="pricefrom" class="control-label">Canton</label>
            <div class="input-group">
              <div class="input-group-addon" id="basic-addon1"></div>
              <input type="text" class="form-control" id="pricefrom" aria-describedby="basic-addon1">
            </div>
          </div>
           <div class="form-group">
            <label for="pricefrom" class="control-label">Empresa</label>
            <div class="input-group">
              <div class="input-group-addon" id="basic-addon1"></div>
              <input type="text" class="form-control" id="pricefrom" aria-describedby="basic-addon1">
            </div>
          </div>

          <div class="form-group">
            <label for="pricefrom" class="control-label">Minimo Precio</label>
            <div class="input-group">
              <div class="input-group-addon" id="basic-addon1">₡</div>
              <input type="text" class="form-control" id="pricefrom" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="form-group">
            <label for="priceto" class="control-label">Maximo Precio</label>
            <div class="input-group">
              <div class="input-group-addon" id="basic-addon2">₡</div>
              <input type="text" class="form-control" id="priceto" aria-describedby="basic-addon1">
            </div>
          </div>
          <p class="text-center"><a href="#" class="btn btn-danger glyphicon glyphicon-search" role="button"></a></p>
        </form>
      </div>
    </div>
  </div>
</div>
           </div>
    <div class="col-md-9">
<div class="container">
	<div class="row" >
    	


  		<div class="col-md-11 col-sm-6 margin50">
    		<span class="thumbnail">
        <a href="buy.php"><img src="img/productos/s4.jpg" alt="..."></a>
      			
      			<h4>S4</h4>
      			<div class="ratings">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                </div>
      			<p>LLevate S4 con un precio de descuento de hasta un 10% aprovecha. </p>
      			<hr class="line">
      			<div class="row">
      				<div class="col-md-6 col-sm-6">
      					<p class="price">₡150000</p>
      				</div>
      				<div class="col-md-6 col-sm-6">
      			
      				</div>
      				
      			</div>
    		</span>
  		</div>
  		
      			
  		<!-- END PRODUCTS -->
	</div>
	<div class="row" >
	<div class="col-md-11 col-sm-6">
    		<span class="thumbnail">
      			<img src="img/productos/ps3.jpg" alt="...">
      			<h4>Product Tittle</h4>
      			<div class="ratings">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                </div>
      			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
      			<hr class="line">
      			<div class="row">
      				<div class="col-md-6 col-sm-6">
      					<p class="price">$29,90</p>
      				</div>
      				<div class="col-md-6 col-sm-6">
      					<button class="btn btn-success right" > BUY ITEM</button>
      				</div>
      				
      			</div>
    		</span>
  		</div>
  		</div>
  			<div class="row" >
  		<div class="col-md-11 col-sm-6">
    		<span class="thumbnail">
      			<img src="img/productos/smarttv.jpg" alt="...">
      			<h4>Product Tittle</h4>
      			<div class="ratings">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                </div>
      			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
      			<hr class="line">
      			<div class="row">
      				<div class="col-md-6 col-sm-6">
      					<p class="price">$29,90</p>
      				</div>
      				<div class="col-md-6 col-sm-6">
      					<button class="btn btn-success right" > BUY ITEM</button>
      				</div>
      				
      			</div>
    		</span>
  		</div>
  			</div>
  			<div class="row" >
  		<div class="col-md-11 col-sm-6">
    		<span class="thumbnail">
      			<img src="img/productos/camisa.jpg" alt="...">
      			<h4>Product Tittle</h4>
      			<div class="ratings">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                </div>
      			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
      			<hr class="line">
      			<div class="row">
      				<div class="col-md-6 col-sm-6">
      					<p class="price">$29,90</p>
      				</div>
      				<div class="col-md-6 col-sm-6">
      					<button class="btn btn-success right" > BUY ITEM</button>
      				</div>
</div>
    		</span>
  		</div>
  			</div>

  			      <div class="row text-center">
            <div class="col-lg-12">
                <nav aria-label="Page navigation" id="div1">
  <ul class="pager">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">«</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">»</span>
      </a>
    </li>
  </ul>
</nav>
            </div>
        </div>
 

        <hr>

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
<style type="text/css">
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
</style>
</body>
</html>