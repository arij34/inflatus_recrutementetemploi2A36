<?php
include '../Controller/EvenementC.php';
$evenementC = new EvenementC();
$list = $evenementC->listEvenements();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Vos styles CSS ici */

        .table-container {
            margin-top: 20px; /* Espace entre les tables */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="main-body">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <div class="d-flex justify-content-start">
                                        <a href="addEvenement.php" class="btn btn-primary" style="font-weight: bold; font-size: 18px; width:200px;">ajouter Evenement</a>
                                    </div>

                                    <!-- Première table -->
                                    <div class="table-container">
                                        <table class="table table-bordered table-striped verticle-middle" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Identifiant Evenement</th>
                                                    <th scope="col">Nom Evenement</th>
                                                    <th scope="col">Adresse Evenement</th>
                                                    <th scope="col">Date d'Evenement</th>
                                                    <th scope="col">catégorie Evenement</th>
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
                                                                <div class="d-flex justify-content-start">
                                                                    <button type="submit" class="btn btn-primary" style="font-weight: bold; font-size: 18px;" name="update">modifier</button>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form method="POST" action="deleteEvenement.php">
                                                                <input type="hidden" value="<?php echo $Evenement['idEvenement']; ?>" name="idEvenement">
                                                                <div class="d-flex justify-content-start">
                                                                    <button type="submit" class="btn btn-primary" style="font-weight: bold; font-size: 18px;" name="delete">annuler</button>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Fin de la première table -->

                                    <!-- Deuxième table -->
                                    <div class="table-container">
                                        <iframe src="listeParticipation.php" frameborder="0" scrolling="yes" width="100%" height="1200"></iframe>
                                    </div>
                                    <!-- Fin de la deuxième table -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
