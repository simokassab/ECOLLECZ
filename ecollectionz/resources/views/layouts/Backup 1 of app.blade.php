<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EZ - @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
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
    <style>
      body {
       
      }

      h1, h2, h3 {
         font-family: 'Poppins', sans-serif;
        font-weight: bold;
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
      
      .sidebar-dark-primary .nav-treeview > .nav-item > .nav-link {
        background-color: #D7B40E;
        color: #C1CCD7 !important;
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
    </style>
</head>
<body class="hold-transition sidebar-mini">
  
<!-- End Modal -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light border-bottom" style="background-color:#012F5C !important;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars" style='color:#C2C7D0 !important;'></i></a>
      </li>
    </ul>
    <!-- SEARCH FORM >
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form-->

    <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown" >
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="fas fa-bell"  style='color:#C2C7D0 !important; font-size: 20px; margin: 10px 10px 0 0;'></i>
                  <span class="badge badge-danger navbar-badge"></span>
              </a>
              <div  class="dropdown-menu dropdown-menu-lg dropdown-menu-right  notif"  style="width: 500px !important;">

              </div>
          </li>
      </ul>
    <a href="{{ route('logout') }}"  onclick="event.preventDefault();    
    document.getElementById('logout-form').submit();" class="btn btn-warning " >
    
                    Profile
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./admin" class="brand-link">
      <img src="{{ asset('img/logo.png') }}" alt="Logo" class="brand-image  elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">EZ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav  nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li  class='nav-item' >
            <a href="{{ URL::route('home') }}" class='nav-link'>
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li  class='nav-item' >
            <a href="{{ URL::route('newPolicy') }}" class='nav-link'>
              <i class="nav-icon fas fa-plus"></i>
              <p>Add Policy</p>
            </a>
          </li>
          <li  class='nav-item' >
            <a href="{{ URL::route('admin.dashboard') }}" class='nav-link'>
              <i class="nav-icon fas fa-comments"></i>
              <p>Send Feedback</p>
            </a>
          </li>
        <a href="{{ route('logout') }}"  onclick="event.preventDefault();    
        document.getElementById('logout-form').submit();" class="btn btn-danger " style="color:white;">
          <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;Logout
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

  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="#">Ecollectionz.online</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<script>
$(document).ready( function() {

   var url =window.location.origin+'/ecollect/public';
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
            url: './'+id+'/read',
            success: function(data){
                getAjaxNotice();
                window.location= url + data
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

    $("#corporates_table").DataTable();
    $("#brokers_table").DataTable();
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
