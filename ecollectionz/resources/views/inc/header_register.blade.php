<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main_register.css')}}">
    <link rel="stylesheet" href="{{asset('build/css/intlTelInput.css') }}">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('js/main.js') }}"></script>
    <script src="{{asset('build/js/intlTelInput.js') }}"></script>
    <script>
        $(document).ready(function() {
            var input = document.querySelector("#phone");
            var iti = window.intlTelInput(input, {
                 allowDropdown: true,
                // autoHideDialCode: false,
                // autoPlaceholder: "off",
                // dropdownContainer: document.body,0
                excludeCountries: ["il"],
                //  formatOnDisplay: true,
                // geoIpLookup: function(callback) {
                //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                //     var countryCode = (resp && resp.country) ? resp.country : "";
                //     callback(countryCode);
                //   });
                // },
                // hiddenInput: "full_number",
                 initialCountry: "lb",
                // localizedCountries: { 'de': 'Deutschland' },
                // nationalMode: false,
                // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                //  placeholderNumberType: "MOBILE",
                 preferredCountries: ['lb', 'us'],
                // separateDialCode: true,
                utilsScript: "https://ecollectionz.com/ecollectionz/public/build/js/utils.js",
            });

            $('#form').on('submit', function(event){
                event.preventDefault();
                var codes = $('.selected-flag').attr('title');
                var s = codes.split(":");
                var code= s[1].substring(2);
                var fdata = new FormData(this);
                var p =$('#phone').val();
                var phone=0;
                if(p.charAt(0)=='0'){
                    p=p.substring(1);
                    phone = code+''+p;
                }
                else {

                    phone = code+''+p;
                }

                fdata.append("phone",phone);
                $.ajax({
                    url: './register',
                    method: 'POST',
                    data: fdata,
                    contentType: false,
                    processData: false,
                    success: function(data){
                        window.location.href='./verify?phone='+code+''+p;
                    },
                    error: function(xhr, status, error) {

                        if (xhr.responseText.indexOf("The phone has already been taken") >= 0){
                            alert('Phone already exist');
                        }
                        else  if (xhr.responseText.indexOf("The email has already been taken") >= 0){
                            alert('Phone already exist');
                        }
                        else {
                            alert('An Error occured, please try again of contact the support');
                        }
                    }
                })
            });
        });
    </script>
</head>