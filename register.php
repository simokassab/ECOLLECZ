<?php include_once('header.php'); ?>
  
    <style>

        .sw-btn-prev{
          background-color: darkgrey !important;
          height: 30% !important;
          width: 90%!important;
        }
        .sw-btn-next{
          background-color: darkgrey !important;
          height: 30% !important;
          width: 90%!important;
        }

        .sw-theme-default > ul.step-anchor > li > a { 
          color: #FCD304 !important;
        }

        .sw-theme-default > ul.step-anchor > li.active > a {
          color: #1D3357 !important;
        }

        
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
  background-color: #fad500;
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
              <select class=" active SignAs sel" name="">      
                <option value="0" selected="selected">CLIENT </option>    
                <option value="1">USER </option>
              </select>    
              <div class="select-arrow">
                <div class="arrow-up"></div>
                <div class="arrow-down"></div>
              </div>
            </div>

            <h6 id="form2" >REGISTER AS:</h6>
            <div class="wrap-select-arrow">
              <select class=" active RegAs sel" name="">      
                <option value="0" selected="selected">CLIENT </option>    
                <option value="1">USER </option>
              </select>    
              <div class="select-arrow">
                <div class="arrow-up"></div>
                <div class="arrow-down"></div>
              </div>
            </div>
          </div>

<div class="col-md-6 to" id="Register" >
<div class="slideshow-container  text-center" style="margin-top: -45px;">
            <div class="contact text-left"> 
            <div class="mySlides1 first fade">
                        <p>CLIENT REGISTER</p>
                        <span>IT’S COMPLETELY FREE</span>       
        <form action="#" id="myForm"method="post" accept-charset="utf-8">

        <!-- SmartWizard html -->
        <div id="smartwizard">
            <ul>
                <li><a href="#step-1">Step 1</a></li>
                <li><a href="#step-2">Step 2</a></li>
            </ul>
            <div>
                <div id="step-1">
                    <div id="form-step-0" >
                    <label>NAME</label>
                              <input class="form-control input-lg"  name="name" type="text" placeholder="Your full name" required>
                             
                              <label>EMAIL</label>
                              <input class="form-control input-lg" type="email"  name="email" placeholder="Email adress" required>
                              <label>PASSWORD</label>
                              <input class="form-control input-lg" type="password"  name="password" placeholder="*******" required>
                              <label>CONFIRM PASSWORD</label>
                              <input class="form-control input-lg" type="password"  name="password" placeholder="*******" required>
                    </div>
                </div>
                <div id="step-2">
                    <div id="form-step-1" >
                   
                       <label>COUNTRY</label>
                          <input class="form-control input-lg"  name="country" type="text" placeholder="Lebanon" required>
                          <label>PHONE NUMBER</label>
                    <div class="input-group">
                          <select name="countryCode" class="minimal">
                                <option data-countryCode="LB" value="44" Selected>LB (+961)</option>
                                <option data-countryCode="US" value="1">USA (+1)</option>
                                <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                                <option data-countryCode="AD" value="376">Andorra (+376)</option>
                        </select>
                          <input class="form-control input-lg"  name="Number" type="number" placeholder="Number " required>
                        </div>
                          <label>ACTIVATION CODE</label>
                          <input class="form-control input-lg" type="password"  name="activation" placeholder="--- --- ---" required>
                          <button type="button" id="submit" name="submit" class="btn">CREATE ACCOUNT</button>   
                          <span class="member"> <a class="reg" href="login.php">I’m already a member</a></span>
                    </div>
                </div>
            </div>
        </div>

        </form>
                
                             
                             
              </div>   </div>  
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
       <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
        <!-- Include SmartWizard JavaScript source -->
        <script type="text/javascript" src="./dist/js/jquery.smartWizard.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){

            // Smart Wizard
            $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'default',
                    transitionEffect:'fade',
                    anchorSettings: {
                                markDoneStep: true, // add done css
                                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                            }
                 });

            $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
                var elmForm = $("#form-step-" + stepNumber);
                // stepDirection === 'forward' :- this condition allows to do the form validation
                // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
                if(stepDirection === 'forward' && elmForm){
                    elmForm.validator('validate');
                    var elmErr = elmForm.children('.has-error');
                    if(elmErr && elmErr.length > 0){
                        // Form validation failed
                        return false;
                    }
                }
                return true;
            });
        });
    </script>
    </body>
    </html>  