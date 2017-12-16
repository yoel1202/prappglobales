<?php
             
  session_start();
    require_once("conexion.php"); $conexion = new Conexion();
                 if(isset($_SESSION['nombre'])and isset($_SESSION['tipo']) ){
             	$nombre=$_SESSION['nombre'];
             	$tipo=$_SESSION['tipo'];
          echo ("<div id=tip style='display: none;'>".$tipo."</div>");
       echo ("<div id=nam style='display: none;'> ".$nombre." </div>");
       
   }else{

        header("location: login.php");
     }
          if(isset( $_GET['mensaje'])){
         
 }else{
    header("location: login.php");
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
          <script src="js/funcionesinsert.js"></script>
      <link rel="stylesheet" href="css/font-awesome.min.css">
            <link rel="stylesheet" href="css/message.css">
</head>
<body>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	
   <script src="js/funciones.js"></script>
      <script src="js/jquery.js"></script>
 <link href="css/style.css" rel="stylesheet">
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
                    <input class="flipkart-navbar-input col-xs-11" type=""  id="search" placeholder="Buscar productos" name="">
                    <button class="flipkart-navbar-button col-xs-1" id="find">
                       <span class="fa fa-search"></span>
                    </button>
                </div>
            </div>
            <div class="cart largenav col-sm-4">
             <ul class="largenav pull-right" id="inicio">
      
  
  <li class="upper-links"><a  id="nom" href="profile.php"  class="fa fa-user" ></a></li>
  <?php  
 if(isset($_SESSION['id'])){
  $conexion->consulta ("SELECT count(idtbl_message) FROM `tbl_message` WHERE estado='no leido' and tbl_user_idtbl_usuario='".$_SESSION['id']."' and tipo_usuario   not in(SELECT tipo_usuario from tbl_message where  tipo_usuario='".$_SESSION['tipo']."')");  if(!$row = $conexion->extraer_registro()) {
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


<div class="container" id="principal">
<div class="row inbox">
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-body inbox-menu">						
				<a href="messagepanel.php" class="btn btn-danger btn-block">Nuevo correo</a>
				<ul>
					<li>
						<a href="inbox.php"><i class="fa fa-inbox"></i> Entrada <span class="label label-danger"><?php  
    if ($_SESSION['tipo']=="user") {
            $conexion->consulta ("SELECT count(idtbl_message) FROM `tbl_message` WHERE estado='no leido' and tbl_user_idtbl_usuario='".$_SESSION['id']."' and tipo_usuario  not in(SELECT tipo_usuario from tbl_message where  tipo_usuario='".$_SESSION['tipo']."')");  if(!$row = $conexion->extraer_registro()) {
              echo "0";
              }else{
                echo $row['0'];
                }
                }else{

                   $conexion->consulta ("SELECT count(idtbl_message) FROM `tbl_message` WHERE estado='no leido' and   tbl_vendedor_idtbl_vendedor='".$_SESSION['id']."' and tipo_usuario   not in(SELECT tipo_usuario from tbl_message where  tipo_usuario='".$_SESSION['tipo']."')");  if(!$row = $conexion->extraer_registro()) {
              echo "0";
              }else{
                echo $row['0'];
                }
                }


                 ?></span></a>
					</li>
					<li>
						<a href="send.php"><i class="fa fa-rocket"></i> Enviados</a>
					</li>
					<li>
						<a href="delete.php"><i class="fa fa-trash-o"></i> Borrados </a>
					</li>
					
				
				</ul>
			</div>	
		</div>
		
		<div class="panel panel-default">
			<div class="panel-body contacts">
			  <?php 
        if ($_SESSION['tipo']=="user") {
      echo'<a href="#" class="btn btn-success btn-block">Vendedores recientes</a>';
      echo' <ul>';
      
  $conexion->consulta ("select tse.correo from tbl_sales ts inner join tbl_productos as tp on  ts.tbl_productos_idtbl_productos=idtbl_productos 
inner join tbl_seller as tse on tse.idtbl_vendedor=tp.tbl_vendedor_idtbl_vendedor where 
tbl_usuario_idtbl_usuario ='".$_SESSION['id']."'  group by tse.correo order by idtbl_ventas limit 18");
        }else{

            echo'<a href="#" class="btn btn-success btn-block">Compradores recientes</a>';
      echo' <ul>';
      
  $conexion->consulta ("select tse.correo from tbl_sales ts inner join tbl_productos as tp on  ts.tbl_productos_idtbl_productos=idtbl_productos 
inner join tbl_user as tse on tse.idtbl_usuario=ts.tbl_usuario_idtbl_usuario where 
tp.tbl_vendedor_idtbl_vendedor ='".$_SESSION['id']."'  group by tse.correo order by idtbl_ventas limit 18");
        }
        
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
				 <img alt="Anuncio" border="0" height="1" src="whatcher.png" width="1">
   <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0"
      style="background-color:#ffffff" width="100%">
      <tr>
         <td align="center">
            <div style="max-width:558px;margin:0 auto;padding:0 10px">
            <table align="center" border="0" cellpadding="0" cellspacing="0" st
            yle="max-width:558px;padding:0;margin:0;font-family:Arial,Helvetica,sans-=
            serif;font-weight:normal;font-size:13px;line-height:18px;color:#444444;text=
            -align:left" width="100%">
   
      <tr>
      <tr>
         <td align="left" style="font-family:Arial,Helvetica,sans-serif;font-wei=
         ght:normal;font-size:15px;line-height:18px;padding:22px 0 8px 10px;border-c=
         ollapse:collapse;border-bottom:1px solid #dcdcdc" valign="top" width="1=
         00%">
         <img alt="Google" border="0" height="150" width="600" src="whatcher.png" style="display:block">
         </td>
      </tr>
      <tr>
         <td style="padding:44px 0 0" width="100%">
           <?php 

                              $conexion->consulta ("CALL readmessage('".$_GET['mensaje']."','".$_SESSION['tipo']."')");
                while($row = $conexion->extraer_registro()){
        echo' <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0"
         style="font-family:Arial,Helvetica,sans-serif;font-weight:normal;font-si=
         ze:13px;line-height:18px;color:#444444;background-color:#ffffff;padding:0;m=
         argin:0" width="100%">
       


              
      <tr>
         <td align="center" style="font-family:Arial,Helvetica,sans-serif;font-w=
         eight:normal;font-size:28px;line-height:32px;color:#1a1a1a;font-weight:norm=
         al" valign="top" width="100%">
        Mensaje fue enviado</td>
      </tr>
  
      <tr>
         <td style="padding:20px 0 0" width="100%">
         <table align="left" border="0" cellpadding="0" cellspacing="0" widt
            h="380">
            <tr>
               <td align="left" style="padding:20px 0 0;font-family:Arial,Helvetica,sa=
               ns-serif;font-weight:normal;font-size:15px;line-height:22px;color:#333333;f=
               ont-weight:bold" valign="top" width="100%">
               Asunto: '.$row[1].'
              </td>
            </tr>
            <tr>
               <td align="left" style="padding:10px 30px 0 0;font-family:Arial,Helveti=
               ca,sans-serif;font-weight:normal;font-size:13px;line-height:18px;color:#333=
               333" valign="top" width="100% max-width="70%">
                    Mensaje:  '.$row[0].'
               </td>
            </tr>
          
            <tr>
               <td align="left" style="padding:10px 30px 0 0;font-family:Arial,Helveti=
               ca,sans-serif;font-weight:normal;font-size:13px;line-height:18px;color:#333=
               333" valign="top" width="100%">
             
               <a href="" style="text-decoration:=
               none;color:#1155cc" target="_blank"></a>.
               <br><br>

              
               </td>
            </tr>
         </table>
  <br>
   </td>
   </tr>
   
   <tr>
      <td align="left" style="padding:20px 0 40px;font-family:Arial,Helvetica=
      ,sans-serif;font-weight:normal;font-size:13px;line-height:18px;color:#33333=
      3;border-collapse:collapse;border-bottom:1px solid #dcdcdc" valign="top" 
      width="100%">
      Has enviado un mensaje a:         <br>
      <strong>'.$row[2].'</strong>
      </td>
   </tr>
   <tr>
      <td width="100%">
         <table align="left" border="0" cellpadding="0" cellspacing="0" widt
            h="380">
            <tr>
               <td align="left" style="padding:20px 30px 0 0;font-family:Arial,Helveti=
               ca,sans-serif;font-weight:normal;font-size:13px;line-height:18px;color:#333=
               333" valign="top" width="100%">
               ¿Necesitas más ayuda? Nuestro equipo de asistencia puede resolver tus dudas para ponerte en marcha rápidamente.  <a 
               style="text-decoration:none;color:#1155cc" target="_blank">Ponte en contacto con nosotros</a> por teléfono o por correo electrónico, o bien visita el <a style="text-decoration:=
               none;color:#1155cc" target="_blank">Centro de ayuda </a>.que lo puedes encontrar abajo de esta pagina </td>
            </tr>
         </table>
      </td>
   </tr>
   </table>';
     }

                 ?>
   </td>
   </tr>
   <tr>
      <td style="font-family:Arial,Helvetica,sans-serif;font-weight:normal;font=
      -size:10px;line-height:14px;color:#666666;padding:20px 0 0" width="100%">
      <span class="forApple">©<?php echo date('Y');?> - Todos los derechos reservados </span>
      <br><br>
      No envies informacion de tus tarjetas o cuentas bancarias para proteger tu identidad gracias por estar en nuestro sitio web      </td>
   </tr>
   </table>
   </div>
   </td>
   </tr>
   </table>
			</div>	
		</div>	
	</div><!--/.col-->		
</div>
</div>



</body>
</html>