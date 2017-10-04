$( document ).ready(function() {
cargarcategorias();
});
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
   alert("hola");
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