<!DOCTYPE html>
<html lang="en">
<head>
  <title>TMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <!-- script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
    }
    h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
    }
    h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
    }  
    .jumbotron {
      background-color: #5bc0de;
      color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
    }
    .container-fluid {
      padding: 60px 50px;
    }
    .bg-grey {
      background-color: #f6f6f6;
    }
    .bg-org {
      background-color: #5bc0de;
      color: #fff;
    }
    .logo-small {
      color: #f4511e;
      font-size: 50px;
    }
    .logo {
      color: #5bc0de;
      font-size: 200px;
    }
    .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
    }
    .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
    }
    .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #f4511e;
    }
    .carousel-indicators li {
      border-color: #f4511e;
    }
    .carousel-indicators li.active {
      background-color: #f4511e;
    }
    .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
    }
    .item span {
      font-style: normal;
    }
    .panel {
      border: 1px solid #f4511e; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
    }
    .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
    }
    .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
    }
    .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
    }
    .panel-footer {
      background-color: white !important;
    }
    .panel-footer h3 {
      font-size: 32px;
    }
    .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
    }
    .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
    }
    .navbar {
      margin-bottom: 0;
      background-color: #5bc0de;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
    }
    .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
    }
    .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
    }
    .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
    }
    footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #ffffff;
    }
    .slideanim {visibility:hidden;}
    .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
    }
    @keyframes slide {
      0% {
        opacity: 0;
        transform: translateY(70%);
      } 
      100% {
        opacity: 1;
        transform: translateY(0%);
      }
    }
    @-webkit-keyframes slide {
      0% {
        opacity: 0;
        -webkit-transform: translateY(70%);
      } 
      100% {
        opacity: 1;
        -webkit-transform: translateY(0%);
      }
    }
    @media screen and (max-width: 768px) {
      .col-sm-4 {
        text-align: center;
        margin: 25px 0;
      }
      .btn-lg {
        width: 100%;
        margin-bottom: 35px;
      }
    }
    @media screen and (max-width: 480px) {
      .logo {
        font-size: 150px;
      }
    }
  </style>
</head>
<!-- body -->
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
  <!-- header left nav -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
            @if (Route::has('login'))
              @auth
                <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">DASHBOARD</a>
              @else
                <a class="navbar-brand" href="{{ route('login') }}">LOGIN</a>
              @endauth
            @endif
    </div>
    <!-- header right nav -->
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">ABOUT</a></li>
        <!-- <li><a href="#services">SERVICES</a></li>
        <li><a href="#portfolio">TENANTS</a></li> -->
        <!-- <li><a href="#pricing">FLATS</a></li> -->
        <li><a href="#contact">CONTACT</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- header Text -->
<div class="jumbotron text-center">
  <h1>Welcome</h1>
</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>What Is TMS !!!</h2>
      <p>TMS stands for Techno Management System. <br>
      For more details, leave a message in the contact section.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-signal logo"></span>
    </div>
  </div>
</div>
<!-- Contact Section -->
<div id="contact" class="container-fluid bg-org">
  <h3 class="text-center">CONTACT</h3><br>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> 76, Tara Mosjid Road, Azampur-Kachabazar, Dakshinkhan, Dhaka-1230</p>
      <p><span class="glyphicon glyphicon-phone"></span> +8801680800810</p>
      <!-- <p><span class="glyphicon glyphicon-phone"></span> +8801739903035</p> -->
      <p><span class="glyphicon glyphicon-envelope"></span> technocean.offcial@gmail.com</p>
    </div>
<div class="col-sm-7 slideanim">
        <div class="row">
            {!! Form::open(['action' => 'SmsController@store' , 'method'=>'POST']) !!}
            <div class="col-sm-4 form-group">
                {{form::label('name','Name')}}
                {{form::text('name','',['class'=>'form-control','placeholder'=>'name'])}}
            </div>
            <div class="col-sm-4 form-group">
                {{form::label('email','Email')}}
                {{form::text('email','',['class'=>'form-control','placeholder'=>'Email'])}}
            </div>
            <div class="col-sm-4 form-group">
                {{form::label('contact','Contact')}}
                {{form::text('contact','',['class'=>'form-control','placeholder'=>'Contact'])}}
            </div>
        </div>
                {{form::label('message','Message')}}
                {{form::textarea('message','',['class'=>'form-control','placeholder'=>'Message'])}}
        <div class="row">
          <div class="col-sm-12 form-group">
                {{Form::submit('Submit',['class'=>'btn btn-info'])}}
          </div>
        </div>
            {!! Form::close() !!}
</div>
  </div>
<!-- Footer -->
<footer class="container text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Copyright @technoceanbd 2020</p>
</footer>
</div>

<!--Script-->
<script>
  $(document).ready(function(){
    // Add smooth scrolling to all links in navbar + footer link
    $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 900, function(){
    
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
    
    $(window).scroll(function() {
      $(".slideanim").each(function(){
        var pos = $(this).offset().top;

        var winTop = $(window).scrollTop();
          if (pos < winTop + 600) {
            $(this).addClass("slide");
          }
      });
    });
  })
</script>
</body>
</html>
