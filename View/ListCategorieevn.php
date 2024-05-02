<?php
include '../Controller/categorieevnC.php';
$categorieevnC = new CategorieevnC();
$list = $categorieevnC->listcategorieevns();
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">

</head>


<body>

<div class="row page-titles mx-0">
        <div class="col-lg-6">
            <div class="card" style="width: 1000px;">
                <div class="card-body">
                    <h4 class="card-title">Table Categorie evenement </h4>
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped verticle-middle" style="width: 100%;">
    <thead>
        <tr>
            <th scope="col">Identifiant categorie</th>
            <th scope="col">Nom categorie</th>
            <th scope="col">modifier</th>
            <th scope="col">supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list as $categorieevn) { ?>
            <tr>
                <td><?php echo $categorieevn['idCategorieEVN']; ?></td>
                <td><?php echo $categorieevn['nomCategorieEVN']; ?></td>
                <td>
                    <form method="POST" action="updateCategorieevn.php">
                        <input type="hidden" value="<?php echo $categorieevn['idCategorieEVN']; ?>" name="idCategorieEVN">
                        <button type="submit" class="btn btn-primary" name="edit"><i class="fa fa-pencil"></i></button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="deleteCategorieevn.php">
                        <input type="hidden" value="<?php echo $categorieevn['idCategorieEVN']; ?>" name="idCategorieEVN">
                        <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/plugins/common/common.min.js"></script>
    <script src="../assets/js/custom.min.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/gleek.js"></script>
    <script src="../assets/js/styleSwitcher.js"></script>
</body>

</html>
