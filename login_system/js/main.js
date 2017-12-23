$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

       
      
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
                     window.location.href="index.php"; 
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



var close = document.getElementsByClassName("al");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}


 $(document).ready(function(){
       
        $(".al").click(function(){

           
            window.open('update', '_blank');
              
              });
            
  });

   /*commit*/

    
  
       $(document).ready(function(){

        $(".com_btn").click(function(){
             
             
           
            var text=$("#text").val();        
            var id=<?php echo $post ?>;
            
            
          $.post("includes/commit.inc.php",
           { 

             text:text,
             id:id 
             
           },

          function(data,status){

                if(status=="success")
                {
                     window.location.href="read?post=<?php echo$post ?>&&id=<?php echo $username?>&&<?php echo md5($username);?>"; 
                }
                     
               });
                   
            });
        });  

         
