<?php
             
  session_start();

                 if(isset($_SESSION['nombre'])and isset($_SESSION['tipo']) ){
             	$nombre=$_SESSION['nombre'];
             	$tipo=$_SESSION['tipo'];
          echo ("<div id=tip style='display: none;'>".$tipo."</div>");
       echo ("<div id=nam style='display: none;'> ".$nombre." </div>");
       
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
	  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="js/funciones.js"></script>
      <script src="js/jquery.js"></script>
 <link href="css/style.css" rel="stylesheet">
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

                                <input type="text" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
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
<div class="row inbox">
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-body inbox-menu">						
				<a href="#page-inbox-compose.html" class="btn btn-danger btn-block">New Email</a>
				<ul>
					<li>
						<a href="#page-inbox.html"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger">4</span></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-star"></i> Stared</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-rocket"></i> Sent</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-trash-o"></i> Trash</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-bookmark"></i> Important<span class="label label-info">5</span></a>
					</li>
					<li class="title">
						Labels
					</li>
					<li>
						<a href="#">Home <span class="label label-danger"></span></a>
					</li>
					<li>
						<a href="#">Job <span class="label label-info"></span></a>
					</li>
					<li>
						<a href="#">Clients <span class="label label-success"></span></a>
					</li>
					<li>
						<a href="#">News <span class="label label-warning"></span></a>
					</li>
				</ul>
			</div>	
		</div>
		
		<div class="panel panel-default">
			<div class="panel-body contacts">
				<a href="#" class="btn btn-success btn-block"> + Contact</a>
				<ul>
					<li><span class="label label-danger"></span> Adam Alister</li>
					<li><span class="label label-default"></span> Alphonse Ivo</li>
					<li><span class="label label-success"></span> Anton Phunihel</li>
					<li><span class="label label-success"></span> Ajith Hristijan</li>
					<li><span class="label label-warning"></span> Bao Gaspar</li>
					<li><span class="label label-default"></span> Bernhard Shelah</li>
					<li><span class="label label-success"></span> Bünyamin Kasper</li>
					<li><span class="label label-danger"></span> Carlito Roffe</li>
					<li><span class="label label-danger"></span> Chidubem Gottlob</li>
					<li><span class="label label-warning"></span> Dederick Mihail</li>
					<li><span class="label label-success"></span> Felice Arseniy</li>
					<li><span class="label label-default"></span> Grahame Miodrag</li>
					<li><span class="label label-default"></span> Hristofor Sergio</li>
					<li><span class="label label-danger"></span> Scottie Maximilian</li>
					<li><span class="label label-danger"></span> Sullivan Robert</li>
					<li><span class="label label-danger"></span> Thancmar Theophanes</li>
					<li><span class="label label-warning"></span> Tullio Luka</li>
					<li><span class="label label-success"></span> Walerian Khwaja</li>
				</ul>
			
			</div>
		
		</div>			
		
	</div><!--/.col-->
	
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-body message">
				<p class="text-center">New Message</p>
				<form class="form-horizontal" role="form">
					<div class="form-group">
				    	<label for="to" class="col-sm-1 control-label">To:</label>
				    	<div class="col-sm-11">
                              <input type="email" class="form-control select2-offscreen" id="to" placeholder="Type email" tabindex="-1">
				    	</div>
				  	</div>
					<div class="form-group">
				    	<label for="cc" class="col-sm-1 control-label">CC:</label>
				    	<div class="col-sm-11">
                              <input type="email" class="form-control select2-offscreen" id="cc" placeholder="Type email" tabindex="-1">
				    	</div>
				  	</div>
					<div class="form-group">
				    	<label for="bcc" class="col-sm-1 control-label">BCC:</label>
				    	<div class="col-sm-11">
                              <input type="email" class="form-control select2-offscreen" id="bcc" placeholder="Type email" tabindex="-1">
				    	</div>
				  	</div>
				  
				</form>
				
				<div class="col-sm-11 col-sm-offset-1">
					
					<div class="btn-toolbar" role="toolbar">
						
						<div class="btn-group">
						  	<button class="btn btn-default"><span class="fa fa-bold"></span></button>
						  	<button class="btn btn-default"><span class="fa fa-italic"></span></button>
							<button class="btn btn-default"><span class="fa fa-underline"></span></button>
						</div>

						<div class="btn-group">
						  	<button class="btn btn-default"><span class="fa fa-align-left"></span></button>
						  	<button class="btn btn-default"><span class="fa fa-align-right"></span></button>
						  	<button class="btn btn-default"><span class="fa fa-align-center"></span></button>
							<button class="btn btn-default"><span class="fa fa-align-justify"></span></button>
						</div>
						
						<div class="btn-group">
						  	<button class="btn btn-default"><span class="fa fa-indent"></span></button>
						  	<button class="btn btn-default"><span class="fa fa-outdent"></span></button>
						</div>
						
						<div class="btn-group">
						  	<button class="btn btn-default"><span class="fa fa-list-ul"></span></button>
						  	<button class="btn btn-default"><span class="fa fa-list-ol"></span></button>
						</div>
						<button class="btn btn-default"><span class="fa fa-trash-o"></span></button>	
						<button class="btn btn-default"><span class="fa fa-paperclip"></span></button>
						<div class="btn-group">
							<button class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="fa fa-tags"></span> <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><a href="#">add label <span class="label label-danger"> Home</span></a></li>
								<li><a href="#">add label <span class="label label-info">Job</span></a></li>
								<li><a href="#">add label <span class="label label-success">Clients</span></a></li>
								<li><a href="#">add label <span class="label label-warning">News</span></a></li>
							</ul>
						</div>
					</div>
					<br>	
					
					<div class="form-group">
						<textarea class="form-control" id="message" name="body" rows="12" placeholder="Click here to reply"></textarea>
					</div>
					
					<div class="form-group">	
						<button type="submit" class="btn btn-success">Send</button>
						<button type="submit" class="btn btn-default">Draft</button>
						<button type="submit" class="btn btn-danger">Discard</button>
					</div>
				</div>	
			</div>	
		</div>	
	</div><!--/.col-->		
</div>
</div>



</body>
</html>