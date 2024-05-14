<?php
require_once 'C:\xampp\htdocs\integfy\controller\DemandeC.php'; // Assurez-vous que ce chemin est correct

// Supposons que vous ayez déjà récupéré l'identifiant de l'étudiant
$idEtudiant = 1; // Remplacez par l'ID de l'étudiant

// Instanciation de la classe demandeC
$demandeC = new DemandeC();

// Récupération de tous les événements auxquels l'étudiant participe
$demandeC = $demandeC->getDemandesByStudentId($idEtudiant);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome for icons -->
    
    <style>
        body {
            background: #f7f7ff;
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .main-body {
            margin-top: 20px; /* Ajoute un espace entre la navbar et le contenu principal */
        }
        .delete-btn {
            font-weight: bold;
            font-size: 18px;
        }
    
    </style>
</head>
<body>
   

    <div class="container">
        <div class="main-body">
            <div class="row justify-content-center"> <!-- Align center -->
                <div class="col-md-12"> <!-- Change col-lg-4 to col-md-12 -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <table class="table table-bordered table-striped verticle-middle" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th scope="col">id_demande</th>
                                                <th scope="col">id_offre</th>
                                                <th scope="col">date_demande</th>
                                                <th scope="col">status_demande</th>
                                                <th scope="col">Annuler la demande</th>
                                                <th scope="col">Modifier la demande</th>
                                                <!-- Ajoutez les autres colonnes ici selon vos besoins -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($demandeC as $Demande) { ?>
                                                <tr>
                                                    <td><?php echo $Demande['id_d']; ?></td>
                                                    <td><?php echo $Demande['id_o']; ?></td>
                                                    <td><?php echo $Demande['date_d']; ?></td>
                                                    <td><?php echo $Demande['status_d']; ?></td>

                                                    <td>
                                                        <form method="POST" action="deleteDemande_front.php">
                                                            <input type="hidden" value="<?php echo $Demande['id_d']; ?>" name="id_d">
                                                            <button type="submit" class="btn btn-primary delete-btn">Annuler</button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="POST" action="./updateDemande_front.php">
                                                            <input type="hidden" value="<?php echo $Demande['id_d']; ?>" name="id_d">
                                                            <button type="submit" class="btn btn-primary delete-btn">Modifier</button>
                                                        </form>
                                                    </td>
                                                    <!-- Ajoutez les autres colonnes ici selon vos besoins -->
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
</body>
</html>