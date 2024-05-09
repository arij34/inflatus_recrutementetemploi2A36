<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des blogs : Homepage</title>
    <link rel="stylesheet" href="../view/Blog.css"/>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--==Title========================-->
    <title>Recruitment and Employment Blog</title>
    <!--==CSS==========================-->
    <link rel="stylesheet" href="css/style.css">
    <!--==Poppins======================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--==Font-Awesome=================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!--<style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }
        .blog-heading {
            text-align: center;
            margin-bottom: 20px;
        }
        .blog-box-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .blog-box {
            width: 30%;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .blog-box img {
            max-width: 100%;
            border-radius: 5px;
        }
        .blog-box-text {
            margin-top: 10px;
        }
        #blog-table, #comments-table {
            width: 50%;
            margin: 20px auto;
            text-align: center;
        }
        #blog-table form, #comments-table form {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }
        #blog-table h2, #comments-table h2 {
            margin-bottom: 10px;
        }
        #blog-table input[type="text"], #comments-table input[type="text"], #comments-table textarea {
            width: 80%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        #blog-table input[type="submit"], #comments-table input[type="submit"] {
            width: 40%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #blog-table input[type="submit"]:hover, #comments-table input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style> -->

</head>
<body>

    <nav class="navbar">
        <img src="img/logo.png" class="logo" alt="">
        <ul class="links-container">
            <li class="link-item"><a href="../View/Blog.php" class="link">Blogs</a></li>
            <li class="link-item"><a href="../View/index.html" class="link">return to Khadamni</a></li>
        </ul>
    </nav>

    <header class="header">
        <div class="content">
            <h1 class="heading">
                <span class="small">welcome in the world of</span>
                blog
                <span class="no-fill">writing</span>
            </h1>
            <a href="../View/formulaire.php" class="btn">write a blog</a>
        </div>
    </header>

    <!-- blog section
    <section class="blogs-section">
        <!-- <div class="blog-card">
            <img src="img/header.png" class="blog-image" alt="">
            <h1 class="blog-title">Lorem ipsum dolor sit amet consectetur.</h1>
            <p class="blog-overview">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt incidunt fugiat quos porro repellat harum. Adipisci tempora corporis rem cum.</p>
            <a href="/" class="btn dark">read</a>
        </div> 
    </section>-->
   <!-- <div class="blog-box-container">
        
       
        <div class="blog-box">
         
            <div class="blog-box-img">
                <img alt="blog" src="c:\xampp\htdocs\gestion des blog\view\khadamni\images\recruitment1.jpg">
                <a href="#" class="blog-img-link">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>
           
            <div class="blog-box-text">
                <strong>Top Skills for Modern Job Seekers</strong>
                <a href="#">Discover the Essential Skills Every Employer Looks For</a>
                <p>Learn about the key skills and qualities that can make you stand out in today's competitive job market.</p>
                <div class="blog-author">
                    <div class="blog-author-img">
                        <img alt="" src="c:\xampp\htdocs\gestion des blog\view\khadamni\images\author1.jpg" style="max-width: 50px;">
                    </div>
                    <div class="blog-author-text">
                        <strong>John Doe</strong>
                        <span>March 5, 2024</span>
                    </div>
                </div>
            </div>
        </div>

      
        <div class="blog-box">
           
            <div class="blog-box-img">
                <img alt="blog" src="c:\xampp\htdocs\gestion des blog\view\khadamni\images\recruitment2.jpg">
                <a href="#" class="blog-img-link">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>
          
            <div class="blog-box-text">
                <strong>Interview Preparation Tips</strong>
                <a href="">Ace Your Next Job Interview with These Proven Strategies</a>
                <p>Get expert advice on how to prepare for job interviews, from researching the company to mastering common interview questions.</p>
                <div class="blog-author">
                    <div class="blog-author-img">
                        <img alt="" src="c:\xampp\htdocs\gestion des blog\view\khadamni\imagesun1\author2.png" style="max-width: 50px;">
                    </div>
                    <div class="blog-author-text">
                        <strong>Jane Smith</strong>
                        <span>March 12, 2024</span>
                    </div>
                </div>
            </div>
        </div>

    
        <div class="blog-box">
           
            <div class="blog-box-img">
                <img alt="blog" src="c:\xampp\htdocs\gestion des blog\view\khadamni\images\recruitment3.jpg">
                <a href="#" class="blog-img-link">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>
           
            <div class="blog-box-text">
                <strong>Remote Work Opportunities</strong>
                <a href="#">Explore the Benefits and Challenges of Remote Work</a>
                <p>Discover how remote work is changing the employment landscape and learn how to thrive in a remote work environment.</p>
                <div class="blog-author">
                    <div class="blog-author-img">
                        <img alt="" src="c:\xampp\htdocs\gestion des blog\view\khadamni\images\author3.jpg" style="max-width: 50px;">
                    </div>
                    <div class="blog-author-text">
                        <strong>Emily Johnson</strong>
                        <span>March 20, 2024</span>
                    </div>
                </div>
            </div>
        </div>
    
    </div> -->
    <div class="find_trip">
  </div>
  <section class="tour">
    <div class="center-text">
        <br><br><br>
        <h2>Posts les plus pertinents</h2>
    </div>
    <div class="tour-content">
        <div class="box">
            <img src="../view/imagesun1/recruitment2.jpg">
            <h4>Soigner, étudier, et cree des centres communication</h4>
            <h6>Certaines espèces sont pour connecter et prendre  plus photographiées </h6>
        </div>
        <div class="box">
            <img src="../view/imagesun1/recruitment3.jpg">
            <h4>coffe shop, des merveilles à visiter !</h4>
            <h6>Dans le domaine de la recruitement , que ce soit en des societe internationale ou ou local avec nos aide vous trouver des job inchallah</h6>
        </div>
        <div class="box">
            <img src="../View/imagesun1/recruitment1.jpg">
            <h4>10 bonnes raisons remplir u formulaire tous de suite !</h4>
            <h6>recruitement ou employment trouver des travail</h6>
        </div>
        <div class="box">
            <img src="../View/imagesun1/author3.jpg">
            <h4>10 bonnes raisons remplir u formulaire tous de suite !</h4>
            <h6>recruitement ou employment trouver des travail</h6>
        </div>
        <div class="center-btn">
            <a href="AddPost.php" class="btn">add your blog</a>
        </div>
        <div class="center-btn">
          <a href="formulaire.php" class="btn">form</a>
      </div>
      <div class="center-btn">
        <a href="ListePostss.php" class="btn">ListePosts</a>
        <div class="main-blue-button">
                  <a href= "../View/back office/index.html">back</a>
                </div>
    </div>
    </div>
  </section>

    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-firestore.js"></script>

    <script src="js/firebase.js"></script>
    <script src="js/home.js"></script>
    <div class="container">
        <div class="row">
          <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
            <p>© Droit d'auteur 2021 Space Dynamic Co. Tous droits réservés. 
            
            <br>Conception : <a rel="nofollow" href="https://Khadamni.com">Khadamni</a></p>
          </div>
        </div>
      </div>
    </footer>
    <!-- Scripts -->
    <script src="view/vendor/jquery/jquery.min.js"></script>
    <script src="view/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="view/assets/js/owl-carousel.js"></script>
    <script src="view/assets/js/animation.js"></script>
    <script src="view/assets/js/imagesloaded.js"></script>
    <script src="view/assets/js/templatemo-custom.js"></script>
    
</body>
</html>