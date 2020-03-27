<?php
define("SITE_URL", "http://localhost/ecollectionz");
define("APP_URL", "http://localhost/ecollectionz/ecollectionz/public/");


//$page= $_SERVER['REQUEST_URI'];

$page= basename($_SERVER['PHP_SELF']);
$index='';
$about='';
$service='';
$contact='';
if(strpos($page, 'index') !== false){
    $index='active';
}
else if(strpos($page, 'about') !== false){
    $about='active';
}
else if(strpos($page, 'services') !== false){
    $service='active';
}
else if(strpos($page, 'contact') !== false){
    $contact='active';
}
else {
    $index='';
    $about='';
    $service='';
    $contact='';
}
?>
<nav class="navbar  navbar-expand-lg py-3 navbar-dark bg-dark shadow-sm">
        <div class="container" style="width: 100%!important;">
          <a href="#" class="navbar-brand" >
            <!-- Logo Image -->
            <img src="img/Logo.png" alt="" class="d-inline-block align-middle mr-2" style="width:60%; height: 60%;">

          </a>

          <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

          <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav">
              <li class="nav-item " >
                  <a href="<?php echo SITE_URL; ?>index.php"
                     class="nav-link <?php echo $index; ?>">Home <span class="sr-only">(current)</span></a></li>
                <li class="nav-item" ><a href="<?php echo SITE_URL; ?>services.php" class="nav-link <?php echo $service; ?>">Services</a></li>
              <li class="nav-item" ><a href="<?php echo SITE_URL; ?>about.php" class="nav-link <?php echo $about; ?>">About</a></li>

              <li class="nav-item" ><a href="<?php echo SITE_URL; ?>contact.php" class="nav-link <?php echo $contact; ?>">Contact</a></li>
              <li class="nav-item" >
              <button class="btn btn-primary" style="width: 115px;">
                  <a class="nav-link" href="<?php echo APP_URL; ?>login"
                   style="color: #1f325a;font-weight: bold;    padding: 3px;margin: 0"> SIGN IN </a></button>
              </li>
              <li class="nav-item">
                <img src="img/Asset 17.png" alt="" class="headIm">
              </li>
            </ul>
          </div>
        </div>
      </nav>