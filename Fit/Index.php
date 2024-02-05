
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYM ROAR</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Style.css">


    
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    }; 

  $('#output').show();
    reader.readAsDataURL(event.target.files[0]);
  };
</script>

<style>
.navbar-nav .nav-link.active,
.navbar-nav .nav-link.active:focus,
.navbar-nav .nav-link.active:hover {
    background-color: #f54324;
    color: white; 
}
</style>
</head>
<body>

<!--Header-->
<nav id="navbar-example2" class="navbar navbar-expand-lg fixed-top bg-dark border-body" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="Index.html">
        <i class="fa-solid fa-dumbbell fa-sm" style="color: #f54324;"></i>         
        <span>GYM ROAR</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav nav-pills ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#home"><i class="fa-solid fa-house fa-xs"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about"><i class="fa-solid fa-users fa-xs"></i> About Us</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="#services"><i class="fa-solid fa-handshake fa-xs"></i> Services</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="#contact"><i class="fa-solid fa-phone-volume fa-xs"></i> Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="btn.html"><i class="fa-solid fa-right-to-bracket fa-xs"></i> Log In</a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="/Fit/All/SignUp.php"></i> Sign Up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">


<!--Slider Carousel-->
<div class="home-section section-padding">
<div class="carousel slide" id="home">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="carousel-caption">
          <h5 class="animated fadeInDown" style="animation-delay:1s;">Hello! <span> GYM ROAR! </span> </h5>
          <p class="animated fadeInUp" style="animation-delay:2s;">"Strength doesn't come from what you can do; it comes from overcoming the things you once thought you couldn't."
        </p>
          <a class="btn animated fadeInUp btn-outline-light" href="/Fit/All/SignUp.php" style="animation-delay:3s">Enroll now</a>
        </div>   
      </div>
   </div>
</div>
</div>


<!--About-->
<div class="about-section section-padding " id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="img-area">
                    <img class="img" src="pictures/about.jpg" alt="about_img"> 
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="about-text">
                    <h2>Welcome to<br><span> GYM ROAR!</span></h2>
                    <p>At GYM ROAR, we're committed to your fitness journey. We provide a friendly and supportive environment where everyone, regardless of their fitness level, feels welcome and encouraged.<br><br><br>

                        Our team of dedicated trainers is here to help you reach your goals. Whether you're looking for personalized training or enjoying our group classes, we're focused on your success.<br><br><br>
                        
                        With modern equipment and a variety of workout options, we strive to make your fitness experience enjoyable and effective. Join us and become a part of our fitness family today!"
                    </p>
                    <a class="btn" id="aboutbtn" href="/Fit/All/SignUp.php">Join now</a>
                  </div>
            </div>           
        </div>
    </div>
</div>


<!--Services-->
<div class="services section-padding" id="services">
  <div class="container">
    <div class="row ">
      <div class="col-lg-12">
        <div class="section-header text-center">
            <h2>Our <span>Services</span></h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="single-services text-center">
          <i class="fa-solid fa-person fa-xl"></i>
          <h2>Personal Training</h2>
          <p>Gym Roar offer customized one-on-one training by certified instructors for tailored workouts and progress tracking.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="single-services text-center">
          <i class="fa-solid fa-dumbbell fa-xl"></i>              
          <h2>Equipment and Facilities</h2>
          <p>Gym Roar vary in equipment quality, providing cardio, weights, and functional areas.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="single-services text-center">
          <i class="fa-solid fa-list-check fa-xl"></i>             
           <h2>Nutritional Guidance</h2>
          <p>Gym Roar may feature nutritionists advising on healthy eating habits to complement fitness.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="single-services text-center">
          <i class="fa-solid fa-hands-holding fa-xl"></i>              
          <h2>Specialized Program</h2>
          <p>Gym Roar offer tailored programs for specific groups like seniors, weight loss, sports training, or rehab.</p>
        </div>
      </div>
    </div>
  </div>
</div>



<!--Contact-->
<div class="contact-section section-padding" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header text-center">
                    <h2><span>Contact </span>us</h2>
                </div>
            </div>
        </div>
        <div class="row p-3 shadow mt-0 mb-5 ms-5 me-5 pt-3 pb-4 bg-body rounded text-center">
            <div class="col-lg-12">
                <div class="left-contact ms-5 me-5">
                    <h3> Location:</h3>
                    <p>Binan, Laguna</p><br><br><br>
                    <h3>Email:</h3>
                    <p>gymroar@gmail.com</p><br><br><br>
                    <h3>Call Us:</h3>
                    <p>09123456789</p>
                    <i class="fa-solid fa-location-dot fa-lg pt-3"></i>  <i class="fa-brands fa-facebook fa-lg pt-3"></i>  <i class="fa-brands fa-instagram fa-lg pt-3"></i>
                </div>
            </div>
        </div>
    </div>
</div>

  </div>


       
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>