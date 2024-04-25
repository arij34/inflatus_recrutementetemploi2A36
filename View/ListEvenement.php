<?php
include '../Controller/EvenementC.php';
$evenementC = new EvenementC();
$list = $evenementC->listEvenements();
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="quixlab-master\css\style.css" rel="stylesheet">

</head>

<body>

<div class="row page-titles mx-0">
        <div class="col-lg-6">
            <div class="card" style="width: 1000px;">
                <div class="card-body">
                    <h4 class="card-title">Table Evenement </h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped verticle-middle" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">Identifiant Evenement</th>
                                    <th scope="col">Nom Evenement</th>
                                    <th scope="col">Adresse Evenement</th>
                                    <th scope="col">Date d'Evenement</th>
                                    <th scope="col">catégorie Evenement </th>
                                    <th scope="col">modifier</th>
                                    <th scope="col">supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list as $Evenement) {
                                ?>
                                    <tr>
                                        <td><?php echo $Evenement['idEvenement']; ?></td>
                                        <td><?php echo $Evenement['nomEvenement']; ?></td>
                                        <td><?php echo $Evenement['adresseEVN']; ?></td>
                                        <td><?php echo $Evenement['dateEVN']; ?></td>
                                        <td><?php echo $Evenement['idCategorieEVN']; ?></td>
                                        <td>
                                         <form method="POST" action="updateEvenement.php">
                                         <input type="hidden" value="<?php echo $Evenement['idEvenement']; ?>" name="idEvenement">
                                         <button type="submit" class="btn btn-primary" name="edit"><i class="fa fa-pencil"></i></button>
                                         </form>
                                         </td>
                                         <td>
                                         <form method="POST" action="deleteEvenement.php">
                                         <input type="hidden" value="<?php echo $Evenement['idEvenement']; ?>" name="idEvenement">
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

</html>