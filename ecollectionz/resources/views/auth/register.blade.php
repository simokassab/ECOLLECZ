<!DOCTYPE html>
<html>

@include('inc.header')
<style>

    .sw-btn-prev {
        background-color: darkgrey !important;
        height: 30% !important;
        width: 90% !important;

    }

    .sw-btn-next {
        background-color: darkgrey !important;
        height: 30% !important;
        width: 90% !important;

    }

    .btn-toolbar {
        height: 90px !important;
    }

    .btn-secondary {
        height: 40px !important;
    }

    .sw-theme-default > ul.step-anchor > li > a {
        color: #4285F4 !important;
    }

    .sw-theme-default > ul.step-anchor > li.active > a {
        color: #FAD500 !important;
    }

    @media (max-width: 991px) {
        .contact label {
            color: #1F325A !important;
        }

        .mySlides1 p {
            margin-top: 15%;
            margin-left: 10% !important;
        }

        .form_re {
            width: 100% !important;
        }


    }

    @media (max-width: 768px) {
        #tofix {
            margin-left: 3%;
        }

        #phone {
            width: 103% !important;
            max-width: 103% !important;
            min-width: 103% !important;
            display: inline-block;
        }

    }

    .contact span {
        margin-bottom: 3px !important;
        margin-left: -28% !important;
    }

</style>
<body class="body">
{!! csrf_field() !!}

<div class="container-fluid">

@include('inc.nav')


<!-- end Header -->

    <!--start HomeSection-->
    <div class="HomeSection">

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
                </div>
            </div>
            <div class="col-md-6 to" style="margin-top: -5%!important;">

                <div class="">

                    <div class="mySlides1">
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    <h5><i class="icon fa fa-ban"></i> Alert!</h5>
                                    {!! $error !!}
                                </div>
                            @endforeach
                        @endif

                        <div class="contact">
                            <div>
                                <p>CLIENT REGISTER</p>
                                <span>IT’S COMPLETELY FREE</span>
                                <form action="#" id="form" class="form_re" method="post" accept-charset="utf-8">

                                    <!-- SmartWizard html -->
                                    <div id="smartwizard">
                                        <ul>
                                            <li><a href="#step-1">Step 1</a></li>
                                            <li><a href="#step-2">Step 2</a></li>
                                        </ul>
                                        <div>
                                            <div id="step-1">
                                                <div id="form-step-0">
                                                    <label>NAME</label>
                                                    <input id="name" type="text" class="form-control inputai"
                                                           name="name" value="{{ old('name') }}" required autofocus
                                                           placeholder="Full Name">
                                                    <label>EMAIL</label>
                                                    <input id="email" type="email" class="form-control inputai"
                                                           name="email" value="{{ old('email') }}" required autofocus
                                                           placeholder="Email Addresss">
                                                    <label>PASSWORD</label>
                                                    <input id="password" type="password" class="form-control inputai"
                                                           name="password" required placeholder="Password">
                                                    <label>CONFIRM PASSWORD</label>
                                                    <input id="password-confirm" type="password"
                                                           class="form-control inputai" name="password_confirmation"
                                                           required placeholder="Retype Password">
                                                    <span class="member"> <a class="reg" href="./login">I’m already a member</a></span>
                                                </div>
                                            </div>
                                            <div id="step-2">
                                                <div id="form-step-1">
                                                    <label>PHONE</label><br/>
                                                    <input id="phone" type="tel" class="form-control inputai"
                                                           name="phone" required><br/><br/>
                                                    <label>CITY</label>
                                                    <input id="city" type="text" class="form-control inputai"
                                                           name="city" required autofocus placeholder="City">
                                                    <label>ADDRESS</label>
                                                    <input id="address" type="text" class="form-control inputai"
                                                           name="address" required autofocus placeholder="Address">
                                                    <input type="checkbox" required> I agree to the <a
                                                            href="#">terms</a><br>
                                                    <button type="submitf" id="submit" name="submit"
                                                            class="btn inputai">CREATE ACCOUNT
                                                    </button>
                                                    <span class="member"> <a class="reg" href="./login">I’m already a member</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <span class="alert alert-danger" style="display: none; color: #1D3357!important;" id="errorname"></span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- The dots/circles -->
        </div>
    </div>
@include('inc.footer')
<!--end HomeSection-->

</div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
<!-- Include SmartWizard JavaScript source -->
<script src="{{asset('build/js/intlTelInput.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#smartwizard').smartWizard();

        // Smart Wizard
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'default',
            transitionEffect: 'fade',
            anchorSettings: {
                markDoneStep: true, // add done css
                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
            }
        });
        $("#smartwizard").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
            var elmForm = $("#form-step-" + stepNumber);
            if ((stepNumber === 0) ) {

                if (($('#name').val() == '') || ($('#email').val() == '') || ($('#password').val() == '') || ($('#password-confirm').val() == '')) {
                    $('#errorname').css('display', 'block');
                    $('#errorname').html('Please Fill All the info');
                    return false;
                }
                else if (($('#password').val() != '') && ($('#password-confirm').val() != '') &&( $('#password-confirm').val() != $('#password').val()  ) ) {
                    $('#errorname').css('display', 'block');
                    $('#errorname').html('Not Same Password !');
                    return false;
                }
                else {
                    $('#errorname').css('display', 'none');
                    return true;
                }
            }
            return true;
        });
        $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection) {
            if (stepNumber == 0) {
                $('.sw-btn-prev').css('display', 'none');
                $('.sw-btn-next').css('display', 'block');
                // $('.sw-btn-prev').css('display', 'none');
                //$('.btn-n').removeClass('disabled');
            }
            if (stepNumber == 1) {
                $('.sw-btn-next').css('display', 'none');
                $('.sw-btn-prev').css('display', 'block');
                // $('.sw-btn-prev').css('display', 'none');
                //$('.btn-n').removeClass('disabled');
            }
        });
    });
</script>
<script src="{{asset('build/js/intlTelInput.js') }}"></script>
<script>
    $(document).ready(function () {
        var input = document.querySelector("#phone");
        var iti = window.intlTelInput(input, {
            excludeCountries: ["il"],
            initialCountry: "lb",
            preferredCountries: ['lb', 'us'],
            separateDialCode: true,
            utilsScript: "https://ecollectionz.com/ecollectionz/public/build/js/utils.js",
        });

        $('#form').on('submit', function (event) {
            event.preventDefault();
            var codes = $('.selected-flag').attr('title');
            var s = codes.split(":");
            var code = s[1].substring(2);
            var fdata = new FormData(this);
            var p = $('#phone').val();
            var phone = 0;
            if (p.charAt(0) == '0') {
                p = p.substring(1);
                phone = code + '' + p;
            } else {

                phone = code + '' + p;
            }

            fdata.append("phone", phone);
            $.ajax({
                url: './register',
                method: 'POST',
                data: fdata,
                contentType: false,
                processData: false,
                success: function (data) {
                    window.location.href = './verify?phone=' + code + '' + p;
                },
                error: function (xhr, status, error) {
                    if (xhr.responseText.indexOf("The phone has already been taken") >= 0) {
                        alert('Phone already exist');
                    } else if (xhr.responseText.indexOf("The email has already been taken") >= 0) {
                        alert('Phone already exist');
                    } else {
                        alert('An Error occured, please try again of contact the support');
                    }
                }
            })
        });
    });
</script>
</body>
</html>