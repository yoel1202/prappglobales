
 function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}


 function login(){

$.ajax({
    type: 'POST',
    url: 'database.php',
    data: {key: 'login', user: $('#username').val(), pass: $('#password').val()}

  }).done(function ( login ) {
   
   
    if(login.trim()==("se ha iniciado correctamente")){
         $('#alert').html('<div class="alert alert-info"><strong>Sesion</strong> Se ha iniciado correctamente</div>'); 
                             sleep(3000).then(() => {

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

