
$(document).ready(function(){
    $('#image').click(function() {
  upload_img();
});
	$('#save').click(function() {
insertproduct();
});
	
  $('#opcion').click(function() {
 $("#ocultar").removeClass("hidden");
});
    $('#opcion2').click(function() {
 $("#ocultar").addClass("hidden");
});

  });


function insertproduct(){


	$.ajax({
    type: 'POST',
    url: 'database.php',
    data: {key: 'insertproduct',subcategoria:$('#subcategoria').find(':selected').data("id2"),vendedor:$('#vendedor').text(),cantidad:$('#quantity').val(),
    tama:$('#size').val(),price:$('#price').val(),shipping:$('#shipping').val(),weight:$('#weight').val(),width:$('#width').val(),height:$('#height').val(),
    title:$('#title').val(),warranty:$('#warranty').val(),description:$('#description').val(),estado:'activo',color:$('#color').val()
}

  }).done(function ( data ) {

  if (data.trim()=="ok") {
 $('#alert').html('<div class="alert alert-info"><strong>Insertar:</strong> Se ha insertado correctamente el producto solicitado espere unos 5 segundos sera redirecionado si desea subir algun otro producto</div>'); 

  sleep(5000).then(() => {
location.reload();
      
    });
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

  
    for (var i=0; i<data.length; i++) { 
     var id = data[i];
         
         $('#subcategoria').append('<option data-id2='+id[0]+'>'+id[1]+'</option>').fadeIn();
     }
      

  }).fail(function (jqXHR, textStatus, errorThrown){
   
  })

}

 function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

function upload_img(){
var formData = new FormData($("#formUpload")[0]);
  $.ajax({
  type: 'POST',
  url: 'subida.php',
  data: formData,
  contentType: false,
  processData: false
  });

}