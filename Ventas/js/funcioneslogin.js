
 function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}
$(function () {
    /* BOOTSNIPP FULLSCREEN FIX */
  
    
     $('#term').change(function() {
        if($(this).is(":checked")) {
           
            $('#myModal').modal('show');
        }
         })
   
   
  
   
    
     
});

 function login(){

$.ajax({
    type: 'POST',
    url: 'database.php',
    data: {key: 'login', user: $('#username').val(), pass: $('#password').val()}

  }).done(function ( login ) {
   
    if(login.trim()==("se ha iniciado correctamente")){
         $('#alert').html('<div class="alert alert-info"><strong>Sesion</strong> Se ha iniciado correctamente</div>'); 
                             sleep(1000).then(() => {

      window.location="index.php";

});

    }else{
       $('#alert').html('<div class="alert alert-info"><strong>Sesion</strong>Su Nombre de usuario o contraseña son incorrectos</div>'); 
             sleep(1000).then(() => {

      window.location="login.php";
});
    }
    
       

  
  }).fail(function (jqXHR, textStatus, errorThrown){
    $("#msjbox").html(" Error al insertar!");
  })

 }

 function registrar()
 {

  if ($('#user').val()!="" && $('#email').val() !="" && $('#nom').val()!="" && $('#tel').val()!="" && $('#pass').val()!="" && $('#ced').val() != "" && $('#pass').val()!="" && $('#confirmpass').val()!="") 
  {
      if ($('#pass').val()==$('#confirmpass').val()) {
    if ($('#term').is(":checked")) {
          alert('Todo correcto');
          $.ajax({
            type: 'POST',
            url: 'database.php',

            data: {key: 'registrar', user: $('#user').val(), email: $('#email').val(), nom: $('#nom').val(), tel: $('#tel').val(), pass: $('#pass').val(), ced: $('#ced').val()}

          }).done(function ( data ) {
           
           
            if(data.trim()==("se ha iniciado correctamente")){
           alert(data+"paso");

            }else{
             alert(data+"hi");
            }
            
               

          
          }).fail(function (jqXHR, textStatus, errorThrown){
            $("#msjbox").html(" Error al insertar!");
          })        
    }
    else
    {
      alert('Debes aceptar nuestros Términos y condiciones!');
    }
  }else{
    alert("Las contraseñas no conciden, Por favor reintente!");
  }
  }
  else
  {
    alert('No puedes dejar espacios en blanco!');
  }

 
}
function caracteresCorreoValido(email, div){
    console.log(email);
    //var email = $(email).val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) == false){
        $(div).hide().removeClass('hide').slideDown('fast');

        return false;
    }else{
        $(div).hide().addClass('hide').slideDown('slow');
//        $(div).html('');
        return true;
    }
}

