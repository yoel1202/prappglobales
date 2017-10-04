 $( document ).ready(function() {
$('#find').click(function() {
  search();
  });

$('#hidepage').hide();
  // find(word);
   editprofile();

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

  var profile;
var tipo;
var user ="administrador";
function editprofile(){
    tipo= $('#tip').text();
    
 


   profile= $('#nam').text();
   if(profile){
         $('#nom').html(profile);
         $('#nom2').html(profile);
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
function search(){
  var busqueda = $('#search').val();
 window.location="find.php?word="+busqueda+"";

}
function find(word){
 
   
  $.ajax({
    type: 'POST',
    url: 'database.php',
    data: {key: 'busqueda',words:word}

  }).done(function ( data ) {
    var obj = JSON.parse(data);
   
  
   $('#wordsearch').append('<div class="row" <div class="col-md-11 col-sm-6 margin50"> <span class="thumbnail"> <a href="buy.php"><img src="img/productos/s4.jpg" alt="..."></a><h4>'+obj[i]+'</h4> <div class="ratings"> <span class="glyphicon glyphicon-star"></span>  <span class="glyphicon glyphicon-star"></span>   <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star-empty"></span> </div><p>'+obj[2]+' </p> <hr class="line"><div class="row">  <div class="col-md-6 col-sm-6">  <p class="price">₡'+obj[1]+'</p>  </div>  <div class="col-md-6 col-sm-6">  </div> </div> </span> </div> </div>');
    
     
      
      

  
  }).fail(function (jqXHR, textStatus, errorThrown){
   
  })


}

function agregarcarrito(id_producto){
 
 
  $.ajax({
    type: 'POST',
    url: 'database.php',
    data: {key: 'producto', producto: id_producto}

  }).done(function ( data ) {
   $('#cantidadcarrito').html(data);
  
  }).fail(function (jqXHR, textStatus, errorThrown){
   
  })

  
}