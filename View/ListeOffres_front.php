<?php
/*
include '../Controller/OffreC.php';
$offreC = new OffreC();
$liste = $offreC->ListeOffres();

*/

include '../Controller/OffreC.php';
$offreC = new OffreC();
$liste = [];

if(isset($_POST['domaine_informatique'])){
    $domaine_informatique = $_POST['domaine_informatique'];
    $liste = $offreC->ListeOffres($domaine_informatique);
} 
else {
    $tri = isset($_GET['tri']) ? $_GET['tri'] : null; // Récupérer le paramètre de tri
    $liste = $offreC->ListeOffres(null, $tri); // Utiliser le paramètre de tri dans la requête
}

?>
<html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 ,shrink-to-fit=no">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  <link href="quixlab-master/css/style.css" rel="stylesheet">
  <meta name="description" content="">
        <meta name="author" content="">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
        <!-- STYLE -->
        <link rel="stylesheet" href="assets/css/style.css">

        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="assets/css/fontawesome.css">
        <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
        <link rel="stylesheet" href="assets/css/animated.css">
        <link rel="stylesheet" href="assets/css/owl.css">
        <style>
            /* Ajout de marge entre le header et le formulaire */
            .form-container {
                margin-top: 120px; /* Ajustez la marge selon vos besoins */
                 margin-bottom: 1px;
            }
    
            /* Styles spécifiques au logo */
            .corner-container {
                position: fixed; /* Position fixe pour que le logo reste fixe lors du défilement */
                top: 0; /* Distance depuis le haut */
                left: 10px; /* Distance depuis la gauche */
                z-index: 9999; /* Assure que le logo est au-dessus de tout le contenu */
            }
    
            .corner-container img {
                width: 50px; /* Largeur minimale du logo */
                top: 0; /* Distance depuis le haut */
                height: auto; /* Hauteur ajustée automatiquement pour conserver les proportions */
            }
            <style>
                .main-content {
                    margin-top: 300px; /* Ajustez la marge selon vos besoins */
                       }
</style>
        </style>
 </head>


<body>

<div class="content">
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="acceuil.php" class="logo">
                      <h4>
                        <div class="corner-container">
                          <img src="assets/images/logo.png" >
                        </div> 
                      Kha<span>Damni</span></h4>
                    </a>
        
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li class="scroll-to-section"><a href="acceuil.php" >Home</a></li>
                      <li class="scroll-to-section"><a href="#about"></a></li>
                      <li class="scroll-to-section"><a href="#services" class="active">Offres&demandes</a></li>
                      <li class="scroll-to-section"><a href="#portfolio">Entretien</a></li>
                      <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
                      <li class="scroll-to-section"><a href="#contact">Reclamation</a></li> 
                      <li class="scroll-to-section"><div class="main-red-button"><a href="C:\Users\21628\OneDrive\Desktop\projet_web\loginn\loginn\Untitled-1.html">Se connecter</a></div></li> 
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
        
  <tbody >
 
  <div style="margin-top: 800px;">
  <div style="margin-top: 400px;">
  <form method="POST" action="ListeOffres_front.php">
    <center>
  <div class="form-inputs">
    <div class="input-box" style="display: inline-block; margin-right: 20px;">
        <select name="domaine_informatique" class="input-field select-field" required>
            <option value="" disabled selected hidden>Domaine informatique</option>
            <option value="Développement Web">Développement Web</option>
            <option value="Développement Mobile">Développement Mobile</option>
            <option value="Science des Données">Science des Données</option>
            <option value="Sécurité Informatique">Sécurité Informatique</option>
            <!-- Add more options as needed -->
        </select>
    </div>
    <div class="input-box" style="display: inline-block; margin-right: 250px;">
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </div>
    
    <div class="input-box" style="display: inline-block; margin-right: 20px;">
        <select name="tri" id="tri" class="input-field select-field">
            <option value="" disabled selected hidden>Trier par</option>
            <option value="date_publication">Date de publication</option>
            <option value="type_o">Type</option>
            <option value="entreprise">Entreprise</option>
        </select>
    </div>
    <button type="button" id="btnTri" class="btn btn-primary">Trier</button>
</div>

<script>
    document.getElementById('btnTri').addEventListener('click', function() {
        var tri = document.getElementById('tri').value;
        var url = 'ListeOffres_front.php'; // URL de la page actuelle

        // Rediriger vers la même page avec le paramètre de tri
        window.location.href = url + '?tri=' + tri;
    });
</script>
</center>



    <div class="col-lg-6">
        <div class="card" style="width: 1200px;">
            <div class="card-body">
                <h4 class="card-title">Table Offres</h4>
                <div class="table-responsive">
                    <?php foreach ($liste as $offre) { ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><span style="color:#fe3f40;">Offre : </span><?php echo $offre['id_o']; ?></h5>
                                <p class="card-text">
                                    <span style="color: blue;">id_o : </span><?php echo $offre['id_o']; ?>&nbsp;&nbsp;
                                    <span style="color: blue;">id_dom : </span><?php echo $offre['id_dom']; ?><br>
                                    <span style="color: blue;">titre : </span><?php echo $offre['titre']; ?>&nbsp;&nbsp;
                                    <span style="color: blue;">description_o : </span><?php echo $offre['description_o']; ?><br>
                                    <span style="color: blue;">type : </span><?php echo $offre['type_o']; ?>&nbsp;&nbsp;
                                    <span style="color: blue;">entreprise : </span><?php echo $offre['entreprise']; ?><br>
                                    <span style="color: blue;">lieu : </span><?php echo $offre['lieu']; ?>&nbsp;&nbsp;
                                    <span style="color: blue;">date_publication : </span><?php echo $offre['date_publication']; ?><br>
                                    <span style="color: blue;">date_limite : </span><?php echo $offre['date_limite']; ?>&nbsp;&nbsp;
                                    <span style="color: blue;">contact : </span><?php echo $offre['contact']; ?><br>
                                    <span style="color: blue;">status_o : </span><?php echo $offre['status_o']; ?>&nbsp;&nbsp;
                                </p>
                                <div class="d-flex">
                                    <form method="POST" action="updateOffre_front.php">
                                        <input type="hidden" value="<?php echo $offre['id_o']; ?>" name="id_o">
                                        <button type="submit" class="btn btn-primary" name="update"><i class="fa fa-pencil"></i></button>
                                    </form>
                                    &nbsp;&nbsp;
                                    <form method="POST" action="deleteOffre_front.php">
                                        <input type="hidden" value="<?php echo $offre['id_o']; ?>" name="id_o">
                                        <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
  

    
</tbody>
</div>
<style>
  .main-orange-button {
            background-color: #fe3f40;
            color: white; /* Couleur du texte en blanc */
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            text-decoration: none;
            font-weight: bold;
        }
  .main-orange-button a {
            color: white; /* Couleur du texte en blanc pour les liens */
        }
</style>
<center>
            <div class="main-orange-button">
                <a href="ajoutDemande.php " >Ajouter votre demande </a>
            </div>
        </center>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                    <p>© Copyright 2024 Khadamni. All Rights Reserved.</p>
                </div>
            </div>
        </div>
</footer>
   

    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/templatemo-custom.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/tabs.js"></script>

    
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js.map"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  </div>
  </body>

</html>