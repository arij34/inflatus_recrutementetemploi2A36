<?php
include '../Controller/EntrepriseC.php';
$entrepriseC = new EntrepriseC();
$list = $entrepriseC->listEntreprises();
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
                    <h4 class="card-title">Table entreprise </h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped verticle-middle" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">Identifiant entreprise</th>
                                    <th scope="col">Nom entreprise</th>
                                    <th scope="col">Adresse</th>
                                    <th scope="col">Téléphone1</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Date de création</th>
                                    <th scope="col">Confirmer</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list as $entreprise) {
                                ?>
                                    <tr>
                                        <td><?php echo $entreprise['idE']; ?></td>
                                        <td><?php echo $entreprise['nomEntreprise']; ?></td>
                                        <td><?php echo $entreprise['adresse']; ?></td>
                                        <td><?php echo $entreprise['telephone']; ?></td>
                                        <td><?php echo $entreprise['email']; ?></td>
                                        <td><?php echo $entreprise['dateCreation']; ?></td>

                                        <td>
                                         <form method="POST" action="updateEntreprise.php">
                                         <input type="hidden" value="<?php echo $entreprise['idE']; ?>" name="idEntreprise">
                                         <button type="submit" class="btn btn-primary" name="edit"><i class="fa fa-pencil"></i></button>
                                         </form>
                                         </td>
                                         <td>
                                         <form method="POST" action="deleteEntreprise.php">
                                         <input type="hidden" value="<?php echo $entreprise['idE']; ?>" name="idEntreprise">
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