 $( document ).ready(function() {
$('#find').click(function() {
  search();
  });


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
 window.location="find.php?word="+busqueda+"?result=10";

}
function find(word){
 
 
  $.ajax({
    type: 'POST',
    url: 'database.php',
    data: {key: 'cle',words:word}

  }).done(function ( data ) {

  

  
  }).fail(function (jqXHR, textStatus, errorThrown){
   
  })
}