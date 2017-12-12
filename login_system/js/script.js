
/**Login**/


	      $(document).ready(function(){
       
        $(".log_in_btn").click(function(){

        	window.location.href="login";
            });

                    
        });

/**Logout**/

	      $(document).ready(function(){

       
        $(".log_btn").click(function(){
                    
          $.post("includes/logout.inc.php",
           {
             submit: "lo"
           },
          function(data,status){

        	      if(status=="success")
        	      {
                     window.location.href="index"; 
                  }
                     
              });
                   
            });
        });
          

