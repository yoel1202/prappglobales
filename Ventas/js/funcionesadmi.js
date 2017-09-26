$( document ).ready(function() {
  cargaradmi();

 $('.search-panel .dropdown-menu').find('a').click(function(e) {
    e.preventDefault();
    var param = $(this).attr("href").replace("#","");
    var concept = $(this).text();
    $('.search-panel span#search_concept').text(concept);
    $('.input-group #search_param').val(param);
  });

       $('#buscar').keyup(function(){ 

           var txt = $(this).val();  
           if(txt != '')  
           {  
                $.ajax({  
                     url:"mantenimiento.php",  
                     method:"post",  
                     data:{key:'buscaradmi',dato:txt},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          $('.table-responsive').html(data);  
                  
                     }  
                });  

               
           }  
           else  
           {  
                 
                  cargaradmi();        
           }


      });





  $(document).on('click', '#btn_edit', function(){  
    $('#alert').html('');
    var $row = $(this).closest("tr");    // Find the row
  
              
                $('#idadmi').val($row.find(".id").text());
                $('#name').val($row.find(".nombre").text());
                $('#page').val($row.find(".page").text());
                $('#pass').val($row.find(".pass").text());
    
 $('#ed').attr( "data-id8" ,$row.find(".id").text());
 
    });
   $(document).on('click', '#ed', function(){  
        
         
    $.ajax({  
                   url:"mantenimiento.php",  
                method:"POST",  
                data:{key: 'editaradmi', id: $('#idadmi').val(),  name: $('#name').val(),
                 page: $('#page').val(),
                pass: $('#pass').val(),id2:$(this).attr("data-id8")},    
                success:function(data) 
                {  
                     $('#alert').html('<div  class="alert alert-warning">'+data+'</div>');
                    
                    cargaradmi();
                }  
           })  

 
    });
    $(document).on('click', '#btn_delete', function(){  
 
    var $row = $(this).closest("tr");    // Find the row
  
              $('#ale').html('');
            $('#clean').attr( "data-id7" ,$row.find(".id").text());
               

 
    });

      $(document).on('click', '#clean', function(){  
             
               $.ajax({  

                   url:"mantenimiento.php",  
                method:"POST",  
                data:{key: 'cleanadmi', id: $(this).attr("data-id7")},    
                success:function(data) 
                {  
                  
                     $('#ale').html('<div  class="alert alert-warning">'+data+'</div>');
                    
                    cargaradmi();
                }  
           })  

  
    

    });
    $(document).on('click', '#btn_add', function(){ 

         $('#aler').html('')
      });

     $(document).on('click', '#inser', function(){  
    
             
    $.ajax({  

                   url:"mantenimiento.php",  
                method:"POST",  
                data:{key: 'insertadmi', id: $('#id').val(),  name: $('#nombre').val(),
                 page: $('#pagina').val(),
                pass: $('#password').val()},    
                success:function(data) 
                {  
                 
                     $('#aler').html('<div  class="alert alert-warning">'+data+'</div>');
                    
                    cargaradmi();
                }  
           })  

    });
     });

  


  function cargaradmi()  
      {  
           $.ajax({  
                url:"mantenimiento.php",  
                method:"POST", 
        data: {key: 'cargaradmi'}, 
                success:function(data){  
                     $('.table-responsive').html(data);  
                }  
           });  
      }