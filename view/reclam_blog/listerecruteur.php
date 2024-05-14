<?php
include 'C:/xampp/htdocs/web/controller/RecruteurC.php';
$reclamationC = new reclamationC();

// Récupérer la catégorie sélectionnée depuis le formulaire
$categorie_reclamation = isset($_POST['categorie_reclamation']) ? $_POST['categorie_reclamation'] : null;

// Utiliser la méthode Listereclames avec la catégorie sélectionnée comme argument
$list = $reclamationC->listereclamation();

// Vérifier si un bouton de tri a été cliqué
if (isset($_POST['tri_asc'])) {
    // Trier les réclamations par ordre de proximité (ascendant)
    usort($list, function($a, $b) {
        return strtotime($a['date']) - strtotime($b['date']);
    });
}

// Tableau de mots interdits
$badWords = array("sirine", "israel", "eya");
// Fonction pour remplacer les mots interdits par des étoiles 
function filterBadWords($input) {
    global $badWords;
    foreach ($badWords as $word) {
        $input = str_ireplace($word, str_repeat("*", strlen($word)), $input);
    } 
    return $input; 
}
?>
<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>KHADAMNI - Dashboard</title>
    <!-- Pignose Calender -->
    <link href="../admin/dashboard/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="../admin/dashboard/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../admin/dashboard/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="../admin/dashboard/css/style.css" rel="stylesheet">

</head>

<body>
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div id="main-wrapper">
    <div class="corner-container">
                  <img src="../admin/dashboard/images/logoooooo.png" >
                  <style>
                    .corner-container {
                        position: fixed; /* Position fixe pour que le logo reste fixe lors du défilement */
                        top: 0; /* Distance depuis le haut */
                        left: 70px; /* Distance depuis la gauche */
                        z-index: 9999; /* Assure que le logo est au-dessus de tout le contenu */
                    }

                    .corner-container img {
                        width: 90px; /* Largeur minimale du logo */
                        top: 0; /* Distance depuis le haut */

                        height: auto; /* Hauteur ajustée automatiquement pour conserver les proportions */
                    }
                    #selectEtat {
                        padding: 5px;
                        border-radius: 20px;
                        border: 1px solid #ccc;
                        background: linear-gradient(230deg, #ffc480, #ff763b);
                        color: #333;
                    }

                    #selectEtat option {
                        background-color: #ffc480;
                        color: #333;
                    }

                  </style>
        </div> 
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down   d-md-none">
							<form action="#">
								<input type="text" class="form-control" placeholder="Search">
							</form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="badge gradient-1 badge-pill badge-primary">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">3 New Messages</span>  
                                    
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                    

                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2 badge-primary">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>  
                                    
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events near you</h6>
                                                    <span class="notification-text">Within next 5 days</span> 
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="http://localhost/web/view/admin/profil.php"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        <li><a href="http://localhost/web/final/back/viewProfil/aff.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/view/admin/afficher.php">Acceuil</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-label">Statestique</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">statestique</span>
                        </a>
                        <ul aria-expanded="false" >
                            <li>                
                                <a href="http://localhost/web/view/etudiant/statestique.php">
                                    <i class="icon-graph menu-icon"></i> Etudiant
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-label">Gestion Utilisateurs</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Gestion Utilisateurs</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/view/entreprise/table.php" aria-expanded="false">Tableau Entreprise</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/view/etudiant/afficher.php" aria-expanded="false">Tableau Etudiant</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Gestion Evenement</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Gestion Evenement</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/view/evenement/ListEvenement.php" aria-expanded="false">Tableau Evenement</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/view/evenement/ListCategorieevn.php" aria-expanded="false">Tableau Categorie</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/view/evenement/listeParticipation.php" aria-expanded="false">Tableau Participation</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Gestion Reclamation</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Gestion Reclamation</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="../reclam_blog/listerecruteur.php" aria-expanded="false">Tableau Reclamation</a></li>
                        </ul>                        
                        <ul aria-expanded="false">
                            <li><a href="../reclam_blog/listereponse.php" aria-expanded="false">Tableau reponse</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Gestion Blog</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Gestion Blog</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/view/entreprise/table.php" aria-expanded="false">Tableaux</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card" style="width: 1000px; left: 10%; top: 2%">
                            <div class="card-body" >
                                <h4 class="card-title">Tableau Reclamation</h4>
                                <div class="active-member">
                                    <div class="table-responsive">
                                        <table class="table table-xs mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">id_reclame</th>
                                                <th scope="col">date</th>
                                                <th scope="col">categorie_reclamation</th>
                                                <th scope="col">explication</th>
                                                <th scope="col">show</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($list as $reclamation) {
                                            ?>
                                                <tr>
                                                    <td><?php echo filterBadWords($reclamation['id_reclamation']); ?></td>
                                                    <td><?php echo filterBadWords($reclamation['date']); ?></td>
                                                    <td><?php echo filterBadWords($reclamation['categorie_reclamation']); ?></td>
                                                    <td><?php echo filterBadWords($reclamation['explication']); ?></td>
                                                    <td>
                                                        <form method="GET" action="showdetai.php">
                                                            <input type="hidden" value="<?php echo $reclamation['id_reclamation']; ?>" name="id_reclamation">
                                                            <button type="submit" class="btn btn-info" name="show">Show Details</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            <!-- #/ container -->
        </div>
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by KHADEMNI</a> 2024</p>
            </div>
        </div>
    </div>

    <script src="../admin/dashboard/plugins/common/common.min.js"></script>
    <script src="../admin/dashboard/js/custom.min.js"></script>
    <script src="../admin/dashboard/js/settings.js"></script>
    <script src="../admin/dashboard/js/gleek.js"></script>
    <script src="../admin/dashboard/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="../admin/dashboard/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="../admin/dashboard/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="../admin/dashboard/plugins/d3v3/index.js"></script>
    <script src="../admin/dashboard/plugins/topojson/topojson.min.js"></script>
    <script src="../admin/dashboard/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="../admin/dashboard/plugins/raphael/raphael.min.js"></script>
    <script src="../admin/dashboard/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="../admin/dashboard/plugins/moment/moment.min.js"></script>
    <script src="../admin/dashboard/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="../admin/dashboard/plugins/chartist/js/chartist.min.js"></script>
    <script src="view/../admin/dashboard/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <script src="view/../admin/dashboard/js/../admin/dashboard/dashboard-1.js"></script>
    <script>
        function toggleResponseForm(claimId) {
            var responseForm = document.getElementById("responseForm");
            responseForm.style.display = "block";
            var claimIdInput = document.getElementById("claimIdInput");
            claimIdInput.value = claimId;
        }
    </script>
</body>
</html>