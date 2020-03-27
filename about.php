<?php include_once('header.php'); ?>
<style>
    #tofix {
        max-width: 30%;
        margin-right: 6%;
    }

    @media (max-width: 991px) and (min-width: 767px) {
        #tofix {
            max-width: 37%;
        }
    }

    @media (max-width: 767px) {
        #tofix, #tofox {
            max-width: 100%;
        }

        .HomeSection .row {
            padding-left: 15px;
            padding-right: 15px;
        }
    }
</style>
<body class="body1_about">

<div class="container-fluid">

    <!-- Start Header -->
    <!-- NAVBAR-->
    <?php include_once('nav.php'); ?>


    <!-- end Header -->

    <!--start HomeSection-->
    <div class="HomeSection">
        <div>
            <div class="row" style="margin:0;">
                <div class="col-md-4 text-left" id="tofix">
                    <div class="slideshow-container">
                        <div class="mySlides fade">

                            <h1 class="h1_about">Business Partners
                            </h1>
                            <p class="textleft">Ecollectionz is managed and monitored by Collect SAL, member of the
                                Credit Libanais SAL Group. Collect SAL is a collection company that provides efficient
                                door to door premium collection services throughout Lebanon.
                            </p>
                        </div>
                        <div class="mySlides fade">

                            <h1 class="h1_about">Our aims

                            </h1>
                            <p class="textleft">Our aim is to provide our customers with the most efficient and
                                developed collection services putting their comfort and happiness first. Also, to keep
                                companies and agencies in touch with their clients providing both ends with necessary
                                information.

                            </p>
                        </div>

                        <div class="mySlides  fade" id="blogCarousel">
                            <h1  class="h1_about">Who We Are
                            </h1>
                            <p class="textleft">We are the first Lebanese online platform to offer high quality online
                                premium collection services, creating by that a 24/7 link between companies and agencies
                                and their customers built on mutual trust and transparency. Our priority is to help in
                                making our customers' lives easier as they have less things to worry about from now on.
                            </p>


                        </div>

                        <br>
                        <!-- The dots/circles -->
                        <div class="dots">
                            <span class="dot" style="display: inline-block!important;" data-target="#blogCarousel"
                                  onclick="currentSlide(1)"></span>
                            <span class="dot" style="display: inline-block!important;" data-target="#blogCarousel"
                                  onclick="currentSlide(2)"></span>
                            <span class="dot" style="display: inline-block!important;" data-target="#blogCarousel"
                                  onclick="currentSlide(3)"></span>

                        </div>
                    </div>

                </div>
                <div class="col-md-6 to">


                    <span class="dot" data-target="#blogCarousel" onclick="plusDivs(1)"></span>
                    <span class="dot" data-target="#blogCarousel" onclick="plusDivs(2)"></span>

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
    currentSlide(3);
    $(function () {
        var counter = 1,
            int = setInterval(function () {
                if (counter === 2) {
                    currentSlide(2);
                    counter++;
                }
                else if (counter === 3) {
                    counter++;
                    currentSlide(3);
                    counter = 1;
                }
                else {
                    counter++;
                    currentSlide(1);
                }
            }, 10000);
    });
</script>
</body>
</html>