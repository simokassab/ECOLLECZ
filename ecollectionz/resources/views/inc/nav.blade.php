<nav class="navbar  navbar-expand-lg py-3 navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a href="#" class="navbar-brand">
            <!-- Logo Image -->
            <img src="{{asset('img/Logo.png')}}" style="width: 60%; height: 60%;" class="d-inline-block align-middle mr-2">

        </a>

        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item" style="font-size: 1.1rem;"><a href="{{URL_WEB}}index.php" class="nav-link">Home <span class="sr-only">(current)</span></a></li>
                <li class="nav-item" style="font-size: 1.1rem;"><a href="{{URL_WEB}}services.php" class="nav-link">Services</a></li>
                <li class="nav-item" style="font-size: 1.1rem;"><a href="{{URL_WEB}}about.php" class="nav-link">About</a></li>
                <li class="nav-item" style="font-size: 1.1rem;"><a href="{{URL_WEB}}contact.php"  class="nav-link">Contact</a></li>
                <li class="nav-item">
                    <button class="btn btn-primary" style="width: 115px;"><a class="nav-link"   style="color: #1f325a;font-weight: bold;    padding: 3px;margin: 0"> SIGN IN </a></button>
                </li>
                <li class="nav-item">
                    <img src="{{asset('img/Asset 17.png')}}" alt="" class="headIm">
                </li>
            </ul>
        </div>
    </div>
</nav>