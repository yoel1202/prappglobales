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
 window.location="find.php?word="+busqueda+"&page=1";

}
function find(word){
 
   
  $.ajax({
    type: 'POST',
    url: 'database.php',
    data: {key: 'busqueda',words:word}

  }).done(function ( data ) {

if (data==null) {
 $('#wordsearch').append('<div class="alert alert-info"><strong>Sesion</strong> No se ha encontrado ningun resultado</div>');
}else{
    var obj = JSON.parse(data);

 var page = Math.trunc(obj.length/10) +1;
  var final=9*allpages;
  var valor=allpages-1;
  var inicio =9 *valor;
  
     for (var i=0; i<obj.length; i++) { 
    
   if( i>=inicio && i<=final){
   $('#wordsearch').append('<div class="row" <div class="col-md-11 col-sm-6 margin50"> <span class="thumbnail"> <a href="buy.php"><img src="'+obj[i][3]+'" alt="..."></a><h4>'+obj[i][0]+'</h4> <div class="ratings"> <span class="glyphicon glyphicon-star"></span>  <span class="glyphicon glyphicon-star"></span>   <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star-empty"></span> </div><p>'+obj[i][2]+' </p> <hr class="line"><div class="row">  <div class="col-md-6 col-sm-6">  <p class="price">₡'+obj[i][1]+'</p>  </div>  <div class="col-md-6 col-sm-6">  </div> </div> </span> </div> </div>');
    }
     }
      
      if (page>1) {
        $('#hidepage').show();

      $('#paginations').append('    <li> <a href="#" aria-label="Previous">  <span aria-hidden="true">«</span> </a></li>');
    for (var i = 1; i < page+1; i++) {
      
 $('#paginations').append('<li><a href="'+'http://localhost:8080/Ventas/prappglobales/Ventas/find.php?word='+word+''+"&page="+i+""+'">'+i+'</a></li>');

    }
    $('#paginations').append(' <li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span></a></li>');

  }
}
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