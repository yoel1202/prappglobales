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
                     data:{key:'searchcomments',dato:txt},  
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
  
              
                $('#idedit').val($row.find(".id").text());
                $('#commentsedit').val($row.find(".comments").text());
             cargarcombo("key","keyedit");
              cargarcombo("key2","key2edit");
    
 $('#ed').attr( "data-id8" ,$row.find(".id").text());
 
    });
   $(document).on('click', '#ed', function(){  
        
         
    $.ajax({  
                   url:"mantenimiento.php",  
                method:"POST",  
                data:{key: 'editcomments', id: $('#idedit').val(),  comments: $('#commentsedit').val(),
                 key1: $('#keyedit').val(),
                key2: $('#key2edit').val(),id2:$(this).attr("data-id8")},    
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
                data:{key: 'deletecomments', id: $(this).attr("data-id7")},    
                success:function(data) 
                {  
                  
                     $('#ale').html('<div  class="alert alert-warning">'+data+'</div>');
                    
                    cargaradmi();
                }  
           })  

  
    

    });
    $(document).on('click', '#btn_add', function(){ 
              cargarcombo("key","keyin");
              cargarcombo("key2","key2in");

              
         $('#aler').html('');
      });

     $(document).on('click', '#inser', function(){  
   
             
    $.ajax({  

                   url:"mantenimiento.php",  
                method:"POST",  
                data:{key: 'insertcomments', id: $('#idin').val(), comment: $('#commentsin').val(),
                 key1: $('#keyin').val(),
                key2: $('#key2in').val()},    
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
        data: {key: 'loadcomment'}, 
                success:function(data){  
                     $('.table-responsive').html(data);  
                }  
           });  
      }

      function cargarcombo(combo,name){

$.ajax({
    type: 'POST',
    url: 'mantenimiento.php',
    data: {key: ''+combo+''}
        
  }).done(function (data ) {

    $('#'+name+'').html(data).fadeIn();
  
  }).fail(function (jqXHR, textStatus, errorThrown){
    
  })

}