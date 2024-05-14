<?php
require_once 'C:\xampp\htdocs\integfy\controller\OffreC.php';
require_once 'C:\xampp\htdocs\integfy\controller\DemandeC.php';
require_once 'C:\xampp\htdocs\integfy\controller\DomaineC.php';
$offreC = new OffreC();
$liste_offres = $offreC->ListeOffres();

$demandeC = new DemandeC();
$liste_demandes = $demandeC->ListeDemandes();

$domaineC = new DomaineC();
$liste = $domaineC->ListeDomaines();

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>KHADAMNI - Dashboard</title>
    <!-- Pignose Calender -->
    <link href="../back end/dashboard/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="../back end/dashboard/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../back end/dashboard/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="../back end/dashboard/css/style.css" rel="stylesheet">

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
                  <img src="../view/dashboard/images/logoooooo.png" >
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
                  </style>
                </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
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
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Adam Smith</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Can you do me a favour?</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Barak Obama</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/4.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Hilari Clinton</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hello</div>
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
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Started</h6>
                                                    <span class="notification-text">One hour ago</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Ended Successfully</h6>
                                                    <span class="notification-text">One hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events to Join</h6>
                                                    <span class="notification-text">After two days</span> 
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                <span>English</span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="javascript:void()">English</a></li>
                                        <li><a href="javascript:void()">Dutch</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html"><i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill badge-primary">3</div></a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                        </li>
                                        <li><a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">  
                     
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="listuser.php">Acceuil</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-label">Gestions</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Tables </span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="table-basic.php" aria-expanded="false">Gestion Entretien</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Statistique</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./chart-morris.php">Gestion Entretien</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-body">

<!-- Offres -->
<body style="padding-top: 50px;">
    <div class="row page-titles mx-0">
      <div class="col-lg-6">
        <div class="card" style="width: 1200px;">
          <div class="card-body">
            <h4 class="card-title">Table Offres</h4>
             <div style="padding-left: 950px;">
            <a href="../addOffre.php" class="btn btn-success mb-2">Ajouter une nouvelle offre</a>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered verticle-middle">
                <thead>
                  <tr>
                    <th scope="col">id_o</th>
                    <th scope="col">id_dom</th>
                    <th scope="col">titre</th>
                    <th scope="col">description_o</th>
                    <th scope="col">type</th>
                    <th scope="col">idEntreprise</th>
                    <th scope="col">lieu</th>
                    <th scope="col">date_publication</th>
                    <th scope="col">date_limite</th>
                    <th scope="col">contact</th>
                    <th scope="col">status_o</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($liste_offres as $offre) {
                  ?>
                    <tr>
                      <td><?php echo $offre['id_o']; ?></td>
                      <td><?php echo $offre['id_dom']; ?></td>
                      <td><?php echo $offre['titre']; ?></td>
                      <td><?php echo $offre['description_o']; ?></td>
                      <td><?php echo $offre['type_o']; ?></td>
                      <td><?php echo $offre['idEntreprise']; ?></td>
                      <td><?php echo $offre['lieu']; ?></td>
                      <td><?php echo $offre['date_publication']; ?></td>
                      <td><?php echo $offre['date_limite']; ?></td>
                      <td><?php echo $offre['contact']; ?></td>
                      <td><?php echo $offre['status_o']; ?></td>
                      <td>
                        <form method="POST" action="../updateOffre.php">
                          <input type="hidden" value="<?php echo $offre['id_o']; ?>" name="id_o">
                          <button type="submit" class="btn btn-primary" name="update"><i class="fa fa-pencil"></i></button>
                        </form>
                      </td>
                      <td>
                        <form method="POST" action="../deleteOffre_front.php">
                          <input type="hidden" value="<?php echo $offre['id_o']; ?>" name="id_o">
                          <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i></button>
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
</body>

<!-- Demandes -->
<body style="padding-top: 100px;">
    <div class="row page-titles mx-0">
      <div class="col-lg-6">
        <div class="card" style="width: 1200px;">
          <div class="card-body">
            <h4 class="card-title">Table Demandes</h4>
            <div class="table-responsive">
              <table class="table table-bordered verticle-middle">
                <thead>
                  <tr>
                    <th scope="col">id_d</th>
                    <th scope="col">idEtudiant</th>
                    <th scope="col">nom_d</th>
                    <th scope="col">prenom_d</th>
                    <th scope="col">email_d</th>
                    <th scope="col">telephone_d</th>
                    <th scope="col">cv_d</th>
                    <th scope="col">lettre_motivation</th>
                    <th scope="col">id_o</th>
                    <th scope="col">date_d</th>
                    <th scope="col">status_d</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($liste_demandes as $demande) {
                  ?>
                    <tr>
                      <td><?php echo $demande['id_d']; ?></td>
                      <td><?php echo $demande['idEtudiant']; ?></td>
                      <td><?php echo $demande['nom_d']; ?></td>
                      <td><?php echo $demande['prenom_d']; ?></td>
                      <td><?php echo $demande['email_d']; ?></td>
                      <td><?php echo $demande['telephone_d']; ?></td>
                      <td><?php echo $demande['cv_d']; ?></td>
                      <td><?php echo $demande['lettre_motivation']; ?></td>
                      <td><?php echo $demande['id_o']; ?></td>
                      <td><?php echo $demande['date_d']; ?></td>
                      <td><?php echo $demande['status_d']; ?></td>
                      <td>
                        <form method="POST" action="../updateDemande.php">
                          <input type="hidden" value="<?php echo $demande['id_d']; ?>" name="id_d">
                          <button type="submit" class="btn btn-primary" name="update"><i class="fa fa-pencil"></i></button>
                        </form>
                      </td>
                      <td>
                        <form method="POST" action="../deleteDemande_front.php">
                          <input type="hidden" value="<?php echo $demande['id_d']; ?>" name="id_d">
                          <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i></button>
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
</body>

<!-- domaine -->

<body style="padding-top: 100px;">
    <div class="row page-titles mx-0">
      <div class="col-lg-6">
        <div class="card" style="width: 1200px;">
          <div class="card-body">
            <h4 class="card-title">Table Domaine</h4>
            <div class="table-responsive">
              <table class="table table-bordered verticle-middle">
                <thead>
                  <tr>
                    <th scope="col">id_dom</th>
                    <th scope="col">domaine_informatique</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($liste as $domaine) {
                  ?>
                    <tr>
                      <td><?php echo $domaine['id_dom']; ?></td>
                      <td><?php echo $domaine['domaine_informatique']; ?></td>

                      
                      <td>
                        <form method="POST" action="../deleteDomaine.php">
                          <input type="hidden" value="<?php echo $domaine['id_dom']; ?>" name="id_dom">
                          <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i></button>
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

        
        <div class="footer">
            <div class="copyright">
            <p>Copyright &copy; Designed & Developed by KHADAMNI</a> 2024</p>
            </div>
        </div>
        
    </div>
  
    <script src="../back end/dashboard/plugins/common/common.min.js"></script>
    <script src="../back end/dashboard/js/custom.min.js"></script>
    <script src="../back end/dashboard/js/settings.js"></script>
    <script src="../back end/dashboard/js/gleek.js"></script>
    <script src="../back end/dashboard/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="../back end/dashboard/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="../back end/dashboard/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="../back end/dashboard/plugins/d3v3/index.js"></script>
    <script src="../back end/dashboard/plugins/topojson/topojson.min.js"></script>
    <script src="../back end/dashboard/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="../back end/dashboard/plugins/raphael/raphael.min.js"></script>
    <script src="../back end/dashboard/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="../back end/dashboard/plugins/moment/moment.min.js"></script>
    <script src="../back end/dashboard/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="../dashboard/plugins/chartist/js/chartist.min.js"></script>
    <script src="../back end/dashboard/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <script src="../back end/dashboard/js/dashboard/dashboard-1.js"></script>

</body>

</html>

