<?php include_once('header.php'); ?>
  
    <style>
        .mySlides1 span {
            color:  #fad500;
            padding-bottom: 15px;
            text-align: center;
        }
        .HomeSection{
           padding-top: 165px;
           padding-bottom: 0px;
        }
        .mySlides1 p {
         font-weight: bold;
         color: #1d3357;
         margin-bottom: 42px;
        }

        .prev, .next {
   
         top: 37%;
    
        }
        .HomeSection .col-md-6.to{
            margin-left: -16%;
          
        }
        #tofix{
      margin-left: 12%;
       }
    
        .contact {
        margin-left: 14%;
        margin-right: 25%;
        margin-bottom: 50px;
       }
        @media (max-width: 991px)
{
    .HomeSection {
    padding-top: 66px;
    }
    .HomeSection .col-md-6.to{
            margin-left: 0;      
    }
   
}
@media (max-width: 768px){
  #tofix{
      margin-left: 3%;
    }

}
@media (max-width: 991px){
  .HomeSection .col-md-6.to{
          /*  max-width: 100%;*/
    }
    .mySlides1 span {
      font-size: 13px;
    }
    .mySlides1 p{
    text-align: left;
    }
    
}
@media (min-width: 767px) and (max-width: 991px){
    .HomeSection .col-md-6.to{
       /*   max-width: 50%;*/
    }
}
   /* Style for select */
select.sel {
  background-color: darkgrey;
    color: #1d3357;
    padding: 12px;
    border-radius: 29px;
    cursor: pointer;
    text-align-last: center;
    font-weight: bold;
  height: 40px;
  padding: 6px 45px 6px 15px;
  appearance: none;
  -moz-appearance: none;
  -webkit-appearance: none;
  text-indent: 0.01px;
  text-overflow: "";
}

/* Hidden select default on ie */
select::-ms-expand{
  display: none;
}

/* Style for wrap select arrow */
.wrap-select-arrow {
    position: relative;
    width: 145px;
}

/* Style for arrow */
.select-arrow {
  position: absolute;
  top: 0;
  right: 11px;
  padding: 8px 15px;
  pointer-events: none;
}

/* Arrow down */
.arrow-down {
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 10px solid #1d3357;
}

/* Arrow up */
.arrow-up {
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-bottom: 10px solid #1d3357;
  margin-bottom: 3px;
}
   
    </style>
    <body class="body">
        
        <div class="container-fluid">

          <!-- Start Header -->
          <!-- NAVBAR-->
<nav class="navbar  navbar-expand-lg py-3 navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand">
        <!-- Logo Image -->
        <img src="img/Logo.png" alt="" class="d-inline-block align-middle mr-2">
       
      </a>
  
      <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
  
      <div id="navbarSupportedContent" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item "><a href="index.php" class="nav-link ">Home <span class="sr-only">(current)</span></a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
          <li class="nav-item"><a href="services.php" class="nav-link active">Services</a></li>
          <li class="nav-item"><a href="contact.php"  class="nav-link">Contact</a></li>
          <li class="nav-item">
                <button class="btn btn-primary" style="width: 115px;"><a class="nav-link"   style="color: #1f325a;font-weight: bold;    padding: 3px;margin: 0"> SIGN IN </a></button>
         </li>
         <li class="nav-item">
            <img src="img/Asset 17.png" alt="" class="headIm">
          </li> 
        </ul>
      </div>
    </div>
  </nav>
  

      <!-- end Header --> 

          <!--start HomeSection-->
          <div class="HomeSection">
            <div>
                    <div class="row" style="margin:0;">
<div class="col-md-6 as " id="tofix">
  
  <h6 id="form1">SIGN IN AS:</h6>
  <div class="wrap-select-arrow">
    <select class="active SignAs sel" name="">      
      <option value="0" selected="selected">Client </option>    
      <option value="1">Corporate </option>
      <option value="1">Agent </option>
      <option value="1">Broker </option>
    </select>    
    <div class="select-arrow">
      <div class="arrow-up"></div>
      <div class="arrow-down"></div>
    </div>
  </div>

</div>

<div class="col-md-6 to" id="SignIn">
    <div class="contact text-left">  
  <div class="mySlides1">
    <p style="margin-bottom: 30px">Admin Sign IN</p>
        <form  class="form-horizontal" method="POST" action="{{ route('admin.login.submit') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <label>USER NAME</label>
          <input class="form-control input-lg"  name="email" type="text" placeholder="USER NAME" required>
          <label>PASSWORD</label>
          <input class="form-control input-lg" type="password"  name="password" placeholder="*******" required>
        
          <button type="button" id="submit" name="submit" class="btn">SIGN IN</button>
          <span class="haveAccount">Don’t have a account ? <a class="reg" href="register.php">REGISTER HERE</a></span>
        </form>
          <ul class="login-more">
              <li class="m-b-8">
                                <span class="txt1">
                                    Forgot
                                </span>

                  <a href="{{ route('admin.password.request') }}" class="txt2">
                      Password?
                  </a>
              </li>
          </ul>
</div>

</div>
</div> 
 <!-- The dots/circles -->
</div>

</div>

            </div></div></div>           
          <!--end HomeSection-->
          
            <!--start 
           <div class="footer">
            <div>
                    <div class="row" style="margin:0;">
                  
                  
                  
                  <div class="col-md-12 text-left" >
                        <ul id="riul">
                                <li><a href="#" class="fa fa-instagram"></a></li>   
                                <li><a href="#" class="fa fa-facebook"></a></li>                 
                                <li><a href="#" class="fa fa-twitter"></a></li>
                        </ul>


                 </div>
          </div>
        </div>
        </div>
      footer-->
           <!--end footer-->

 </div>
    
       <script src="js/jquery-3.2.1.min.js"></script>
       <script src="js/popper.min.js"></script>
       <script src="js/bootstrap.min.js"></script>
       <script src="js/main.js"></script>
       <script src="js/update.js"></script>
       <script src="js/wow.min.js"></script>
       <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </body>
    </html>  