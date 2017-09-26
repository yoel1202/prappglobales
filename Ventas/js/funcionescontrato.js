

  $( document ).ready(function() {
  cargar();

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
                     data:{key:'buscardeal',dato:txt},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          $('.table-responsive').html(data);  
                  
                     }  
                });  

               
           }  
           else  
           {  
                 
                  cargar();        
           }


      });





  $(document).on('click', '#btn_edit', function(){  
    $('#alert').html('');
    var $row = $(this).closest("tr");    // Find the row
  
              
                $('#id').val($row.find(".id").text());
                $('#page').val($row.find(".page").text());
                $('#agree').val($row.find(".agree").text());
                $('#help').val($row.find(".help").text());
              
      $('#ed').attr( "data-id8" ,$row.find(".id").text());
 
    });
   $(document).on('click', '#ed', function(){  
       
         
    $.ajax({  
                   url:"mantenimiento.php",  
                method:"POST",  
                data:{key: 'editarcontrato', id: $('#id').val(),  page: $('#page').val(),
                 agree: $('#agree').val(),
                help: $('#help').val(),id2:$(this).attr("data-id8")},    
                success:function(data) 
                {  
                     $('#alert').html('<div  class="alert alert-warning">'+data+'</div>');
                    
                    cargar();
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
                data:{key: 'cleandeal', id: $(this).attr("data-id7")},    
                success:function(data) 
                {  
                  
                     $('#ale').html('<div  class="alert alert-warning">'+data+'</div>');
                    
                    cargar();
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
                data:{key: 'insertdeal', id: $('#idin').val(),  page: $('#pagein').val(),
                 agree: $('#agreein').val(),
                help: $('#helpin').val()},    
                success:function(data) 
                {  
                 
                     $('#aler').html('<div  class="alert alert-warning">'+data+'</div>');
                    
                    cargar();
                }  
           })  

    });
     });

  


  function cargar()  
      {  
           $.ajax({  
                url:"mantenimiento.php",  
                method:"POST", 
        data: {key: 'cargarcontrato'}, 
                success:function(data){  
                     $('.table-responsive').html(data);  
                }  
           });  
      } 

