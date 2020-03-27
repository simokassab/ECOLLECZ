<?php include_once('header.php'); ?>

<body>

<div class="container-fluid">

    <!-- Start Header -->
    <!-- NAVBAR-->

    <?php include_once('nav.php'); ?>

    <div class="HomeSection">
        <div>
            <div class="row" style="margin:0;">
                <div class="col-md-4 text-left" id="tofix">
                    <div class="slideshow-container">
                        <div class="mySlides  fade" id="blogCarousel">
                            <h1 class="h1_about">PAY YOUR PREMIUM ONLINE</h1>
                            <p class="textleft">Ecollectionz is the first and only Lebanese premium payment platform
                                that allows financial institutions,
                                commercial companies, distribution companies, brokers, insurance companies, and
                                agencies, etc. to stay in touch with their clients with the click of a button, providing
                                them with the most recent and efficient online services.
                            </p>
                        </div>
                        <div class="mySlides fade">
                            <h1 class="h1_about">HOW WE WORK
                            </h1>
                            <p class="textleft">Because your time is your money, Ecollectionz provides you with online
                                collection services
                                to pay your premiums at the comfort of your home or from work with the simple click of a
                                button.
                                No matter where you are or what time it is, you won't have to worry about the payment of
                                your premiums anymore as we will take care of it for you.
                            </p>
                        </div>
                        <div class="mySlides fade">
                            <h1 class="h1_about">WHY CHOOSE US
                            </h1>
                            <p class="textleft">If you have troubles managing your schedule, if you are struggling with
                                long
                                working hours and can't make it to your bank on time for the payment of your premiums,
                                Ecollectionz is the solution to your problems.
                            </p>
                        </div>
                        <br>
                        <!-- The dots/circles -->
                    </div>
                    <div style="" class="dots">
                            <span class="dot" style="display: inline-block!important;" data-target="#blogCarousel"
                                  onclick="currentSlide(1)"></span>
                        <span class="dot" style="display: inline-block!important;" data-target="#blogCarousel"
                              onclick="currentSlide(2)"></span>
                        <span class="dot" style="display: inline-block!important;" data-target="#blogCarousel"
                              onclick="currentSlide(3)"></span>
                    </div>
                </div>
                <div class="col-md-6 to">
                    <div class="slideshow-container  text-center" id="blogCarousel1" style="margin-top: 7%;">
                        <div class="mySlides1 mySlides11 ImageS  fade">
                        </div>
                        <div class="mySlides1 fade ImageS1">
                            <button class="btn btn-primary">
                                <a href="<?php echo APP_URL ?>register"> REGISTER <span>IT’S COMPLETELY FREE</span></a>
                            </button>
                        </div>
                        <br>
                        <span class="dot" data-target="#blogCarousel" onclick="plusDivs(1)"></span>
                        <span class="dot" data-target="#blogCarousel" onclick="plusDivs(2)"></span>
                        <span class="dot" data-target="#blogCarousel" onclick="plusDivs(1)"></span>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--end HomeSection-->

    <!--start -->
    <?php include_once 'footer.php'; ?>
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
        showSlides(slideIndex = n);

    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
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
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex - 1].style.display = "block";
    }
</script>
<script>

    var counter = 1;
    $(function () {
        currentSlide(1);
        plusDivs(2);
        int = setInterval(function () {
            // alert(counter);

            if (counter == 2) {
                currentSlide(2);
                plusDivs(2);
                counter++;
            } else if (counter == 3) {
                counter++;
                currentSlide(3);
                plusDivs(1);
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