var count=0;
var encontrado=false;
$( document ).ready(function() {

  cargarcategorias();
   editprofile();
$('#left').click(function() {
 count--;

 if(count<0){
  count=0;

 }
 $( "#lin li a img " ).each(function( index ) {
 
    
    if (index==count) {
    $("#image").attr("src", $(this).attr("src"));
   
}
});


});

$('#right').click(function() {
  
	count++;
if(count>$( "#lin li" ).size()-1){
   count=$( "#lin li" ).size()-1;
  }
	
 $( "#lin li a img " ).each(function( index ) {
 
   
    if (index==count ) {
    $("#image").attr("src", $(this).attr("src"));
   
}
});

});

$('#close').click(function() {
$.ajax({
    type: 'POST',
    url: 'database.php',
    data: {key: 'close'}

  }).done(function ( data ) {

  
   window.location="index.php";
  
  }).fail(function (jqXHR, textStatus, errorThrown){
   
  })

});

});

function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}


 function login(){

$.ajax({
    type: 'POST',
    url: 'database.php',
    data: {key: 'login', user: $('#username').val(), pass: $('#password').val()}

  }).done(function ( login ) {
    alert(login);
   
    if(login=="se ha iniciado correctamente"){
         $('#alert').html('<div class="alert alert-info"><strong>Sesion</strong> Se ha iniciado correctamente</div>'); 
                             sleep(2000).then(() => {

      window.location="index.php";

});

    }else{
       $('#alert').html('<div class="alert alert-info"><strong>Sesion</strong>Su Nombre de usuario o contraseña son incorrectos</div>'); 
             sleep(2000).then(() => {

      window.location="login.php";
});
    }
    
       

  
  }).fail(function (jqXHR, textStatus, errorThrown){
    $("#msjbox").html(" Error al insertar!");
  })

 }
var profile;
var tipo;
var user ="administrador";
function editprofile(){
    tipo= $('#tip').text();
    
 


   profile= $('#nam').text();
   if(profile){
         $('#nom').html(profile);
    $('#nam').html('');
    $('#log').closest('li').remove(); 
    $('#inicio').append(" <li id=close ><a href=# class='fa fa-sign-out' ></a></li>");
   }else{
    $('#nom').html("");

    
   }

    
    if(tipo=="administrador"){
         
   $("#nom").attr("href", "profileadmi.php");
    }
     $('#nam').remove();
      $('#tip').remove();
}

function cargarcategorias(){

  $.ajax({
    type: 'POST',
    url: 'database.php',
    data: {key: 'cargarcategorias'},
     dataType: 'json'

  }).done(function ( data ) {


     for (var i=0; i<data.length; i++) { 
     var id = data[i];

      $('#categoria').append('<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">  <div  data-id1="'+id[0]+'" class="product-chooser-item " > <img src="img/categorias/'+id[1]+'.png" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="Mobile and Desktop">  <div  class="col-xs-8 col-sm-8 col-md-12 col-lg-12"> <span class="title">'+id[1]+'</span>  <span class="description">'+id[2]+'</span> <input type="radio" name="product" value="mobile_desktop" checked="checked"> </div> <div class="clear"></div> </div> </div>');
             script();
      }
      

  }).fail(function (jqXHR, textStatus, errorThrown){
   
  })

}
function cargarsubcategorias(categoria){
  $.ajax({
    type: 'POST',
    url: 'database.php',
    data: {key: 'cargarsubcategorias',id:categoria},
     dataType: 'json'

  }).done(function ( data ) {

   alert(data);
    for (var i=0; i<data.length; i++) { 
     var id = data[i];
         
         $('#subcategoria').append('<option data-id2='+id[0]+'>'+id[1]+'</option>').fadeIn();
     }
      

  }).fail(function (jqXHR, textStatus, errorThrown){
   
  })

}
function script(){

   
  $('div.product-chooser').not('.disabled').find('div.product-chooser-item').on('click', function(){
    $(this).parent().parent().find('div.product-chooser-item').removeClass('selected');
    $(this).addClass('selected');
    $(this).find('input[type="radio"]').prop("checked", true);
    var id = $(this).data("id1"); 

     window.location="insertproduct.php?categoria="+id+"";
  });

}

    