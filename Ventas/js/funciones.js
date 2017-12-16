 $( document ).ready(function() {
$('#find').click(function() {
  search();
  });

$('#borrar').click(function() {
 deleteemail("items");
  });
$('#borrar2').click(function() {
 deleteemail('leer');
  });

$('#borrar3').click(function() {
 deletemsg("items");
  });
   
$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});

$('.leer').click(function() {
    if ($('input').is(':checked')) { 
 
   
     } else {
      window.location="read.php?mensaje="+ $(this).attr("data-id")+"";
    }
  });



$('.items').click(function() {
  if ($('input').is(':checked')) { 

   
  } else {
     window.location="sendread.php?mensaje="+ $(this).attr("data-id")+"";
    
  }
  
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

 function  deleteemail(item){

  $('.'+item+' input:checked').each(function() {
$.ajax({
    type: 'POST',
    url: 'database.php',
    data: {key: 'deleteemail',data:$(this).attr("data-id")}

  }).done(function ( data ) {

      if (data.trim()=="se ha  efectuado correctamente") {
        if (item=="items") {
          window.location="send.php";
        }else{

           window.location="inbox.php";
        }
              
      }
  }).fail(function (jqXHR, textStatus, errorThrown){
   
  })
});
}
 function  deletemsg(item){

  $('.'+item+' input:checked').each(function() {
$.ajax({
    type: 'POST',
    url: 'database.php',
    data: {key: 'deletemsg',data:$(this).attr("data-id")}

  }).done(function ( data ) {

      if (data.trim()=="se ha  efectuado correctamente") {
       
          window.location="delete.php";
       

          
      
              
      }
  }).fail(function (jqXHR, textStatus, errorThrown){
   
  })
});
}

 function openNav() {
    document.getElementById("mySidenav").style.width = "70%";
    // document.getElementById("flipkart-navbar").style.width = "50%";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.body.style.backgroundColor = "rgba(0,0,0,0)";
}

(function($) {
    /**
   * attaches a character counter to each textarea element in the jQuery object
   * usage: $("#myTextArea").charCounter(max, settings);
   */
  
  $.fn.charCounter = function (max, settings) {
    max = max || 100;
    settings = $.extend({
      container: "<span></span>",
      classname: "charcounter",
      format: "(%1 characters remaining)",
      pulse: true,
      delay: 0
    }, settings);
    var p, timeout;
    
    function count(el, container) {
      el = $(el);
      if (el.val().length > max) {
          el.val(el.val().substring(0, max));
          if (settings.pulse && !p) {
            pulse(container, true);
          };
      };
      if (settings.delay > 0) {
        if (timeout) {
          window.clearTimeout(timeout);
        }
        timeout = window.setTimeout(function () {
          container.html(settings.format.replace(/%1/, (max - el.val().length)));
        }, settings.delay);
      } else {
        container.html(settings.format.replace(/%1/, (max - el.val().length)));
      }
    };
    
    function pulse(el, again) {
      if (p) {
        window.clearTimeout(p);
        p = null;
      };
      el.animate({ opacity: 0.1 }, 100, function () {
        $(this).animate({ opacity: 1.0 }, 100);
      });
      if (again) {
        p = window.setTimeout(function () { pulse(el) }, 200);
      };
    };
    
    return this.each(function () {
      var container;
      if (!settings.container.match(/^<.+>$/)) {
        // use existing element to hold counter message
        container = $(settings.container);
      } else {
        // append element to hold counter message (clean up old element first)
        $(this).next("." + settings.classname).remove();
        container = $(settings.container)
                .insertAfter(this)
                .addClass(settings.classname);
      }
      $(this)
        .unbind(".charCounter")
        .bind("keydown.charCounter", function () { count(this, container); })
        .bind("keypress.charCounter", function () { count(this, container); })
        .bind("keyup.charCounter", function () { count(this, container); })
        .bind("focus.charCounter", function () { count(this, container); })
        .bind("mouseover.charCounter", function () { count(this, container); })
        .bind("mouseout.charCounter", function () { count(this, container); })
        .bind("paste.charCounter", function () { 
          var me = this;
          setTimeout(function () { count(me, container); }, 10);
        });
      if (this.addEventListener) {
        this.addEventListener('input', function () { count(this, container); }, false);
      };
      count(this, container);
    });
  };

})(jQuery);

$(function() {
    $(".counted").charCounter(320,{container: "#counter"});
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
    $('#inicio').append(" <li class='upper-links' id=close ><a href=# class='fa fa-sign-out'></a></li>");
      $('#mySidenav').append(" <li class='lower-links' id=close ><a href=# class='fa fa-sign-out'></a></li>");
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
   $('#wordsearch').append('<div class="row" <div class="col-md-11 col-sm-6 margin50"> <span class="thumbnail"> <a href="buy.php?product='+obj[i][4]+'"><img src="'+obj[i][3]+'" alt="..."></a><h4>'+obj[i][0]+'</h4><p>'+obj[i][2]+' </p> <hr class="line"><div class="row">  <div class="col-md-6 col-sm-6">  <p class="price">₡'+obj[i][1]+'</p>  </div>  <div class="col-md-6 col-sm-6">  </div> </div> </span> </div> </div>');
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

function agregarcarrito(id_producto,cantidad,idsesion,idvendedor){
  if (idsesion == idvendedor) {
    alert('Esta acción es imposible! Este producto es distribuido por usted mismo!');
  }
  else
  {
    if (cantidad == 0) {cantidad = $('#cantidadp').val();}

    $.ajax({
      type: 'POST',
      url: 'database.php',
      data: {key: 'producto', producto: id_producto, quantity: cantidad}

    }).done(function ( data ) {
     $('#cantidadcarrito').html(data);
    
    }).fail(function (jqXHR, textStatus, errorThrown){
     
    })
  }

  
}
function guardardireccion(user){


  $.ajax({
    type: 'POST',
    url: 'database.php',
    data: {key: 'insertshipping', firstname: $('#firstname').val(), lastname:  $('#lastname').val(),address1:$('#AddressLine1').val(),address2:$('#AddressLine2').val()
    ,city:$('#city').val(),state:$('#state').val(),district:$('#district').val(),zip:$('#zip').val(),country:$('#country').val(),users:user}

  }).done(function ( data ) {
 
  $('#mensaje').html(data);
  
  }).fail(function (jqXHR, textStatus, errorThrown){
   
  })

  
}

function ponerfotoproducto(id){
  $('#picture').attr('src',id);
}

function eliminardelcarrito(id_producto)
{
  $.ajax({
    type: 'POST',
    url: 'database.php',
    data: {key: 'quitarproducto', producto: id_producto}

  }).done(function ( data ) {
  location.href ="checkout.php";
  }).fail(function (jqXHR, textStatus, errorThrown){
   
  })
}
