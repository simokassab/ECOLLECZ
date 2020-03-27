<?php include_once('header.php'); ?>

<style>
    .mySlides1 span {
        color: #fad500;
        padding-bottom: 15px;
        text-align: center;
    }

    .mySlides1 p {
        font-weight: bold;
        color: #1d3357;
        margin-bottom: 0;
    }

    .prev, .next {

        top: 37%;

    }

    .prev {
        left: 6%;
    }

    .next {
        right: 16%;
    }

    .HomeSection .col-md-6.to {
        margin-left: -12%;
    }

    .contact {
        margin-left: 14%;
        margin-right: 25%;
        margin-bottom: 50px;
    }

    @media (max-width: 991px) {
        .HomeSection {
            padding-top: 66px;
        }

        .HomeSection .col-md-6.to {
            margin-left: 0;
        }

        .prev {
            left: 0px;
        }

        .next {
            right: 0px;
        }
    }

</style>
<body class="body2">

<div class="container-fluid">

    <!-- Start Header -->
    <?php include_once('nav.php'); ?>


    <!-- end Header -->

    <!--start HomeSection-->
    <div class="HomeSection">
        <div>
            <div class="row" style="margin:0;">
                <div class="col-md-4 text-left" id="tofix">
                    <div class="slideshow-container" id="blogCarousel">
                        <div class="mySlides fade">
                            <h1 class="h1_about">LET’S GET IN TOUCH</h1>
                            <p class="textleft">
                                Do you have any questions or concerns? Please let
                                us know how we can help you. Our team is available
                                24/7 to provide you with the most satisfying services
                                and will reach back as soon as possible.
                            </p>
                            <p class="textleft" style="margin-top: 1%; ">
                                <span style="font-size: 1.7rem;">Get in touch?</span> <br/><br/>

                                Phone:&nbsp; +961&nbsp;70&nbsp;298&nbsp;949<br/>

                                Email:&nbsp;<a href="mailto:info@ecollectionz.com<">info@ecollectionz.com</a><br/>

                                Address: Montelibano, New Jdeideh Street, 3rd Stage.</p>

                        </div>

                    </div>
                </div>
                <div class="col-md-6 cont">

                    <div class="slideshow-container  text-center" id="blogCarousel1" style="margin-top: -1%;">
                        <div class="contact text-left">
                            <div class="mySlides1 fade">
                                <p style="letter-spacing: 5px; font-weight: bolder;">CONTACT US</p>
                                <span>IT’S COMPLETELY FREE</span>

                                <label>NAME</label>
                                <input class="form-control input-lg" type="text" name="name"
                                       placeholder="Your Full Name" required>
                                <label>EMAIL</label>
                                <input class="form-control input-lg" type="email" name="email"
                                       placeholder="Email Address " required>
                                <label>LOCATION</label>
                                <input class="form-control input-lg" type="text" name="location" placeholder=" beirut"
                                       required>
                                <label>WRITE MESSAGE</label>
                                <textarea class="form-control" type="textarea" id="message" placeholder="hello..."
                                          maxlength="110" rows="5"></textarea>

                                <button type="button" id="submit" name="submit" class="btn" style="margin-left: 0;">
                                    SUBMIT
                                </button>

                            </div>

                            <div class="mySlides1 fade">
                                <p style="letter-spacing: 5px; font-weight: bolder;" id="location">GET LOCATION</p> <br><br>
                                <iframe aria-hidden="true" frameborder="0"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1656.0155500026333!2d35.55415811379833!3d33.88885287277303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDUzJzIyLjIiTiAzNcKwMzMnMTcuMyJF!5e0!3m2!1sen!2slb!4v1558953557993!5m2!1sen!2slb"></iframe>
                            </div>
                        </div>
                        <div class="dotcontact">
                            <a class="dot" style="display: inline-block!important;" data-target="#blogCarousel1"
                               onclick="plusDivs(-1)"></a>
                            <a class="dot" style="display: inline-block!important;" data-target="#blogCarousel1"
                               onclick="plusDivs(1)"></a>
                        </div>

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
    $(function () {
        var counter = 1,
            int = setInterval(function () {
                if (counter === 2) {
                    currentSlide(2);
                    counter = 1;
                } else {
                    counter++;
                    currentSlide(1);
                }
            }, 10000);
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
</body>
</html>