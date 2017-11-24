
/*--------------------------------------------------------------*/

                   /*******JAVASCRIPT AND JQUERY*****/

/*------------------------------------------------------------*/




/******SECTION ICON CHANGING SCRIPT********/


  $(document).on('scroll',function()
  {

    if($(document).scrollTop()>=$('#intro').offset().top && $(document).scrollTop()<$('#learn-more').offset().top)
    { 
        $('#ihome').css("display","");
        $('#active-home').css({"color":"skyblue","transition":"0.5s"});
    }
    else

    {
        $('#ihome').css("display","none");
        $('#active-home').css("color","");
    }


     if($(document).scrollTop()>=$('#learn-more').offset().top && $(document).scrollTop()<$('#lmb-work').offset().top)
    {
        $('#iwork').css("display","");
        $('#active-work').css({"color":"skyblue","transition":"0.5s"});
    }
    else

    {
        $('#iwork').css("display","none");
        $('#active-work').css("color","");
    }

    if($(document).scrollTop()>=$('#lmb-work').offset().top && $(document).scrollTop()<$('#lmb-github').offset().top)
    { 
        $('#igithub').css("display","");
        $('#active-github').css({"color":"skyblue","transition":"0.5s"});
    }
    else

    {
        $('#igithub').css("display","none");
        $('#active-github').css("color","");
    }

 if($(document).scrollTop()>=$('#lmb-github').offset().top && $(document).scrollTop()<$('#lmb-blog').offset().top)
    { 
        $('#iblog').css("display","");
        $('#active-about').css({"color":"skyblue","transition":"0.5s"});
    }
    else

    {
        $('#iblog').css("display","none");
        $('#active-about').css("color","");
    }

    if($(document).scrollTop()>=$('#lmb-blog').offset().top && $(document).scrollTop()<$('#lmb-other').offset().top)
    { 
        $('#iother').css("display","");
        $('#active-other').css({"color":"skyblue","transition":"0.5s"});
    }
    else

    {
        $('#iother').css("display","none");
        $('#active-other').css("color","");
    }

 if($(document).scrollTop()>=$('#lmb-other').offset().top)
    { 
        $('#icontact').css("display","");
        $('#active-contact').css({"color":"skyblue","transition":"0.5s"});
    }
    else
    {
      $('#icontact').css("display","none");
      $('#active-contact').css("color","");
    }



 });


/*------------------------------------------------*/



/***************SMOOTH SCROLL***********/

 $(document).ready(function(){
  
  $("a").on('click', function(event) {

    
    if (this.hash !== "") {
 
      event.preventDefault();


      var hash = this.hash;

      
   
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
   
        window.location.hash = hash;
      });
    }
  });
 });


/*---------------------------------------------------------*/



/***************BACKGROUND COLOR OF HEADER ON SCROLL*******/


 window.onscroll = function() {scrollFunction()};

 function scrollFunction() {
    if (document.body.scrollTop > 700 || document.documentElement.scrollTop > 700) {
        document.getElementById("header").style.background = "rgba(53, 56, 73, 0.9)";
        document.getElementById('user-name').style.display="block";
    } else {
        document.getElementById("header").style.background = "";
        document.getElementById('user-name').style.display="";
    }
 } 


 function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
 }


/*---------------------------------------------------------------*/

/****************************preloader*************************/

/*
document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'interactive') {
       document.getElementById('main').style.display="none";
  } else if (state == 'complete') {
      setTimeout(function(){
         document.getElementById('interactive');
         document.getElementById('background').style.display="none";
         document.getElementById('main').style.display="block";
      },0);
  }
}

*/



 /*----------------------------------------------------------------*/ 

 
 /*************close function of hidden menu*********************/


 function closefun(){
 document.getElementById('hiddenmenu').style.display="none";
  }


  /*--------------------------------------------------------------*/


  
function snack(){

  var x=document.getElementById("snackbar");
  x.className="show";
  setTimeout(function(){

    x.className=x.className.replace("show","");
  },3000);
  
}



/*********************icon name************************************/

   $(document).ready(function(){
          $('#ihome').on({
                mouseenter:function(){
               $('.iconh').css({"display":"block"});
               },
                mouseleave:function(){
                  $('.iconh').css({"display":"none"});
                }

              });

     $('#iwork').on({
                mouseenter:function(){
               $('.iconw').css({"display":"block"});
               },
                mouseleave:function(){
                  $('.iconw').css({"display":"none"});
                }

              });

     $('#igithub').on({
                mouseenter:function(){
               $('.icong').css({"display":"block"});
               },
                mouseleave:function(){
                  $('.icong').css({"display":"none"});
                }

              });
     $('#iblog').on({
                mouseenter:function(){
               $('.iconb').css({"display":"block"});
               },
                mouseleave:function(){
                  $('.iconb').css({"display":"none"});
                }

              });
     $('#icontact').on({
                mouseenter:function(){
               $('.iconc').css({"display":"block"});
               },
                mouseleave:function(){
                  $('.iconc').css({"display":"none"});
                }

              });
     $('#iother').on({
                mouseenter:function(){
               $('.icono').css({"display":"block"});
               },
                mouseleave:function(){
                  $('.icono').css({"display":"none"});
                }

              });
     
      

    });


   /*-------------------------------------------------------------*/

  /****************scroll to top in blog**********************************/


$('#submit').click(function()
{
    $.ajax({
        url: php/action.php,
        type:'POST',
        data:
        {   
            user_name:name,
            email: email,
            message: message
        },
        success: function(msg)
        {
            alert('Email Sent');
        }               
    });
});


$(document).ready(function(){
        
        $("#line").delay("1000").fadeIn(1000);
        $("#line1").delay("1300").fadeIn(1000);
        $("#line2").delay("1600").fadeIn(1000);
        $("#line3").delay("1900").fadeIn(1000);
        $("#line4").delay("2200").fadeIn(1000);
        $("#social").delay("2500").fadeIn(1000);
         $("#learn-more").delay("2800").fadeIn(1000);
    
});
