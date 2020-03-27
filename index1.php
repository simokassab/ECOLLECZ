<?php include_once('header.php'); ?>
   
    <body>
        
        <div class="container-fluid">

          <!-- Start Header -->
<!-- NAVBAR-->

<?php include_once('nav.php'); ?>

          <!-- end Header --> 

          <!--start HomeSection-->
          <div class="HomeSection">
            <div>
                    <div class="row" style="margin:0;">
<div class="col-md-3 text-left" id="tofix">
        <div class="mySlides" id="blogCarousel" >
                <h1 style="font-size: 2.3rem; letter-spacing: 5px!important; font-weight: 900;">ECOLLECTIONZ</h1>
                <p style="font-size: 1rem; color: #D6DAE0;">Ecollectionz is the first and only Lebanese premium payment platform that allows financial institutions,
                    commercial companies, distribution companies, brokers, insurance companies, and agencies, etc. to stay in touch with their clients with the click of a button, providing them with the most recent and efficient online services.
                    .</p>
                        <
                        <button class="btn btn-primary" style="margin-top: 50px;width: 150px; padding: 3%;">
                        <a style="text-decoration: none;color: #1f325a;font-weight: bold; letter-spacing: 2px;" href="contact-us.php" style="color: #1f325a;font-weight: bold"> LEARN MORE </a></button>

      </div>
      </div>


<div class="col-md-6" id="tofox">

        <div class="slideshow-container  text-center" id="blogCarousel" style="margin-top: 0">
                <div class="mySlides11 mySlides1 fade" >

              </div>
                      <div class="mySlides1 fade">
                            <button class="btn btn-primary" style="padding: 5%; width: 65%; ">
                              <a href="<?php echo APP_URL ?>register" > REGISTER <span>IT’S COMPLETELY FREE</span></a></button>

                      </div>
                       <!-- The dots/circles -->
        <!--div style="text-align:left;    margin-top: 62px;">
        <span class="dot" data-target="#blogCarousel"  onclick="currentSlide(1)"></span>
        <span class="dot" data-target="#blogCarousel"  onclick="currentSlide(2)"></span>

      </div-->

                    </div>

</div>

            </div></div></div>
          <!--end HomeSection-->
          
           <!--start -->
           <div class="footer">
            <div>
                    <div class="row" style="margin:0;">
                  
                  
                  
                  <div class="col-md-12 text-left" >
                        <ul id="riul">
                                <li><a href="#" class="fa fa-instagram"></a></li>   
                                <li><a href="#" class="fa fa-facebook"></a></li>
                        </ul>


                 </div>
          </div>
        </div>
        </div>
           <!--end footer-->

 </div>
    
       <script src="js/jquery-3.2.1.min.js"></script>
       <script src="js/popper.min.js"></script>
       <script src="js/bootstrap.min.js"></script>
       <script src="js/main.js"></script>
       <script src="js/wow.min.js"></script>
       <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script>
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
                    }, 4000);
            });
        </script>
        <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
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
                var x = document.getElementsByClassName("mySlides11");
                if (n > x.length) {slideIndex = 1}
                if (n < 1) {slideIndex = x.length}
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                x[slideIndex-1].style.display = "block";
            }
        </script>
    </body>
    </html>  