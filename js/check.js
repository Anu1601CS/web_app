
window.alert("hii");





  $(document).on('scroll',function()
  {

    if($(document).scrollTop()>=$('#intro').offset().top && $(document).scrollTop()<$('#work').offset().top)
    { //assuming the about section has an id called about (#about)
        $('#ihome').css("display","");
        $('#active-home').css({"color":"green","transition":"0.5s"});
    }
    else

    {
        $('#ihome').css("display","none");
        $('#active-home').css("color","");
    }


     if($(document).scrollTop()>=$('#work').offset().top && $(document).scrollTop()<$('#github').offset().top)
    { //assuming the about section has an id called about (#about)
        $('#iwork').css("display","");
        $('#active-work').css({"color":"green","transition":"0.5s"});
    }
    else

    {
        $('#iwork').css("display","none");
        $('#active-work').css("color","");
    }

    if($(document).scrollTop()>=$('#github').offset().top && $(document).scrollTop()<$('#about').offset().top)
    { //assuming the about section has an id called about (#about)
        $('#igithub').css("display","");
        $('#active-github').css({"color":"green","transition":"0.5s"});
    }
    else

    {
        $('#igithub').css("display","none");
        $('#active-github').css("color","");
    }

 if($(document).scrollTop()>=$('#about').offset().top && $(document).scrollTop()<$('#other').offset().top)
    { //assuming the about section has an id called about (#about)
        $('#iabout').css("display","");
        $('#active-about').css({"color":"green","transition":"0.5s"});
    }
    else

    {
        $('#iabout').css("display","none");
        $('#active-about').css("color","");
    }

    if($(document).scrollTop()>=$('#other').offset().top && $(document).scrollTop()<$('#footer').offset().top)
    { //assuming the about section has an id called about (#about)
        $('#iother').css("display","");
        $('#active-other').css({"color":"green","transition":"0.5s"});
    }
    else

    {
        $('#iother').css("display","none");
        $('#active-other').css("color","");
    }

 if($(document).scrollTop()>=$('#footer').offset().top)
    { //assuming the about section has an id called about (#about)
        $('#icontact').css("display","");
        $('#active-contact').css({"color":"green","transition":"0.5s"});
    }
    else
    {
      $('#icontact').css("display","none");
      $('#active-contact').css("color","");
    }



 });



 $(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
 });
