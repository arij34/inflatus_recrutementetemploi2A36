<?php
include '../Controller/EntrepriseC.php';

// Instanciation de la classe EntrepriseC
$entrepriseC = new EntrepriseC();

// Récupération de la liste des entreprises depuis la base de données
$list = $entrepriseC->listEntreprises();
?>

<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<title>Space Dynamic - SEO HTML5 Template</title>

<!-- Bootstrap core CSS -->
<link href="templatemo_562_space_dynamic/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Additional CSS Files -->
<link rel="stylesheet" href="templatemo_562_space_dynamic/assets/css/fontawesome.css">
<link rel="stylesheet" href="templatemo_562_space_dynamic/assets/css/templatemo-space-dynamic.css">
<link rel="stylesheet" href="templatemo_562_space_dynamic/assets/css/animated.css">
<link rel="stylesheet" href="templatemo_562_space_dynamic/assets/css/owl.css">
<!--

TemplateMo 562 Space Dynamic

https://templatemo.com/tm-562-space-dynamic

-->
</head>
<body>
<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
  <div class="preloader-inner">
    <span class="dot"></span>
    <div class="dots">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <!-- ***** Logo Start ***** -->
          <a href="index.html" class="logo">
            <h4>kha<span>damni</span></h4>
          </a>
          <!-- ***** Logo End ***** -->
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <li class="scroll-to-section"><a href="home.html" class="active">Home</a></li>
            <li class="scroll-to-section"><a href="#about">About Us</a></li>
            <li class="scroll-to-section"><a href="#services">Services</a></li>
            <li class="scroll-to-section"><a href="#portfolio">Portfolio</a></li>
            <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
            <li class="scroll-to-section"><a href="#contact">Message Us</a></li> 
            <li class="scroll-to-section"><div class="main-red-button"><a href="#contact">Contact Now</a></div></li> 
          </ul>        
          <a class='menu-trigger'>
              <span>Menu</span>
          </a>
          <!-- ***** Menu End ***** -->
        </nav>
      </div>
    </div>
  </div>
</header>
<!-- ***** Header Area End ***** -->
<div id="portfolio" class="our-portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <h2>Découvrir <em> la liste </em>  <span>des entreprises</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
          <?php foreach ($list as $entreprise) { ?>
         <div class="col-lg-3 col-sm-6">
            <a href="#">
                <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                     <div class="hidden-content scroll-text">
                        <h4><?php echo $entreprise['nomEntreprise']; ?></h4>
                        <p><?php echo $entreprise['adresse']; ?></p>
                        <p><?php echo $entreprise['telephone']; ?></p>
                        <p><?php echo $entreprise['email']; ?></p>
                        <p><?php echo $entreprise['dateCreation']; ?></p>
                        <!-- Bouton "Détails" -->
                     </div>
                     <div class="showed-content">
                     <a href="detail.php?id=<?php echo $entreprise['idE']; ?>">
                      <img src="templatemo_562_space_dynamic/assets/images/<?php echo $entreprise['cheminImage']; ?>" alt="<?php echo $entreprise['idE']; ?>">
                     </a>

                     </div>


                </div>  
                
            </a>
         </div>
         <?php } ?>
        </div>

    </div>
 </div>
<footer>
</footer>
<!-- Scripts -->
<script src="templatemo_562_space_dynamic/vendor/jquery/jquery.min.js"></script>
<script src="templatemo_562_space_dynamic/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="templatemo_562_space_dynamic/assets/js/owl-carousel.js"></script>
<script src="templatemo_562_space_dynamic/assets/js/animation.js"></script>
<script src="templatemo_562_space_dynamic/assets/js/imagesloaded.js"></script>
<script src="templatemo_562_space_dynamic/assets/js/templatemo-custom.js"></script>

</body>
</html>