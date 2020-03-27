<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userId" content="{{Auth::user()->id}}">
    <title> @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/iCheck/all.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/iCheck/flat/yellow.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <style>
        @font-face {
            font-family: Poppins-Regular;
            src: url('{{ asset('fonts/poppins/Poppins-Regular.ttf') }}');
        }

        @font-face {
            font-family: Poppins-Medium;
            src: url('{{ asset('fonts/poppins/Poppins-Medium.ttf') }}');
        }

        @font-face {
            font-family: Poppins-Bold;
            src: url('{{ asset('fonts/poppins/Poppins-Bold.ttf') }}');
        }

        @font-face {
            font-family: Poppins-SemiBold;
            src: url('{{ asset('fonts/poppins/Poppins-SemiBold.ttf') }}');
        }

      body {
        background-image: url('{{ asset('images/logo-trans.png') }}');
          background-size: contain;
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-position: calc(100% - 43%) center;
      }

        .page-link {
            color: #1D3357 !important;
        }
        #policies_table thead tr th {
            color: #1D3357 !important;
        }
        .form-control-sm {
            color: #1D3357 !important;
            font-weight: bolder;
        }
        #policies_table_length label {
            color: #666A6D !important;
            font-weight: bolder;
        }

        .dataTables_length {
            left: 0%;
            text-align: right !important;
        }
        .dataTables_filter input {
            border-radius: 10px 10px 10px 10px;
            background-color: #EBF0F7;
            color: #696969;
            width: 100% !important;
        }

        .dataTables_filter  {
            color: #1D3357 !important;
        }

        .page-item.active .page-link {
            background-color: #1D3357 !important;
            border-color: #1D3357 !important;
        }

        .table {

            background-color: rgba(255, 255, 255, .5) !important;
        }
        .table-responsive {
            padding-top: 2%;
        }


      h1, h2, h3 {
        font-family: Poppins-Bold,  sans-serif;
        font-weight: bolder;
        color: #012f5c;
        font-size: 2rem;
        margin: 1.6em 0 0.8em;
        padding-bottom: 0.4em;
        position: relative;
      }
      .nav >.nav-item {
       /*border-bottom: 1px solid #CBD5DE;*/
       margin-bottom: 4%;
      }
      .nav >.nav-item:hover {
        transition: 0.4s;
        background-color: #D7B40E ;
        color: #012F5C !important;
      }
      .nav >.nav-item > a:hover {
        background-color: #D7B40E;
        color: #012F5C !important;
      }
      
     
      .sidebar-dark-primary .nav-treeview > .nav-item > .nav-link:hover {
        background-color: #D7B40E;
        color: #012F5C !important;
      }
      .badgebox
      {
          opacity: 0;
          color: white;
      }

      .badgebox + .badge
      {
          /* Move the check mark away when unchecked */
          text-indent: -999999px;
          /* Makes the badge's width stay the same checked and unchecked */
        width: 27px;
      }

      .badgebox:focus + .badge
      {
          /* Set something to make the badge looks focused */
          /* This really depends on the application, in my case it was: */
          
          /* Adding a light border */
          box-shadow: inset 0px 0px 5px;
          /* Taking the difference out of the padding */
      }


      .badgebox:checked + .badge
      {
          /* Move the check mark back when checked */
        text-indent: 0;
      }
      .example_e {
        border: none;
        background: #FFC107;
        color: #012F5C !important;
        font-weight: 500;
        padding: 20px;
        text-transform: uppercase;
        border-radius: 6px;
        display: inline-block;
      }
      .example_e:hover {
        color: white !important;
        font-weight: 700 !important;
        letter-spacing: 1px;
        text-decoration: none;
        background: #012F5C;
        -webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
        -moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
        transition: all 0.4s ease 0s;
      }

      .card {
          border-radius: 22px !important;
      }
        .card-header {
            background-color: #012f5c !important;
            border-radius: 20px 20px 0 0  !important;
        }

        .card-title {
            color: white!important;
            font-size: 1.5em !important;
            padding: 0.2% 0 0.2% 0.2% ;
        }

        /* Large devices (desktops, 992px and up) */
        @media (max-width: 992px) {
           h1 {
               font-size: 1rem !important;
           }

            .card-title {
                color: white!important;
                font-size: 0.8em !important;
                padding: 0 0 0 0 ;
            }
        }

        @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
            h1 {
                font-size: 1rem !important;
            }

            .card-title {
                color: white!important;
                font-size: 0.8em !important;
                padding: 0 0 0 0 ;
            }

        }
        .main-header {
            background-color: #fff !important;
            margin-top:1% !important;
            margin-bottom: 1% !important;
           width: 85% !important;
            left: 1% !important;
        }

        .nav-sidebar>.nav-item .nav-icon {
            font-size: 1.4em!important;
        }
        .nav-sidebar .nav-item>.nav-link {
            color: #fff !important;
        }

        .main-header {
            background-color: rgba(255, 255, 255, .6) !important;
        }

        .content-wrapper{

            margin-left: 14.2%;
            width: 85%;
            background-color: rgba(255, 255, 255, .6) !important;
            margin-top: 0.8%;
            min-height: 50px !important;
        }
        .content-wrapper1{
            background-color: rgba(255, 255, 255, .6) !important;
            margin-left: 14.2%;
            width: 85%;
            background-color: #fff;

        }

        @media (max-width: 767px){
            .div1 {
                display: none;
            }
            .div2 {
                width: 100%;
            }
            .content-wrapper {
                margin-left: 8%;
            }
            .main-header{
                margin-left: 7%;
            }
        }


    </style>
</head>
<body class="hold-transition sidebar-mini" style="background-color: #EBF0F7!important;">


<!-- End Modal -->
<div class="wrapper">


  <nav class="main-header navbar" >
      <a class="sidebar-toggle" id="TT" data-widget="pushmenu" href="#">
          <i class="fa fa-bars" style="color: #1D3357; "></i>
      </a>
      <div class="row" style="width: 100%!important; padding:10px 0px 0px 10px!important;">
          <div class="col col-sm-6">

            <h1 style="color: #1D3357; position:relative;   margin: 0!important; padding: 0!important; letter-spacing: 5px;text-transform: uppercase;">DASHBOARD</h1>
              <p style="padding: 0!important; position:relative;  color: #99B0BC;">welcome back, {{ Auth::user()->name }}</p>

          </div>
          <div class="col col-sm-6">
              <form style="width: 70%!important;   margin: 1% 0 0 31% ;">
                  <div class="input-group" >
                      <input style="border-radius: 10px 0 0 10px; background-color: #EBF0F7; color: #696969;" class="form-control border rounded-pill-left border-right-0"
                             type="search" value="Search" id="example-search-input">
                      <span class="input-group-append">
                      <button style="border-radius: 0px 10px 10px 0px; background-color: #EBF0F7; color: #000;"
                              class="btn btn-outline-secondary border rounded-pill-right border-left-0" type="button">
                          <i class="fa fa-search" ></i>
                      </button>
                    </span>
                      <ul class="navbar-nav ml-auto" >
                          <!-- Notifications Dropdown Menu -->
                          <li class="nav-item dropdown" >
                              <a class="nav-link" data-toggle="dropdown" href="#">
                                  <i class="fas fa-bell"  style='color:#D1DAE5 !important; font-size: 1.4em; margin: 0px 0px 0 5px;'></i>
                                  <span class="badge badge-danger navbar-badge"></span>
                              </a>
                              <div  class="dropdown-menu dropdown-menu-lg dropdown-menu-right  notif"  style="width: 500px !important;">

                              </div>
                          </li>
                      </ul>
                  </div>
              </form>

          </div>
      </div>

    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar " style="background-color: #1D3357 !important;" id="sidebar">
    <!-- Brand Logo
      <a href="{{ route('profile') }}"   class="btn btn-warning "  style="color:#012F5C; font-weight: bold;">
          Profile
      </a>-->
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="width: 100%; margin-top: 10%!important; border-bottom: 0px ;">

        <div class="image" style="padding-left: 20%!important; width: 100%!important;">

        <?php 
          $photo = Auth()->user()->photo;
          if($photo==''){
              $photo ='minilogo.png';
          }
        ?>
          <img src="{{asset('images/') }}<?php echo '/'.$photo; ?>" class="img-circle " alt="User Image" style="width: 70%!important;  ">

            <br><br>
            <a href="{{ route('profile') }}" id="profile"    style="margin-left: 8%!important;color:#FCD304; font-weight: bold; letter-spacing: 5px;">
                PROFILE
            </a>
            <hr style="border-top: 2px solid #FCD304; width: 60%!important; margin-left: 5%!important;">
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav  nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li  class='nav-item' >
            <a href="{{ URL::route('home') }}" class='nav-link' >
              <i class="nav-icon fas fa-tachometer-alt" ></i>
              <p style="margin-left: 5%!important;">Dashboard</p>
            </a>
          </li>
          <li  class='nav-item' >
            <a href="{{ URL::route('linked') }}" class='nav-link'>
            <i class="nav-icon far fa-calendar-alt"></i>
              <p style="margin-left: 5%!important;">Linked Accounts</p>
            </a>
          </li>
          <li  class='nav-item' >
            <a href="{{ URL::route('newPolicy') }}" class='nav-link' >
              <i class="nav-icon far fa-envelope"></i>
              <p style="margin-left: 5%!important;">Add Policy</p>
            </a>
          </li>
          <li  class='nav-item' >
            <a href="{{ URL::route('feedback') }}" class='nav-link' >
              <i class="nav-icon far fa-comment-dots"></i>
              <p style="margin-left: 5%!important;">Feedback</p>
            </a>
          </li>
          <li  class='nav-item' >
            <a href="{{ URL::route('history') }}" class='nav-link'>
              <i class="nav-icon far fa-user-circle"></i>
              <p style="margin-left: 5%!important;">Invoices History</p>
            </a>
          </li>
        <a href="{{ route('logout') }}"  onclick="event.preventDefault();    
            document.getElementById('logout-form').submit();" id="logout" class="btn"
           style="margin-top: 8%!important; letter-spacing: 1px; width: 80%; height: 1%; margin-left: 7%;
            background-color: #FCD304!important; color:#021638;font-weight: bold;">
          &nbsp;LOGOUT
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
     
    <!-- Main content -->
   @yield('content')
<!-- Main content
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="https://www.ecollectionz.com">Ecollectionz.com</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>-->
</div>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<script src="{{ asset('js/jquery.timeago.js') }}"></script>

<script>
$(document).ready( function() {

    $('.sidebar-toggle').click(function (e) {
        var get_class = $("body").attr('class');
            console.log(get_class);
        if ((get_class == "sidebar-mini")|| (get_class == "sidebar-mini sidebar-open")) {
            $("#logout").html("<i class=\"fas fa-sign-out-alt\"></i>");
            $("#profile").html("<i class=\"fas fa-user-alt\" style='margin-left: 4%!important;'></i>");
        }
        else {
            $("#logout").html("LOGOUT");
            $("#profile").html("PROFILE");
        }
    });

    $(".main-sidebar").on("mouseover", function () {
        var get_class = $("body").attr('class');
        if (get_class == "sidebar-mini sidebar-collapse") {
            $("#logout").html("LOGOUT");
            $("#profile").html("PROFILE");
        }
        console.log(get_class);
    });
    $(".main-sidebar").mouseout(function(){
        var get_class = $("body").attr('class');
        if (get_class == "sidebar-mini sidebar-collapse") {
            $("#logout").html("<i class=\"fas fa-sign-out-alt\"></i>");
            $("#profile").html("<i class=\"fas fa-user-alt\" style='margin-left: 4%!important;'></i>");
        }
    });
    var url =window.location.origin+'/ecollectionz/ecollectionz/public';
    console.log(url);
    var session_id = "{!! (Session::getId())?Session::getId():'' !!}";
    var user_id = "{!! (Auth::user())?Auth::user()->id:'' !!}";
   // alert("{!! Session::getId(); !!}");

    $('#history_table').DataTable( {
        responsive: true,
        "dom": '<"row"<"col-sm-4"><"col-sm-3"><"col-sm-3"f><"col-sm-2"l>>tip',
        "pagingType": "full_numbers"
    } );
    $('#policies_table').DataTable( {
        responsive: true,
        "dom": '<"row"<"col-sm-4"><"col-sm-3"><"col-sm-3"f><"col-sm-2"l>>tip',
        "pagingType": "full_numbers"
    });
   // $(".dataTables_filter input").attr("placeholder", "Search");
    //var s = $(".dataTables_filter label").html();
    //s = s.replace("Search:", "");
   // $(".dataTables_filter label").html(s);
    //$('.dataTables_length').text(text);
   // alert(text);
    $('#p_linked_table').DataTable( {
        responsive: true,
        "dom": '<"row"<"col-sm-4"><"col-sm-3"><"col-sm-3"f><"col-sm-2"l>>tip',
        "pagingType": "full_numbers"
    } );

    $(".first.paginate_button, .last.paginate_button").hide();

   //alert(url);
    getAjaxNotice();
    function getAjaxNotice() {
        var notif = "";
        $.ajax({
            type: 'get',
            url: url+'/notifications',
            dataType: 'JSON',
            success: function(data){
                if(data.length ==0){
                    $('.navbar-badge').html('');
                    $('.notif').html('<p>There is no new notifications</p>');
                   // return false;
                }
                else{
                    for(var i=0;i<data.length;i++){
                        $('.navbar-badge').html(data.length);
                        //console.log(data[i].title);
                        notif+="<a  id='"+ data[i].id+"'  class='dropdown-item notif_click'>\n" +
                            "            <div class='media'>\n" +
                            "              <div class='media-body'>\n" +
                            "                <h3 class='dropdown-item-title'>\n" +
                            data[i].title +
                            "                  <span class='float-right text-sm text-danger'><i class='fa fa-eye'></i></span>\n" +
                            "                </h3>\n" +
                            "                <p class='text-sm'>"+data[i].body+"</p>\n" +
                            "                <p class='text-sm text-muted'><i class='fa fa-clock-o mr-1'></i> "+data[i].created_at+"</p>\n" +
                            "              </div>\n" +
                            "            </div>\n" +
                            "          </a>";

                        // notif+=data[i].title;
                        //  notif+=" <span class='float-right text-muted text-sm'>"+data[i].created_at+"</span>";
                    }
                }
                $('.notif').html(notif);
            }
        });
    }
    window.setInterval(function(){
        getAjaxNotice();
    }, 4000);
    $(document).on('click','.notif_click',function(e) {
        var id = $(this).attr("id");
        $.ajax({
            type: 'get',
            url: url+'/'+id+'/read',
            success: function(data){
                getAjaxNotice();
                window.location=  data
            }
        });
    });
    //mark as read
  $('.select2').select2();
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    $(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});
		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$("#imgInp").change(function(){
		    readURL(this);
		});
	});
</script>

</body>
</html>
