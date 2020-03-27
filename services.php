<?php include_once('header.php'); ?>
   <style>
   .HomeSection .col-md-6.to {
    margin-left: -11%;
   }
   .prev {
    left: 16%;
  }  
  .next {
    right: 16%;
  }
  @media (max-width: 991px)
       {
      .HomeSection {
       padding-top: 66px;
      }
      .HomeSection .col-md-6.to{
            margin-left: 0;
      }
      .prev {
         left: 0px;
        }
        .next {
        right: 0px;
        }
      }
      @media (min-width: 992px) and (max-width: 1024px){
        .prev {
         left: 8%;
        }
        .next {
        right: 8%;
        }
      }
   </style>
    <body class="body1">
        
        <div class="container-fluid">

          <!-- Start Header -->
            <?php include_once('nav.php'); ?>
  

      <!-- end Header --> 

          <!--start HomeSection-->
          <div class="HomeSection">
            <div>
                    <div class="row" style="margin:0;">
<div class="col-md-4 text-left" id="tofix">
        <div class="slideshow-container" >
            <div class="mySlides fade">
                <h1  class="h1_about" style="text-transform: uppercase">Premiums and Due Dates
                </h1>
                <p  class="textleft">
                    Check your insurance policies online and have access to detailed information regarding your profile
                    and insurance status. Also, keep track of your premiums schedule. Receive a notification
                    48 hours prior of your due dates and an instant receipt after payments.

                </p>

            </div>
        <div class="mySlides fade">
                <h1 class="h1_about">PAYMENT SERVICES</h1>
                <p  class="textleft">
                    Efficient and simple online collection services, available 24 hours, to pay your premium with the click of a button.
                </p>
             
            </div>

              <br>      <!-- The dots/circles -->
    <div class="dots">
        <span class="dot" style="display: inline-block!important;" data-target="#blogCarousel"  onclick="currentSlide(1)"></span>
        <span class="dot" style="display: inline-block!important;"  data-target="#blogCarousel"  onclick="currentSlide(2)"></span>
       
    </div>
      </div>

</div>
<div class="col-md-6 to" >

        <div class="slideshow-container ImageS text-center" id="blogCarousel1" >
                <div class="mySlides1  fade">
                          <p style="letter-spacing: 4px; font-weight: bolder; margin-bottom: 6%;">PAYMENT SERVICE</p>
                          <img class="img_service1" src="img/as13.png" alt="">
                      </div>
                      <div class="mySlides1 fade">
                        <p  style="letter-spacing: 4px; font-weight: bolder;">PREMUIMS AND DUE DATE</p>
                        <img class="img_service2" src="img/as14.png" alt="" >
                      </div><br>
            <span class="dot" data-target="#blogCarousel"  onclick="plusDivs(-1)"></span>
            <span class="dot" data-target="#blogCarousel"  onclick="plusDivs(1)"></span>

                    </div>

</div>

            </div></div></div>           
          <!--end HomeSection-->
            <!--start -->
            <?php include_once 'footer.php';?>
            <!--end footer-->

 </div>
    
       <script src="js/jquery-3.2.1.min.js"></script>
       <script src="js/popper.min.js"></script>
       <script src="js/bootstrap.min.js"></script>
       <script src="js/main.js"></script>
       <script src="js/wow.min.js"></script>
       <script src='https://kit.fontawesome.com/a076d05399.js'></script>

       <script>
            var slideIndex = 1;
            showSlides(slideIndex);
            
            function plusSlides(n) {
              showSlides(slideIndex += n);

            }
            
            function currentSlide(n) {
                if(n==1){
                   // alert('1');
                    plusDivs(1);
                }
                else {
                    plusDivs(1);
                }
              showSlides(slideIndex = n);
             // plusDivs(1);
            }
            
            function showSlides(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("dot");
              if (n > slides.length) {slideIndex = 1}    
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";  
              }
              for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
            }
            </script>
            <script>
                var slideIndex = 1;
                showDivs(slideIndex);
                
                function plusDivs(n) {
                  showDivs(slideIndex += n);
                }
                
                function showDivs(n) {
                  var i;
                  var x = document.getElementsByClassName("mySlides1");
                  if (n > x.length) {slideIndex = 1}
                  if (n < 1) {slideIndex = x.length}
                  for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                  }
                  x[slideIndex-1].style.display = "block";  
                }
                </script>
        <script>
            currentSlide(1);
            $(function () {
                var counter = 1,
                    int = setInterval(function(){
                        if (counter === 2){
                            currentSlide(2);
                            plusDivs(-1);
                            counter = 1;
                        } else {
                            counter++;
                            currentSlide(1);
                            plusDivs(1);
                        }
                    }, 10000);
            });
        </script>
    </body>
    </html>  