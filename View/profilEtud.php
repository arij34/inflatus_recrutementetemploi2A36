<?php
include '../Controller/ParticipationC.php'; // Assurez-vous que ce chemin est correct

// Supposons que vous ayez déjà récupéré l'identifiant de l'étudiant
$idEtudiant = 4; // Remplacez par l'ID de l'étudiant

// Instanciation de la classe ParticipationC
$participationC = new ParticipationC();

// Récupération de tous les événements auxquels l'étudiant participe
$events = $participationC->getEventsByStudentId($idEtudiant);

// Initialisation de la variable pour stocker les événements modifiés
$modifiedEvents = [];

// Parcourir tous les événements
foreach ($events as $evenement) {
    // Comparer les informations pour chaque événement
    $infos = $participationC->compareInfosByStudentIdAndEventId($idEtudiant, $evenement['idEvenement']);

    // Vérifier s'il y a des différences dans les adresses ou les dates
    if ($infos['ancienneAdresseEVN'] !== $infos['adresseEVN'] || $infos['ancienneDateEVN'] !== $infos['dateEVN']) {
        // Stocker l'événement modifié avec ses informations
        $modifiedEvents[] = [
            'nomEvenement' => $evenement['nomEvenement'],
            'dateEVN' => $infos['dateEVN'],
            'adresseEVN' => $infos['adresseEVN']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    body {
        background-color:white;
        background-size: cover;
        margin-top: 20px;
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        
        word-wrap: break-word;
        background-color: #f6f5f5c8;
        background-clip: border-box;
        border: 0 solid transparent;
        border-radius: .25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    }
    .me-2 {
        margin-right: .5rem!important;
    }
    .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%; /* Augmentation de la largeur */
        height: 40px;
        padding: 0 12px;
        margin: 8px 0;
        color: #fff;
        background: #03a4ed;
        border: none;
        border-radius: 80px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: .3s;
    }

    .btn:hover {
        gap: 10px;
        background-color: #fe3f40;
    }

    .btn-delete {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%; /* Ajustement de la largeur */
        height: 40px;
        color: #fff;
        background: #fe3f40;
        border: none;
        border-radius: 80px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .btn-delete:hover {
        background-color: #03a4ed;
    }
    /* Modificatiosn pour l'alerte */
    .alert {
        max-width:200px; /* Définir la largeur maximale souhaitée */
        background-color: #f6f5f5c8;
        border: 1px solid #007bff;
        border-radius: .25rem;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        color: black;
    }

    /* Cacher la liste des participations par défaut */
    .liste-participations {
        display: none;
    }
</style>
</head>
<body>
   <!-- Afficher l'alerte si des différences sont trouvées -->
<?php if (!empty($modifiedEvents)): ?>
    <div class="alert alert-warning" role="alert">
        Les informations ont été modifiées pour les événements suivants :
        <ul>
            <?php foreach ($modifiedEvents as $event): ?>
                <li><?php echo $event['nomEvenement'] . ' - ' . $event['dateEVN'] . ' - ' . $event['adresseEVN']; ?></li>
            <?php endforeach; ?>
        </ul>
        <!-- Ajout du bouton Supprimer -->
        <button class="btn btn-delete">Supprimer</button>
    </div>
<?php endif; ?>

<div class="container">
    <div class="main-body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                            <div class="mt-3">
                                <!-- Ajout du bouton pour afficher la liste des participations -->
                                <div class="d-flex justify-content-center mt-3">
                                    <a href="#" class="btn btn-primary" onclick="afficherListeParticipations()" style="font-weight: bold; font-size: 18px; width:300px;">Liste des participations</a>
                                </div>
                                <!-- Liste des participations -->
                                <ul class="list-group list-group-flush liste-participations">
                                    <?php foreach ($events as $evenement) { ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <div><?php echo $evenement['nomEvenement']; ?></div>
                                                <div><?php echo $evenement['dateEVN']; ?></div>
                                                <div><?php echo $evenement['adresseEVN']; ?></div>
                                            </div>
                                            <form method="POST" action="deleteParticipation.php">
                                                <input type="hidden" value="<?php echo $evenement['idParticipation']; ?>" name="idParticipation">
                                                <button type="submit" class="btn btn-primary delete-btn">Annuler</button>
                                            </form>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
document.addEventListener("DOMContentLoaded", function() {
    // Sélectionner le bouton "Supprimer"
    var deleteButton = document.querySelector(".btn-delete");

    // Ajouter un gestionnaire d'événement pour le clic sur le bouton "Supprimer"
    deleteButton.addEventListener("click", function() {
        // Sélectionner l'alerte
        var alert = document.querySelector(".alert");

        // Cacher l'alerte
        alert.style.display = "none";
    });
});

// Fonction pour afficher la liste des participations
function afficherListeParticipations() {
    var listeParticipations = document.querySelector('.liste-participations');
    // Afficher la liste des participations
    listeParticipations.style.display = "block";
}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
