<?php
include '../Controller/CategorieevnC.php';

// Instanciation de la classe CategorieevnC
$categorieevnC = new CategorieevnC();

// Vérifier si l'identifiant de la catégorie est défini dans la requête GET
if(isset($_GET['id'])) {
    // Récupérer l'ID de la catégorie depuis l'URL
    $idCategorieEVN = $_GET['id'];
    
    // Utiliser la méthode affiche_evenement() pour récupérer les événements associés à cette catégorie
    $categorieevn = $categorieevnC->affiche_evenement($idCategorieEVN);

    // Vérifier si des événements sont trouvés pour cette catégorie
    if($categorieevn) {
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Carousel 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i&display=swap" rel="stylesheet">
		
		<link rel="stylesheet" href="../assets/detail/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/detail/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
		<link rel="stylesheet" href="../assets/detail/css/style.css">
  </head>
  <body>
		
  <section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="heading-section mb-5">liste des évènements</h2>
            </div>
            <div class="col-md-12">
                <div class="featured-carousel owl-carousel">
                    <?php foreach ($categorieevn as $evenement): ?>
                        <div class="item">
                            <div class="testimony-wrap d-flex">
                                <div class="user-img" style="background-image: url(images/person_1.jpg)">
                                </div>
                                <div class="text pl-4">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="ion-ios-quote"></i>
                                    </span>
                                    <p><?= $evenement['nomEvenement']; ?></p>
                                    <p class="name"><?= $evenement['adresseEVN']; ?></p>
                                    <p class="position"><?= $evenement['dateEVN']; ?></p>
                                    <p class="position">Father</p>
                                </div>
                            </div>
                            <a href="addParticipation.php?idEvenement=<?= $evenement['idEvenement']; ?>" class="btn btn-outline-primary">Participer</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

    <script src="../assets/detail/js/jquery.min.js"></script>
    <script src="../assets/detail/js/popper.js"></script>
    <script src="../assets/detail/js/bootstrap.min.js"></script>
    <script src="../assets/detail/js/owl.carousel.min.js"></script>
    <script src="../assets/detail/js/main.js"></script>
  </body>
</html>
<?php
    } else {
        echo "Aucun événement associé à cette catégorie.";
    }
} else {
    echo "L'identifiant de la catégorie n'est pas spécifié.";
}
?>



