<?php
             
  session_start();

                 if(isset($_SESSION['nombre'])and isset($_SESSION['tipo']) ){
             	$nombre=$_SESSION['nombre'];
             	$tipo=$_SESSION['tipo'];
          echo ("<div id=tip style='display: none;'>".$tipo."</div>");
       echo ("<div id=nam style='display: none;'> ".$nombre." </div>");
       
     }else{

        header("location: login.php");
     }
     require_once("conexion.php"); $conexion = new Conexion();
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
            <link rel="stylesheet" href="css/message.css">
</head>
<body>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>

<div id="flipkart-navbar">
    <div class="container">
        <div class="row row1">
          <br>
        </div>
        <div class="row row2">
            <div class="col-sm-2">
                <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()">☰ Brand</span></h2>
                <h1 style="margin:0px;"><span class="largenav"> <a   href="index.php"><img  src="img/logo/logo.png" height="90" width="120" style="margin-top:-30px; margin-left: -80px;"></a></span></h1>
            </div>
            <div class="flipkart-navbar-search smallsearch col-sm-6 col-xs-11" style="color:black;">
                <div class="row">
                    <input class="flipkart-navbar-input col-xs-11" type=""  id="search" placeholder="Buscar productos" name="">
                    <button class="flipkart-navbar-button col-xs-1" id="find">
                       <span class="fa fa-search"></span>
                    </button>
                </div>
            </div>
            <div class="cart largenav col-sm-4">
             <ul class="largenav pull-right" id="inicio">
      
  
  <li class="upper-links"><a  id="nom" href="profile.php"  class="fa fa-user" ></a></li>
   <li  class="upper-links"><a href="message.php" class="fa fa-envelope" ></a></li>
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
    <div class="container" style="background-color: #2874f0; padding-top: 10px;">
        <span class="sidenav-heading">Home</span>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    </div>
    <a href="http://clashhacks.in/">Link</a>
    <a href="http://clashhacks.in/">Link</a>
    <a href="http://clashhacks.in/">Link</a>
    <a href="http://clashhacks.in/">Link</a>
</div>


<div class="container" id="principal">
<div class="row inbox">
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-body inbox-menu">						
				<a href="messagepanel.php" class="btn btn-danger btn-block">Nuevo correo</a>
				<ul>
					<li>
						<a href="inbox.php"><i class="fa fa-inbox"></i> Entrada <span class="label label-danger"><?php  $conexion->consulta ("SELECT count(idtbl_message) FROM `tbl_message` WHERE estado='no leido' and tbl_user_idtbl_usuario='".$_SESSION['id']."' and tipo_usuario 	not in(SELECT tipo_usuario from tbl_message where  tipo_usuario='".$_SESSION['tipo']."')");  if(!$row = $conexion->extraer_registro()) {
							echo "0";
							}else{
								echo $row['0'];
								} ?></span></a>
					</li>
					<li>
						<a href="send.php"><i class="fa fa-rocket"></i> Enviados</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-trash-o"></i> Borrados </a>
					</li>
					
				
				</ul>
			</div>	
		</div>
		
		<div class="panel panel-default">
			<div class="panel-body contacts">
				<a href="#" class="btn btn-success btn-block">Vendedores</a>
				<ul>
				<?php 
  $conexion->consulta ("select tse.correo from tbl_sales ts inner join tbl_productos as tp on  ts.tbl_productos_idtbl_productos=idtbl_productos 
inner join tbl_seller as tse on tse.idtbl_vendedor=tp.tbl_vendedor_idtbl_vendedor where 
tbl_usuario_idtbl_usuario ='1'  group by tse.correo order by idtbl_ventas limit 18");
  $i=0;
                while($row = $conexion->extraer_registro()){

               switch ($i) {
    case 0:
        echo '<li><span class="label label-danger"></span>'.$row['0'].'</li>';
        break;
    case 1:
        echo '<li><span class="label label-default"></span> '.$row['0'].'</li>';
        break;
    case 2:
        echo '<li><span class="label label-success"></span> '.$row['0'].'</li>';
        break;
          case 3:
        echo '<li><span class="label label-success"></span>'.$row['0'].'</li>';
        break;
            case 4:
        echo '<li><span class="label label-warning"></span> '.$row['0'].'</li>';
        break;
        
           case 5:
        echo '<li><span class="label label-default"></span>'.$row['0'].'</li>';
        $i=0;
        break;

}
$i++;
}
				 ?>
				
				</ul>
			
			</div>
		
		</div>			
		
	</div><!--/.col-->
	
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-body message">
				<p class="text-center">Nuevo Mensaje</p>
				<form class="form-horizontal" role="form" action="sendmessagenow.php" method="post">
					<div class="form-group">
				    	<label for="to" class="col-sm-1 control-label">Para:</label>
				    	<div class="col-sm-11">
                              <input type="email" class="form-control select2-offscreen" name="vendedor" placeholder="Vendedor" tabindex="-1">
				    	</div>
				  	</div>
					<div class="form-group">
				    	<label for="cc" class="col-sm-1 control-label">Asunto:</label>
				    	<div class="col-sm-11">
                              <input type="text" class="form-control select2-offscreen" name="asunto" placeholder="Asunto" tabindex="-1">
				    	</div>
				  	</div>
				
				  
				
				
				<div class="col-sm-11 col-sm-offset-1">
					
					<div class="btn-toolbar" role="toolbar">
						
						

						
						
						
						
						
					</div>
					<br>	
					
					<div class="form-group">
						<textarea class="form-control" id="message" name="mensaje" rows="12" placeholder="Escriba el texto aqui"></textarea>
					</div>
					
					<div class="form-group">	

						<button type="submit" class="btn btn-success">Enviar</button>	
						<button class="btn btn-default"><span class="fa fa-paperclip"></span></button>
					</div>
				</div>	
				</form>
			</div>	
		</div>	
	</div><!--/.col-->		
</div>
</div>



</body>
</html>