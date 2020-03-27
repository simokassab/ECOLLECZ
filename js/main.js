 $(document).ready(function(){   

var scrollButton = $("#scrol-top");
    
    $(window).scroll(function(){
       if ($(this).scrollTop() >= 700 )
           {
               scrollButton.show();
           }
        else
            {
                scrollButton.hide();
            }
        
    });
      
     // عند الضغط على الزر
         scrollButton.click(function(){
             
             $("html,body").animate({scrollTop : 0}, 600);
         });    
     
    var $star_rating = $('.star-rating .fa');

var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();
$(document).ready(function() {

}); 
     
 });

$(document).ready(function(){

    //Add
    $(".quantity-add").click(function(e){
        //Vars
        var count = 1;
        var newcount = 0;
        
        //Wert holen + Rechnen
        var elemID = $(this).parent().attr("id");
        var countField = $("#"+elemID+'inp');
        var count = $("#"+elemID+'inp').val();
        var newcount = parseInt(count) + 1;
        
        //Neuen Wert setzen
        $("#"+elemID+'inp').val(newcount);
    });

    //Remove
    $(".quantity-remove").click(function(e){
        //Vars
        var count = 1;
        var newcount = 0;
        
        //Wert holen + Rechnen
        var elemID = $(this).parent().attr("id");
        var countField = $("#"+elemID+'inp');
        var count = $("#"+elemID+'inp').val();
        var newcount = parseInt(count) - 1;
        
        //Neuen Wert setzen
        $("#"+elemID+'inp').val(newcount);
        
    });


    //Delete
    $(".quantity-delete").click(function(e){
        //Vars
        var count = 1;
        var newcount = 0;
        
        //Wert holen + Rechnen
        var elemID = $(this).parent().attr("id");
        var countField = $("#"+elemID+'inp');
        var count = $("#"+elemID+'inp').val();
        var newcount = parseInt(count) - 1;
        
        //Neuen Wert setzen
        //$('.item').html('');
        
       var row = $( ".row" );
        $(event.target).closest(row).html('');
    });

    
});




$(document).ready(function(){
            

      $("#signup").click(function(){
                
             $("#signform").hide();
               $("#regestform").show(); 
              
          
            })
    
          $("#sign").click(function(){
                
             $("#regestform").hide();
               $("#signform").show(); 
              
          
            })
      
        
           
      
  
      
        }); 