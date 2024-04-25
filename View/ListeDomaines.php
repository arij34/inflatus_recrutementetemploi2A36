<?php
include '../Controller/DomaineC.php';
$domaineC = new DomaineC();
$liste = $domaineC->ListeDomaines();
?>
<html>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  <link href="quixlab-master/css/style.css" rel="stylesheet">

</head>

<body>

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
                        <form method="POST" action="updateDomaine.php">
                          <input type="hidden" value="<?php echo $domaine['id_dom']; ?>" name="id_dom">
                          <button type="submit" class="btn btn-primary" name="update"><i class="fa fa-pencil"></i></button>
                        </form>
                      </td>
                      <td>
                        <form method="POST" action="deleteDomaine.php">
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



    <script src="../templatemo_562_space_dynamic/assets/js/isotope.js"></script>
    <script src="../templatemo_562_space_dynamic/assets/js/owl-carousel.js"></script>
    <script src="../templatemo_562_space_dynamic/assets/js/animation.js"></script>
    <script src="../templatemo_562_space_dynamic/assets/js/imagesloaded.js"></script>
    <script src="../templatemo_562_space_dynamic/assets/js/templatemo-custom.js"></script>
    <script src="../templatemo_562_space_dynamic/assets/js/main.js"></script>
    <script src="../templatemo_562_space_dynamic/assets/js/tabs.js"></script>


    <script src="../templatemo_562_space_dynamic/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../templatemo_562_space_dynamic/vendor/bootstrap/js/bootstrap.bundle.min.js.map"></script>
    <script src="../templatemo_562_space_dynamic/vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>

   