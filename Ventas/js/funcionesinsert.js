
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
    title:$('#title').val(),warranty:$('#warranty').val(),description:$('#description').val(),estado:'activo',color:$('#color').val(),idproduct:$('#idproducto').text(),descuento:$('#discount').val()
}

  }).done(function ( data ) {
 
  if (data.trim()=="Se ha insertado correctamente") {
    document.all["formimagenes"].submit();  
     alert(data);
 

 
  }else{
    if (data.trim()=="Se actualizado correctamente") {
      document.all["formimagenes"].submit();  
        alert(data);
            }else{
        alert(data);
}

  }

          

  
  }).fail(function (jqXHR, textStatus, errorThrown){
   
  })
}

function cargarsubcategorias(categoria,sub){
  $.ajax({
    type: 'POST',
    url: 'database.php',
    data: {key: 'cargarsubcategorias',id:categoria},
     dataType: 'json'

  }).done(function ( data ) {

  
    for (var i=0; i<data.length; i++) { 
     var id = data[i];
         
         $('#subcategoria').append('<option value='+id[0]+' data-id2='+id[0]+'>'+id[1]+'</option>').fadeIn();
     }
     if(sub!=0){
     $('#subcategoria').val(sub);
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

function cargarimagen(id, archivo)
{
  foto = new Image();
  foto.src = URL.createObjectURL(archivo.files[0]);
  if (id == "pickphoto1") {$("#foto1").attr("src",foto.src);}
  if (id == "pickphoto2") {$("#foto2").attr("src",foto.src);}
  if (id == "pickphoto3") {$("#foto3").attr("src",foto.src);}
  if (id == "pickphoto4") {$("#foto4").attr("src",foto.src);}
}