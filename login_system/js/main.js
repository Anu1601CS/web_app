

       
      
 /*logout*/   

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
          
  
                   
 /*login*/ 

      $(document).ready(function(){
       
        $(".log_in_btn").click(function(){

        	window.location.href="login";
            });

                    
        });
          
 /*login form*/

    $(document).ready(function(){

        $(".log_in_sub_btn").click(function(){
            
            var username=$("#username").val();
            var password=$("#password").val();        

          $.post("includes/login.inc.php",
           {
             username:username,
             password:password 
           },

          function(data,status){

                if(status=="success")
                {
                    /* window.location.href="index"; */
                  }
                     
              });
                   
            });
        });
 
 /*sign up*/
/*
    $(document).ready(function(){

        $(".sign_btn").click(function(){
            
            var username=$("#s_username").val();
            var name=$("#s_name").val();        
            var email=$("#s_email").val();
            var password=$("#s_password").val();
            var confirm_password=$("#s_c_password").val();
            var security=$("#s_security").val();
            var submit="submit";

          $.post("includes/signup.inc.php",
           {
             username:username,
             password:password,
             email:email,
             password:password,
             confirm_password:confirm_password,
             security:security,
             submit:submit

           },

          function(data,status){

                if(status=="success")
                {
                    /* window.location.href="index"; 
                  }
                     
              });
                   
            });
        });
*/


