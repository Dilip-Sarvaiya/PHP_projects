<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contact me</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link rel="shortcut icon" href="assets/img/pic.ico" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("form").submit(function(){
    var Name=$("#name").val();
    var Email=$("#email").val();
    var Subject=$("#subject").val();
    var Message=$("#message").val();
    if(Name=="" || Email=="" || Subject=="" || Message=="")
    {
        alert("Please fill up all Detail..");
        return false;
    }
    else
    {
        return true;
    }
  });
});
</script>
  <style>
      img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]
      {
          display:none;
      }
  </style>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/dropdown.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="#call"  class="cta-btn scrollto">Dilip Sarvaiya</a></h1>
       
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.html">Home</a></li>

          <li ><a href="about.html">About</a>
           
          </li>

          <li><a href="education.html">Education</a></li>
          <li><a href="certificates.html">Certificates</a></li>
      
          <li class="active"><a href="contact.php">Contact</a></li>

          <li>
            <div class="dropdown" style="float:left;">
                <button class="dropbtn">My Works</button>
                <div class="dropdown-content" style="left:0;">
                    <a  target="_blank" href="tutorials/index.html">PHP Works</a>
                    <a  target="_blank" href="https://github.com/Dilip-Sarvaiya/Android_5th_Sem.git">Android Works</a>
                    <a  target="_blank" href="all_designs.php">My Designs</a>
                </div>
             </div>
          </li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2>Contact</h2>
            <p>Thank you for Contacting.Fill the following form to reach with us </p>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Contact</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29587.382842836367!2d71.18662786132354!3d22.03341440104369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3958f7cfc65cdd13%3A0xfa7c9f0de9b31b7d!2sJasdan%2C%20Gujarat%20360050!5e0!3m2!1sen!2sin!4v1590828938200!5m2!1sen!2sin" frameborder="0" allowfullscreen></iframe>

        </div>
        <div class="row mt-5">

          <div class="col-lg-4" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Gangabhuvan Pramukh Park,Jasdan,360050</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>dilipsarvaiya700@gmail.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>8905455955</p>
              </div>

            </div>

          </div>

           <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

         <form action="mail.php" method="post" id="form" name="form" class="form-box">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" id="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
             
              <div class="text-center"><input type="submit" name="submit" value="Send Message" class="btn btn-success" /></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <section id="call">
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Gangabhuvan, Pramukh Park <br>
              Jasdan, 360050<br>
              India <br>
			  Gujarat<br>
              <strong>Phone:</strong> 8905455955<br>
              <strong>Email:</strong> dilipsarvaiya700@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="https://twitter.com/DilipJSarvaiya1" class="twitter"><i class="icofont-twitter"></i></a>
              <a href="https://m.facebook.com/home.php?_rdr" class="facebook"><i class="icofont-facebook"></i></a>
              <a href="https://www.instagram.com/dilip_sarvaiya_700/" class="instagram"><i class="icofont-instagram"></i></a>
              <a href="https://myaccount.google.com/?pli=1" class="google-plus"><i class="icofont-skype"></i></a>
              <a href="https://www.linkedin.com/in/dilip-sarvaiya-55461817b/" class="linkedin"><i class="icofont-linkedin"></i></a>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Dilip Sarvaiya</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://dilipsarvaiya.epizy.com/">Dilip Sarvaiya</a>
      </div>
    </div>
  </footer><!-- End Footer -->
  </section>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  
  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>