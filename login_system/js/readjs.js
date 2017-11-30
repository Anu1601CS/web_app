
    
    $(document).ready(function(){
              
           var count=6;

	  	  $("#lm").click(function(){

	  	  	     count=count+3;

                 $("#pp").load("readload.php",{
                    'commentnewcount':count,
                    'user':'<?php echo $username?>'
                    
                });
    	   });
               
	  });



 
    
    $(document).ready(function(){
              
           var count=3;
           

	  	  $("#co_lm").click(function(){

	  	  	     count=count+3;

                 $("#co").load("cload.php",{
                    'count':count,
                    'user':'<?php echo $username?>',
                    'post':'<?php echo $post?>'
                    
                    
                });
    	   });
               
	  });



	       $(document).ready(function(){

        $(".com_btn").click(function(){
             
             
           
            var text=$("#text").val();        
            var id=<?php echo $post ?>;
           
            
          $.post("includes/commit.inc.php",
           { 

             text:text,
             id:id,
             
             
           },

          function(data,status){

                if(status=="success")
                {
                     window.location.href="read?post=<?php echo$post ?>&&id=<?php echo $username?>&&<?php echo md5($username);?>"; 
                }
                     
               });
                   
            });
        });  

